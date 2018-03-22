<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiConstant extends JsonObject
{
	
	/**
	 * The id of the constant.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The value of the constant.
	 * 
	 * @var integer
	 */
	private $_value = null;
	
	/**
	 * 
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
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
				case 'value':
					$this->_value = $this->asInteger($value, $silent);
					break;
				case '_sync':
				case '_syncAction':
					// no action
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the constant.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the value of the constant.
	 * 
	 * @return integer
	 */
	public function getValue()
	{
		return $this->_value;
	}
	
}
