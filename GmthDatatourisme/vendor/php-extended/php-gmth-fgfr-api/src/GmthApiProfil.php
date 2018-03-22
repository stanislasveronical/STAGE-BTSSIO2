<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiProfil extends JsonObject
{
	
	/**
	 * The id of the profil.
	 * 
	 * @var integer
	 */
	private $_id = null;
	
	/**
	 * The name of the profil.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The description of the profil.
	 * 
	 * @var string
	 */
	private $_description = null;
	
	/**
	 * The rights of the profil.
	 * 
	 * @var JsonCollection [GmthApiDroit]
	 */
	private $_droits = null;
	
	/**
	 * Builds a new GmthApiProfil object with the given decoded json data
	 * and the given silent policy.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @throws JsonException if the object cannot be built and if not silent
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
				case 'nom_profil':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'description':
					$this->_description = $this->asString($value, $silent);
					break;
				case 'droits':
					$this->_droits = new JsonCollection('\PhpExtended\Gmth\GmthApiDroit', $this->asArray($value, $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
		
		if($this->_droits === null)
			$this->_droits = new JsonCollection('\PhpExtended\Gmth\GmthApiDroit', array());
	}
	
	/**
	 * Gets the id of the profile.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the profile.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the description of the profile.
	 * 
	 * @return string
	 */
	public function getDescription()
	{
		return $this->_description;
	}
	
	/**
	 * Gets the list of rights that are given to the profile.
	 * 
	 * @return \PhpExtended\Json\JsonCollection[GmthApiDroit]
	 */
	public function getDroitCollection()
	{
		return $this->_droits;
	}
	
}
