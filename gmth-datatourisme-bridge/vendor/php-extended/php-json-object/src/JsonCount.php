<?php

namespace PhpExtended\Json;

use PhpExtended\Inspect\Inspector;

/**
 * JsonCount class file.
 * 
 * This class represents a small object like the one the server sends to
 * signify the result of a count operation.
 * 
 * This object looks like : {"count": 42}
 * 
 * @author Anastaszor
 */
class JsonCount extends JsonObject
{
	
	/**
	 * The value of the count from the server.
	 * 
	 * @var integer
	 */
	protected $_count = 0;
	
	/**
	 * Builds a new JsonCount object from the given decoded json data.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @return mixed[]
	 * @throws JsonException if the data cannot be decoded
	 */
	public function __construct(array $json, $silent = false)
	{
		$data = parent::__construct($json, $silent);
		foreach($data as $key => $value)
		{
			switch($key)
			{
				case 'count':
				case 'value':
					$this->_count = $this->asInteger($value, $silent);
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
	 * Gets the count value the server returned.
	 * 
	 * @return integer
	 */
	public function getCount()
	{
		return $this->_count;
	}
	
}
