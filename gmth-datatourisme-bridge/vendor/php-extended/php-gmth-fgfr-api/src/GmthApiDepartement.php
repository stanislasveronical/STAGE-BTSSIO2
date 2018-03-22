<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDepartement extends JsonObject
{
	
	/**
	 * The code of the departement.
	 * 
	 * @var string
	 */
	private $_code = null;
	
	/**
	 * The name of the departement.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The region from that departement.
	 * 
	 * @var GmthApiRegion
	 */
	private $_region = null;
	
	/**
	 * Builds a new GmthApiDepartement with the given decoded json data.
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
				case 'code_departement':
					$this->_code = $this->asString($value, $silent);
					break;
				case 'nom_departement':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'region':
					$this->_region = new GmthApiRegion($this->asArray($value, $silent), $silent);
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
	 * Gets the code of the department.
	 * 
	 * @return string
	 */
	public function getCode()
	{
		return $this->_code;
	}
	
	/**
	 * Gets the name of the department.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the region of the department.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiRegion
	 */
	public function getRegion()
	{
		return $this->_region;
	}
	
}
