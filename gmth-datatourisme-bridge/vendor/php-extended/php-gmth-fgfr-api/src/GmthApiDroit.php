<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDroit extends JsonObject
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
	 * The categorie of the profil.
	 * 
	 * @var string
	 */
	private $_categorie = null;
	
	/**
	 * Builds a new GmthApiDroit object with the given decoded json data and
	 * the given silent policy.
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
					$this->_id = $this->asString($value, $silent);
					break;
				case 'nom_droit':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'description':
					$this->_description = $this->asString($value, $silent);
					break;
				case 'categorie':
					$this->_categorie = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the right.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the right.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the description of the right.
	 * 
	 * @return string
	 */
	public function getDescription()
	{
		return $this->_description;
	}
	
	/**
	 * Gets the category of the right.
	 * 
	 * @return string
	 */
	public function getCategorie()
	{
		return $this->_categorie;
	}
	
}
