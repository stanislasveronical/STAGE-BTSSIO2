<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBlocResponseMetadata extends JsonObject
{
	
	/**
	 * Whether to use this input.
	 * 
	 * @var boolean
	 */
	private $_use = null;
	
	/**
	 * The type of this input.
	 * 
	 * @var string
	 */
	private $_type = null;
	
	/**
	 * The value of this input.
	 * 
	 * @var string
	 */
	private $_input = null;
	
	/**
	 * The surface controls for this input.
	 * 
	 * @var GmthApiGrilleBlocResponseMetadataSurface
	 */
	private $_surface = null;
	
	/**
	 * The params for this input.
	 * 
	 * @var GmthApiGrilleBlocResponseMetadataParam
	 */
	private $_param = null;
	
	/**
	 * Build a new GmthApiGrilleBlocResponseMetadata object with the
	 * given decoded json data and the given silent policy.
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
				case 'use':
					$this->_use = $this->asBoolean($value, $silent);
					break;
				case 'type':
					$this->_type = $this->asString($value, $silent);
					break;
				case 'input':
					$this->_input = $this->asString($value, true);
					break;
				case 'surface':
					$this->_surface = new GmthApiGrilleBlocResponseMetadataSurface($this->asArray($value, $silent), $silent);
					break;
				case 'param':
					$this->_param = new GmthApiGrilleBlocResponseMetadataParam($this->asArray($value, $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the use of this response block.
	 * 
	 * @return boolean
	 */
	public function getUse()
	{
		return $this->_use;
	}
	
	/**
	 * Gets the type of this response block.
	 * 
	 * @return string
	 */
	public function getType()
	{
		return $this->_type;
	}
	
	/**
	 * Gets the input value of this response block.
	 * 
	 * @return string
	 */
	public function getInput()
	{
		return $this->_input;
	}
	
	/**
	 * Gets the surface controls of this response block.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadataSurface
	 */
	public function getSurface()
	{
		return $this->_surface;
	}
	
	/**
	 * Gets the params of this response block.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadataParam
	 */
	public function getParam()
	{
		return $this->_param;
	}
	
}
