<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiActivite extends JsonObject
{
	
	/**
	 * The id of the activite.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The name of the activite.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The parent category of the activite.
	 * 
	 * @var GmthApiCategorie
	 */
	private $_categorie = null;
	
	/**
	 * Builds a new GmthApiActivite with the given decoded json data.
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
				case 'nom_activite':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'categorie':
					$this->_categorie = new GmthApiCategorie($this->asArray($value, $silent), $silent);
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
	 * Gets the id of the activity.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the activity.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the category of the activity.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiCategorie
	 */
	public function getCategorie()
	{
		return $this->_categorie;
	}
	
}
