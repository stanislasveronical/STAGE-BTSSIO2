<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBlocDisplayRule extends JsonObject
{
	
	/**
	 * The effective rule.
	 * 
	 * @var string
	 */
	private $_rule = null;
	
	/**
	 * Builds a new GmthApiGrilleDisplayRule object with the given
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
				case '0':
					$this->_rule = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the display rule of the block.
	 * 
	 * @return string
	 */
	public function getRule()
	{
		return $this->_rule;
	}
	
}
