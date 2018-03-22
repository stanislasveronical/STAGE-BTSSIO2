<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDumpMetadata extends JsonObject
{
	
	/**
	 * The id of the metadata.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The data of the metadata.
	 * 
	 * @var string
	 */
	private $_data = null;
	
	/**
	 * The expiration date of this metadata.
	 * 
	 * @var \DateTime
	 */
	private $_expires = null;
	
	/**
	 * Builds a new GmthApiDumpMetadata with the given decoded json data.
	 * 
	 * @param mixed[] $json
	 * @param string $silent
	 * @throws JsonException
	 */
	public function __construct(array $json, $silent = false)
	{
		$json = parent::__construct($json, $silent);
		foreach($json as $key => $value)
		{
			switch($key)
			{
				case 'id':
					$this->_id = $this->asString($value, $silent);
					break;
				case 'data':
					$this->_id = $this->asString($value, $silent);
					break;
				case 'expires':
					$this->asDatetime($value, 'Y-m-d H:i:s', $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of this metadata.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the data of this metadata.
	 * 
	 * @return string
	 */
	public function getData()
	{
		return $this->_data;
	}
	
	/**
	 * Gets the expiration date for this metadata.
	 * 
	 * @return \DateTime
	 */
	public function getExpires()
	{
		return $this->_expires;
	}
	
}
