<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiCredential extends JsonObject
{
	
	/**
	 * The accesses that the user has.
	 * 
	 * @var boolean[][]
	 */
	private $_accesses = array();
	
	/**
	 * Builds a new GmthApiCredential with the given decoded json data
	 * and the given silent policy.
	 * 
	 * @param array $json
	 * @param string $silent
	 * @throws JsonException if the object cannot be built and if not silent
	 */
	public function __construct(array $json, $silent = false)
	{
		$json = parent::__construct($json, $silent);
		foreach($json as $key => $value)
		{
			foreach($this->asArray($value, $silent) as $subkey => $subvalue)
			{
				$this->_accesses[$this->asString($key, $silent)][$this->asString($subkey, $silent)]
					= $this->asBoolean($subvalue, $silent);
			}
		}
	}
	
	/**
	 * Gets the accesses this credential bag the user has.
	 * 
	 * @return array
	 */
	public function getAccesses()
	{
		return $this->_accesses;
	}
	
}
