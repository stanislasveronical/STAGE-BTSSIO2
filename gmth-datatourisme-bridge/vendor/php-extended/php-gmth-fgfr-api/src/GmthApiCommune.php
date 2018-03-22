<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiCommune extends JsonObject
{
	
	/**
	 * The id of the commune.
	 * 
	 * @var integer
	 */
	private $_id = null;
	
	/**
	 * The name of the commune.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The code postal of the commune.
	 * 
	 * @var string
	 */
	private $_code_postal = null;
	
	/**
	 * The code insee of the commune.
	 * 
	 * @var integer
	 */
	private $_code_insee = null;
	
	/**
	 * The departement this commune is in.
	 * 
	 * @var GmthApiDepartement
	 */
	private $_departement = null;
	
	/**
	 * Builds a new GmthApiCommune with the given decoded json data.
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
					$this->_id = $this->asInteger($value, $silent);
					break;
				case 'nom_commune':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'code_postal':
					$this->_code_postal = $this->asString($value, $silent);
					break;
				case 'code_i_n_s_e_e':
					$this->_code_insee = $this->asInteger($value, $silent);
					break;
				case 'departement':
					$this->_departement = new GmthApiDepartement($this->asArray($value, $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the city.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the city.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the code postal of the city.
	 * 
	 * @return string
	 */
	public function getCodePostal()
	{
		return $this->_code_postal;
	}
	
	/**
	 * Gets the code insee of the city.
	 * 
	 * @return integer
	 */
	public function getCodeInsee()
	{
		return $this->_code_insee;
	}
	
	/**
	 * Gets the department of the city.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiDepartement
	 */
	public function getDepartement()
	{
		return $this->_departement;
	}
	
}
