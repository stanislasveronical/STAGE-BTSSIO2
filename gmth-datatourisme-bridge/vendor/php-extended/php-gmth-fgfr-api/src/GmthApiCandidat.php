<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiCandidat extends JsonObject
{
	
	/**
	 * The id of the candidate.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The numero compte of the candidate.
	 * 
	 * @var string
	 */
	private $_numero_compte = null;
	
	/**
	 * The civility of the candidate.
	 * 
	 * @var string
	 */
	private $_civilite = null;
	
	/**
	 * The last name of the candidate.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The first name of the candidate.
	 * 
	 * @var string
	 */
	private $_prenom = null;
	
	/**
	 * The phone number of the candidate.
	 * 
	 * @var string
	 */
	private $_telephone = null;
	
	/**
	 * Whether this candidate is from the reprise.
	 * 
	 * @var boolean
	 */
	private $_reprise = null;
	
	/**
	 * The etag of the candidate.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * The email of the candidate.
	 * 
	 * @var string
	 */
	private $_email = null;
	
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
				case 'numero_compte':
					$this->_numero_compte = $this->asInteger($value, $silent);
					break;
				case 'civilite':
					$this->_civilite = $this->asString($value, $silent);
					break;
				case 'nom':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'prenom':
					$this->_prenom = $this->asString($value, $silent);
					break;
				case 'telephone':
					$this->_telephone = $this->asString($value, $silent);
					break;
				case 'reprise':
					$this->_reprise = $this->asString($value, $silent);
					break;
				case 'etag':
					$this->_etag = $this->asString($value, $silent);
					break;
				case 'email':
					$this->_email = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key2, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * The id of the candidate.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * The numero compte of the candidate.
	 * 
	 * @return string
	 */
	public function getNumeroCompte()
	{
		return $this->_numero_compte;
	}
	
	/**
	 * The civility of the candidate.
	 * 
	 * @return string
	 */
	public function getCivilite()
	{
		return $this->_civilite;
	}
	
	/**
	 * The first name of the candidate.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * The last name of the candidate.
	 * 
	 * @return string
	 */
	public function getPrenom()
	{
		return $this->_prenom;
	}
	
	/**
	 * The phone number of the candidate.
	 * 
	 * @return string
	 */
	public function getTelephone()
	{
		return $this->_telephone;
	}
	
	/**
	 * Whether this candidate is from the reprise.
	 * 
	 * @return boolean
	 */
	public function getReprise()
	{
		return $this->_reprise;
	}
	
	/**
	 * The etag of the candidate.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
	/**
	 * The email of the candidate.
	 * 
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_email;
	}
	
}
