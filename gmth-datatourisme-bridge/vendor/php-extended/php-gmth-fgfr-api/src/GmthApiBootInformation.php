<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiBootInformation extends JsonObject
{
	
	/**
	 * The uuid of current user.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The email of current user.
	 * 
	 * @var string
	 */
	private $_email = null;
	
	/**
	 * The application name of current user.
	 * 
	 * @var string
	 */
	private $_username = null;
	
	/**
	 * The first name of current user.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The last name of current user.
	 * 
	 * @var string
	 */
	private $_prenom = null;
	
	/**
	 * The credentials of current user.
	 * 
	 * @var GmthApiCredential
	 */
	private $_credential = null;
	
	/**
	 * The id of the profile of current user.
	 * 
	 * @var integer
	 */
	private $_profil_id = null;
	
	/**
	 * The name of the region current user is attached to.
	 * 
	 * @var string
	 */
	private $_region_id = null;
	
	/**
	 * The referentiels for current user.
	 * 
	 * @var GmthApiReferentiel
	 */
	private $_referentiels = null;
	
	/**
	 * The telephone fixe of current user.
	 * 
	 * @var string
	 */
	private $_telephone_fixe = null;
	
	/**
	 * The telephone portable of current user.
	 * 
	 * @var string
	 */
	private $_telephone_portable = null;
	
	/**
	 * The adress of the relais for current user.
	 * 
	 * @var string
	 */
	private $_adresse_relais = null;
	
	/**
	 * The email of the relais for current user.
	 * 
	 * @var string
	 */
	private $_courriel_relais = null;
	
	/**
	 * The name of the relais for current user.
	 * 
	 * @var string
	 */
	private $_nom_relais = null;
	
	/**
	 * The telephone number of the relais for current user.
	 * 
	 * @var string
	 */
	private $_telephone_relais = null;
	
	/**
	 * The civility of current user.
	 * 
	 * @var string
	 */
	private $_civilite = null;
	
	/**
	 * The organisme current user works in.
	 * 
	 * @var string
	 */
	private $_organisme = null;
	
	/**
	 * Whether this user is enabled.
	 * 
	 * @var boolean
	 */
	private $_enabled = null;
	
	/**
	 * The current status of the user.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * Builds a new GmthApiBootInformation object with the given decoded json
	 * data and the given silent policy.
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
				case 'email':
					$this->_email = $this->asString($value, $silent);
					break;
				case 'username':
					$this->_username = $this->asString($value, $silent);
					break;
				case 'nom':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'prenom':
					$this->_prenom = $this->asString($value, $silent);
					break;
				case 'credential':
					$this->_credential = new GmthApiCredential($this->asArray($value, $silent), $silent);
					break;
				case 'profil_id':
					$this->_profil_id = $this->asInteger($value, $silent);
					break;
				case 'region_id':
					$this->_region_id = $this->asString($value, $silent);
					break;
				case 'referentiels':
					$this->_referentiels = new GmthApiReferentiel($this->asArray($value, $silent), $silent);
					break;
				case 'telephone_fixe':
					$this->_telephone_fixe = $this->asString($value, $silent);
					break;
				case 'telephone_portable':
					$this->_telephone_portable = $this->asString($value, $silent);
					break;
				case 'adresse_relais':
					$this->_adresse_relais = $this->asString($value, $silent);
					break;
				case 'courriel_relais':
					$this->_courriel_relais = $this->asString($value, $silent);
					break;
				case 'nom_relais':
					$this->_nom_relais = $this->asString($value, $silent);
					break;
				case 'telephone_relais':
					$this->_telephone_relais = $this->asString($value, $silent);
					break;
				case 'civilite':
					$this->_civilite = $this->asString($value, $silent);
					break;
				case 'organisme':
					$this->_organisme = $this->asString($value, $silent);
					break;
				case 'enabled':
					$this->_enabled = $this->asBoolean($value, $silent);
					break;
				case 'etag':
					$this->_etag = $this->asInteger($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of this user.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the email of this user.
	 * 
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_email;
	}
	
	/**
	 * Gets the username of this user.
	 * 
	 * @return string
	 */
	public function getUsername()
	{
		return $this->_username;
	}
	
	/**
	 * Gets the last name of this user.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the first name of this user.
	 * 
	 * @return string
	 */
	public function getPrenom()
	{
		return $this->_prenom;
	}
	
	/**
	 * Gets the credentials of this user.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiCredential
	 */
	public function getCredentials()
	{
		return $this->_credential;
	}
	
	/**
	 * Gets the profile id of this user.
	 * 
	 * @return number
	 */
	public function getProfilId()
	{
		return $this->_profil_id;
	}
	
	/**
	 * Gets the region this user is bound to.
	 * 
	 * @return string
	 */
	public function getRegionId()
	{
		return $this->_region_id;
	}
	
	/**
	 * Gets the referentiels of rights.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiReferentiel
	 */
	public function getReferentiels()
	{
		return $this->_referentiels;
	}
	
	/**
	 * Gets the phone number of the current user.
	 * 
	 * @return string
	 */
	public function getTelephoneFixe()
	{
		return $this->_telephone_fixe;
	}
	
	/**
	 * Gets the mobile number of the current user.
	 * 
	 * @return string
	 */
	public function getTelephonePortable()
	{
		return $this->_telephone_portable;
	}
	
	/**
	 * Gets the address of the relais local.
	 * 
	 * @return string
	 */
	public function getAdresseRelais()
	{
		return $this->_adresse_relais;
	}
	
	/**
	 * Gets the email of the relais local.
	 * 
	 * @return string
	 */
	public function getCourrielRelais()
	{
		return $this->_courriel_relais;
	}
	
	/**
	 * Gets the name of the relais local.
	 * 
	 * @return string
	 */
	public function getNomRelais()
	{
		return $this->_nom_relais;
	}
	
	/**
	 * Gets the phone number of the relais local.
	 * 
	 * @return string
	 */
	public function getTelephoneRelais()
	{
		return $this->_telephone_relais;
	}
	
	/**
	 * Gets the name of the civility of the user.
	 * 
	 * @return string
	 */
	public function getCivilite()
	{
		return $this->_civilite;
	}
	
	/**
	 * Gets the organisme of current user.
	 * 
	 * @return string
	 */
	public function getOrganisme()
	{
		return $this->_organisme;
	}
	
	/**
	 * Gets whether this user is enabled.
	 * 
	 * @return boolean
	 */
	public function getEnabled()
	{
		return $this->_enabled;
	}
	
	/**
	 * Gets the etag of this user.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
}
