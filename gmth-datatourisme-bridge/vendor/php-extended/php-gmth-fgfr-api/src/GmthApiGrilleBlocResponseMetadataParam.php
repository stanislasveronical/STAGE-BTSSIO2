<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBlocResponseMetadataParam extends JsonObject
{
	
	/**
	 * The placeholder of the input.
	 * 
	 * @var string
	 */
	private $_placeholder = null;
	
	/**
	 * Builds a new GmthApiGrilleBlocResponseMetadataParam object
	 * with the given decoded json data and the given silent policy.
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
				case 'placeholder':
					$this->_placeholder = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the placeholder for the response.
	 * 
	 * @return string
	 */
	public function getPlaceholder()
	{
		return $this->_placeholder;
	}
	
}
