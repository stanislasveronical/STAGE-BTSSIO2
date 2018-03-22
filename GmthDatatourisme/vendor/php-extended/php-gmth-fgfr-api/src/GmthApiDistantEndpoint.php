<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonObject;
use PhpExtended\RootCacert\CacertBundle;
use Psr\Log\LoggerInterface;

abstract class GmthApiDistantEndpoint
{
	
	/**
	 * The host of the application.
	 *
	 * @return string
	 */
	protected $_hostname = null;
	
	/**
	 * PSR-3 compatible logger.
	 *
	 * @var LoggerInterface
	 */
	protected $_logger = null;
	
	/**
	 * The version of the application that is currently running.
	 *
	 * @var string
	 */
	protected $_app_version = null;
	
	/**
	 * The name of the user to connect with. Encoded base64.
	 *
	 * @var string
	 */
	private $_username = null;
	
	/**
	 * The password of the user to connect with. Encoded base64.
	 *
	 * @var string
	 */
	private $_password = null;
	
	/**
	 * The path of
	 *
	 * @var string
	 */
	private $_cookie_path = null;
	
	/**
	 * The session cookie if we are logged in.
	 *
	 * @var string
	 */
	private $_session_cookie = null;
	
	/**
	 * The hostname (or ip address) of the proxy to authenticate into.
	 *
	 * @var string
	 */
	private $_proxy_host = null;
	
	/**
	 * The username of the user to authenticate to the proxy.
	 *
	 * @var string
	 */
	private $_proxy_user = null;
	
	/**
	 * The password of the user to authenticate to the proxy.
	 *
	 * @var string
	 */
	private $_proxy_password = null;
	
	/**
	 * Builds a new endpoint with the given logger interface and a writeable
	 * path for the cookie file written by curl.
	 *
	 * @param LoggerInterface $logger
	 * @param string $cookie_path
	 * @param string $proxy_host
	 * @param string $proxy_user
	 * @param string $proxy_pwd
	 */
	public function __construct($hostname, LoggerInterface $logger, $cookie_path, $proxy_host = null, $proxy_user = null, $proxy_pwd = null)
	{
		$this->_hostname = trim($hostname, '/').'/';
		if(strpos($this->_hostname, 'http') === false)
			$this->_hostname = 'https://'.$this->_hostname;
		$this->_logger = $logger;
		$this->_cookie_path = $cookie_path;
		$this->_proxy_host = $proxy_host;
		$this->_proxy_user = $proxy_user;
		$this->_proxy_password = $proxy_pwd;
	}
	
	/**
	 * Logs the user in with given credentials.
	 *
	 * @param string $username
	 * @param string $password
	 * @return boolean true if login is successful
	 * @throws GmthApiException if the login failed
	 */
	public function login($username, $password)
	{
		$this->_session_cookie = null;
		$url = $this->_hostname.'login';
		
		$data = $this->download($url);
		
		$matches = array();
		if(preg_match('#<input.*?name="_csrf_token".*?value="(.*?)"#', $data, $matches))
		{
			$csrf = $matches[1];
		}
		else
		{
			$message = strtr('Impossible to find csrf token at "{url}".',
				array('{url}' => $url));
			$this->_logger->error($message);
			throw new GmthApiException($message, GmthApiException::ERROR_GMTH_LOGGING);
		}
		
		$data = $this->download($url, array(
			'_csrf_token' => $csrf,
			'_username' => $username,
			'_password' => $password,
		));
		
		if(strpos($data, '<body id="page"') === false)
		{
			$message = strtr('Invalid credentials to login form at "{url}".',
				array('{url}' => $url));
			$this->_logger->error($message);
			throw new GmthApiException($message, GmthApiException::ERROR_GMTH_LOGGING);
		}
		
		$matches = array();
		if(preg_match('#version/(\d+\.\d+\.\d+)#', $data, $matches))
		{
			$this->_app_version = $matches[1];
		}
		else
		{
			$message = strtr('Impossible to find version number in application page at "{url}".',
					array('{url}' => $url));
			$this->_logger->error($message);
			throw new GmthApiException($message, GmthApiException::ERROR_GMTH_LOGGING);
		}
		
		$cookie = str_replace(array("\r", "\n"), '', file_get_contents($this->_cookie_path));
		if(preg_match('#PrivateAppSession\s+(\w+)$#', $cookie, $matches))
		{
			$this->_session_cookie = $matches[1];
		}
		
		if($this->_session_cookie === null)
		{
			$message = strtr('Failed to find session cookie in headers at "{url}".',
				array('{url}' => $url));
			$this->_logger->error($message);
			throw new GmthApiException($message, GmthApiException::ERROR_GMTH_LOGGING);
		}
		
		return true;
	}
	
