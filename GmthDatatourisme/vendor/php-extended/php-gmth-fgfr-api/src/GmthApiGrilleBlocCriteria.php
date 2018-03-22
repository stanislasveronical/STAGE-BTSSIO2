<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBlocCriteria extends JsonObject
{
	
	/**
	 * The display criteria.
	 * 
	 * @var string
	 */
	private $_display = null;
	
	/**
	 * The expected criteria.
	 * 
	 * @var string
	 */
	private $_expected = null;
	
	/**
	 * Builds a new GmthApiGrilleBlocCriteria object with the given
	 * decoded json data and the given silent policy.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @throws JsonException if the object cannot be built and if not silent
	 */
	public function __construct(array $json, $silent = false)
	{
		foreach($json as $key => $value)
		{
			switch($key)
			{
				case 'display':
					$this->_display = $this->asString($value, $silent);
					break;
				case 'expected':
					$this->_expected = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the display criteria.
	 * 
	 * @return string
	 */
	public function getDisplay()
	{
		return $this->_display;
	}
	
	/**
	 * Gets the expected criteria.
	 * 
	 * @return string
	 */
	public function getExpected()
	{
		return $this->_expected;
	}
	
}
