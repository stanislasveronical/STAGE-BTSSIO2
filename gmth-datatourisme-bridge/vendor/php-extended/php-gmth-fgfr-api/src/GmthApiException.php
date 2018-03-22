<?php

namespace PhpExtended\Gmth;

class GmthApiException extends \Exception
{
	
	/* codes from 0 to 999 are http codes */
	/* codes from 1000 to 1999 are curl error codes */
	/* @see https://curl.haxx.se/libcurl/c/libcurl-errors.html */
	
	/**
	 * Base code for all curl errors.
	 * 
	 * @var integer
	 */
	const ERROR_CURL_TRANSPORT = 1000;
	
	/**
	 * Code for json_decode failures.
	 * 
	 * @var integer
	 */
	const ERROR_JSON_DECODE    = 2000;
	
	/**
	 * Code for \PhpExtended\Json\JsonObject failures.
	 * 
	 * @var integer
	 */
	const ERROR_JSON_BUILDING  = 2001;
	
	/**
	 * Code for login procedure failures.
	 * 
	 * @var integer
	 */
	const ERROR_GMTH_LOGGING   = 3000;
	
	/**
	 * Code for calling api methods before being logged.
	 * 
	 * @var integer
	 */
	const ERROR_GMTH_NOTLOGGED = 3001;
	
}