	/**
	 * Checks whether the api is in a logged state.
	 *
	 * @throws GmthApiException
	 */
	protected function ensureLoggedIn()
	{
		if($this->_session_cookie === null)
			throw new GmthApiException('The api must be logged in before accessing the api methods. Please use the login() method before calling other api methods.',
				GmthApiException::ERROR_GMTH_NOTLOGGED);
	}
	
	/**
	 * Gets the json decoded object and handles the error codes by returning
	 * null if silent, and throwing an exception if not on error.
	 *
	 * @param JsonObject $data
	 * @param string $silent
	 * @return JsonObject the same as given, null if error and silent
	 * @throws GmthApiException
	 */
	protected function handleDataErrorStatus(JsonObject $data, $silent = false)
	{
		if(empty($data->getStatus()) && empty($data->getMessage()))
			return $data;
		
		if($silent)
			return null;
		
		throw new GmthApiException($data->getMessage(), $data->getStatus());
	}
	
	/**
	 * Gets the json data expected from the given url.
	 *
	 * @param string $url
	 * @param string[] $payload
	 * @return mixed[] the decoded json data
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication
	 */
	protected function getJson($url, $payload = array())
	{
		$contents = $this->download($url, $payload);
		
		$json = json_decode($contents, true);
		if($json === null)
			throw new GmthApiException(strtr('Expected json data, found {data}.',
				array('{data}' => $contents)), GmthApiException::ERROR_JSON_DECODE);
		
		return $json;
	}
	
	/**
	 * Downloads a file at given url and returns the raw contents.
	 *
	 * @param string $url
	 * @param mixed[] $payload
	 * @throws GmthApiException if the data cannot be get back from the api
	 * @return string binary raw contents
	 */
	protected function download($url, $payload = array())
	{
		$this->_logger->debug(strtr('Getting url {url} with payload {payload}.',
			array('{url}' => $url, '{payload}' => json_encode($payload))));
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		
		// set additional headers
		curl_setopt($ch, CURLOPT_HEADER, array(
			'X-Requested-With: XMLHttpRequest',
			'Origin: '.$this->_hostname,
			'Cache-Control: no-cache',
			'Pragma: no-cache',
			'Host: '.trim(str_replace('https:', '', $this->_hostname), '/'),
		));
		// we do not follow the location, it's the marker for success or
		// failed connection with given login and password
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_ENCODING, "gzip");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		if(!empty($payload))
		{
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		}
		
		if(!empty($this->_proxy_host))
		{
			curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
			curl_setopt ($ch, CURLOPT_PROXY, $this->_proxy_host);
			curl_setopt ($ch, CURLOPT_PROXYUSERPWD, $this->_proxy_user.':'.$this->_proxy_password);
		}
		
		// enable cookie engine
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->_cookie_path);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->_cookie_path);
		
		// be sure to verify the certificates
		$cacert_path = CacertBundle::getFilePath();
		curl_setopt($ch, CURLOPT_CAINFO, $cacert_path);
		curl_setopt($ch, CURLOPT_CAPATH, $cacert_path);
		
		$contents = curl_exec($ch);
		if($contents === false)
		{
			$code = curl_errno($ch);
			$message = curl_error($ch);
			curl_close($ch);
			throw new GmthApiException($message, GmthApiException::ERROR_CURL_TRANSPORT + $code);
		}
		
		curl_close($ch);
		
		return $contents;
	}
	
}
