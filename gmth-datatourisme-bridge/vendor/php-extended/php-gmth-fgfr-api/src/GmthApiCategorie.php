<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiCategorie extends JsonObject
{
	
	/**
	 * The id of the category.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The name of the category.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The priority of the category.
	 * 
	 * @var integer
	 */
	private $_priorite = null;
	
	/**
	 * The children activites of the category.
	 * 
	 * @var JsonCollection [GmthApiCategorie]
	 */
	private $_activites = null;
	
	/**
	 * Builds a new GmthApiCategorie with the given decoded json data.
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
				case 'nom_categorie':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'priorite':
					$this->_priorite = $this->asInteger($value, $silent);
					break;
				case 'activites':
					$this->_activites = new JsonCollection('\PhpExtended\Gmth\GmthApiActivite', $this->asArray($value, $silent), $silent);
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
		
		if($this->_activites === null)
			$this->_activites = new JsonCollection('\PhpExtended\Gmth\GmthApiActivite', array());
	}
	
	/**
	 * Gets the id of the category.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the category.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the priority of the category.
	 * 
	 * @return integer
	 */
	public function getPriorite()
	{
		return $this->_priorite;
	}
	
	/**
	 * Gets the activities linked to this category.
	 * 
	 * @return \PhpExtended\Json\JsonCollection[GmthApiActivite]
	 */
	public function getActivites()
	{
		return $this->_activites;
	}
	
}
