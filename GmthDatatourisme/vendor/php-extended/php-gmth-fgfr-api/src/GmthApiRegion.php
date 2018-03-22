<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiRegion extends JsonObject
{
	
	/**
	 * Gets the id of the region.
	 *
	 * @var integer
	 */
	private $_id = null;
	
	/**
	 * Gets the name of the region.
	 *
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The last name of the regional contact.
	 * 
	 * @var string
	 */
	private $_nom_contact = null;
	
	/**
	 * The first name of the regional contact.
	 * 
	 * @var string
	 */
	private $_prenom_contact = null;
	
	/**
	 * The telephone number of the regional contact.
	 * 
	 * @var string
	 */
	private $_telephone_contact = null;
	
	/**
	 * The address of the regional contact.
	 * 
	 * @var string
	 */
	private $_adresse_contact = null;
	
	/**
	 * The email of the regional contact.
	 * 
	 * @var string
	 */
	private $_courriel_contact = null;
	
	/**
	 * The departements inside this region.
	 * 
	 * @var JsonCollection [GmthApiDepartement]
	 */
	private $_departements = null;
	
	/**
	 * Builds a new GmthApiRegion with the given decoded json data.
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
				case 'nom_region':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'prenom_contact':
					$this->_prenom_contact = $this->asString($value, $silent);
					break;
				case 'nom_contact':
					$this->_nom_contact = $this->asString($value, $silent);
					break;
				case 'telephone':
					$this->_telephone_contact = $this->asString($value, $silent);
					break;
				case 'adresse':
					$this->_adresse_contact = $this->asString($value, $silent);
					break;
				case 'courriel':
					$this->_courriel_contact = $this->asString($value, $silent);
					break;
				case 'departements':
					$this->_departements = new JsonCollection('\PhpExtended\Gmth\GmthApiDepartement', $this->asArray($value, $silent), $silent);
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
		
		if($this->_departements === null)
			$this->_departements = new JsonCollection('\PhpExtended\Gmth\GmthApiDepartement', array());
	}
	
	/**
	 * Gets the id of the region.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the region.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the last name of the contact for this region.
	 * 
	 * @return string
	 */
	public function getNomContact()
	{
		return $this->_nom_contact;
	}
	
	/**
	 * Gets the first name of the contact for this region.
	 * 
	 * @return string
	 */
	public function getPrenomContact()
	{
		return $this->_prenom_contact;
	}
	
	/**
	 * Gets the telephone of the contact for this region.
	 * 
	 * @return string
	 */
	public function getTelephoneContact()
	{
		return $this->_telephone_contact;
	}
	
	/**
	 * Gets the address of the contact for this region.
	 * 
	 * @return string
	 */
	public function getAdresseContact()
	{
		return $this->_adresse_contact;
	}
	
	/**
	 * Gets the email of the contact for this region.
	 * 
	 * @return string
	 */
	public function getCourrielContact()
	{
		return $this->_courriel_contact;
	}
	
	/**
	 * Gets the list of departements of this region.
	 * 
	 * @return \PhpExtended\Json\JsonCollection [GmthApiDepartement]
	 */
	public function getDepartements()
	{
		return $this->_departements;
	}
	
}
