<?php

namespace PhpExtended\Json;

use PhpExtended\Inspect\Inspector;

/**
 * JsonSuccess class file.
 * 
 * This class represents small objects like the one that the server sends to
 * signify the success of a specific task.
 * 
 * This object looks like : {"success": true}
 * 
 * @author Anastaszor
 */
class JsonSuccess extends JsonObject
{
	
	/**
	 * The value of the result/response from the server.
	 * 
	 * @var boolean
	 */
	protected $_success = false;
	
	/**
	 * Builds a new JsonSuccess object from the given decoded json data.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @return mixed[] $json
	 * @throws JsonException if the data cannot be decoded.
	 */
	public function __construct(array $json, $silent = false)
	{
		$data = parent::__construct($json, $silent);
		foreach($data as $key => $value)
		{
			switch($key)
			{
				case 'success':
				case 'response':
					$this->_success = $this->asBoolean($value, $silent);
					unset($data[$key]);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}" for value "{value}".',
							array('{key}' => $key, '{class}' => get_class($this), '{value}' => Inspector::inspect($value))));
			}
		}
		return $data;
	}
	
	/**
	 * Gets whether the value of this object is a success (true) or a failure
	 * (false).
	 * 
	 * @return boolean
	 */
	public function getSuccess()
	{
		return $this->_success;
	}
	
}
