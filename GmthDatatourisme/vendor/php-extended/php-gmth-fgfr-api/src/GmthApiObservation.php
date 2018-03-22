<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiObservation extends JsonObject
{
	
	/**
	 * The id of the observation.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The text of the observation.
	 * 
	 * @var string
	 */
	private $_text = null;
	
	/**
	 * The date of the observation.
	 * 
	 * @var \DateTime
	 */
	private $_date = null;
	
	/**
	 * The id of the user.
	 * 
	 * @var string
	 */
	private $_id_utilisateur = null;
	
	/**
	 * The first name of the user.
	 * 
	 * @var string
	 */
	private $_prenom_utilisateur = null;
	
	/**
	 * The last name of the user.
	 * 
	 * @var string
	 */
	private $_nom_utilisateur = null;
	
	/**
	 * Builds a new GmthApiObservation with the given decoded json data.
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
				case 'observation':
					$this->_text = $this->asString($value, $silent);
					break;
				case 'date':
					$this->_date = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'id_utilisateur':
					$this->_id_utilisateur = $this->asString($value, $silent);
					break;
				case 'prenom_utilisateur':
					$this->_prenom_utilisateur = $this->asString($value, $silent);
					break;
				case 'nom_utilisateur':
					$this->_nom_utilisateur = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the observation.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the text of the observation.
	 * 
	 * @return string
	 */
	public function getText()
	{
		return $this->_text;
	}
	
	/**
	 * Gets the creation date of the observation.
	 * 
	 * @return DateTime
	 */
	public function getDate()
	{
		return $this->_date;
	}
	
	/**
	 * Gets the id of the user.
	 * 
	 * @return string
	 */
	public function getIdUtilisateur()
	{
		return $this->_id_utilisateur;
	}
	
	/**
	 * Gets the first name of the user.
	 * 
	 * @return string
	 */
	public function getPrenomUtilisateur()
	{
		return $this->_prenom_utilisateur;
	}
	
	/**
	 * Gets the last name of the user.
	 * 
	 * @return string
	 */
	public function getNomUtilisateur()
	{
		return $this->_nom_utilisateur;
	}
	
}
