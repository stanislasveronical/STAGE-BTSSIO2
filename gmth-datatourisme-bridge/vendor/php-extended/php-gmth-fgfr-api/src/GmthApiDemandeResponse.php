<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDemandeResponse extends JsonObject
{
	
	/**
	 * The id of the demande.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The numero demande.
	 * 
	 * @var string
	 */
	private $_numero_demande = null;
	
	/**
	 * The date of creation of the demande.
	 * 
	 * @var \DateTime
	 */
	private $_created = null;
	
	/**
	 * Whether this demande is locked.
	 * 
	 * @var boolean
	 */
	private $_locked = null;
	
	/**
	 * The id of the locker.
	 * 
	 * @var string
	 */
	private $_locker_id = null;
	
	/**
	 * The name of the locker.
	 * 
	 * @var string
	 */
	private $_locker_fullname = null;
	
	/**
	 * The type of the demande.
	 * 
	 * @var string
	 */
	private $_type_demande = null;
	
	/**
	 * The id of the etablissement.
	 * 
	 * @var string
	 */
	private $_etablissement_id = null;
	
	/**
	 * The name of the etablissement.
	 * 
	 * @var string
	 */
	private $_nom_etablissement = null;
	
	/**
	 * The name of the commune.
	 * 
	 * @var string
	 */
	private $_nom_commune = null;
	
	/**
	 * The id of the candidature.
	 * 
	 * @var string
	 */
	private $_candidature_id = null;
	
	/**
	 * The etag of the demande.
	 * 
	 * @var integer
	 */
	private $_candidature_etag = null;
	
	/**
	 * The activities this demande has.
	 * 
	 * @var string[]
	 */
	private $_activites = array();
	
	/**
	 * The name of the state of the demande.
	 * 
	 * @var string
	 */
	private $_nom_etat = null;
	
	/**
	 * The etag of the demande.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * The ids of the evaluations
	 * 
	 * @var string[]
	 */
	private $_evaluation_ids = array();
	
	/**
	 * Builds a new GmthApiDemandeResponse with the given decoded json data.
	 * 
	 * @param array $json
	 * @param string $silent
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
				case 'numero_demande':
					$this->_numero_demande = $this->asString($value, $silent);
					break;
				case 'created':
					$this->_created = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'locked':
					$this->_locked = $this->asBoolean($value, $silent);
					break;
				case 'locker_id':
					$this->_locker_id = $this->asString($value, $silent);
					break;
				case 'locker_fullname':
					$this->_locker_fullname = $this->asString($value, $silent);
					break;
				case 'type_demande':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						switch($key2)
						{
							case 'type_demande':
								$this->_type_demande = $this->asString($value2, $silent);
								break;
							default:
								if(!$silent)
									throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
										array('{key}' => $key2, '{class}' => get_class($this))));
						}
					}
					break;
				case 'etablissement':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						switch($key2)
						{
							case 'id':
								$this->_etablissement_id = $this->asString($value2, $silent);
								break;
							case 'nom_etablissement':
								$this->_nom_etablissement = $this->asString($value2, $silent);
								break;
							case 'commune':
								foreach($this->asArray($value2, $silent) as $key3 => $value3)
								{
									switch($key3)
									{
										case 'nom_commune':
											$this->_nom_commune = $this->asString($value3, $silent);
											break;
										default:
											if(!$silent)
												throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
													array('{key}' => $key3, '{class}' => get_class($this))));
									}
								}
								break;
							default:
								if(!$silent)
									throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
										array('{key}' => $key2, '{class}' => get_class($this))));
						}
					}
					break;
				case 'candidature':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						switch($key2)
						{
							case 'id':
								$this->_candidature_id = $this->asString($value2, $silent);
								break;
							case 'etag':
								// ignore
								break;
							default:
								if(!$silent)
									throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
										array('{key}' => $key2, '{class}' => get_class($this))));
						}
					}
					break;
				case 'activites':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						if(is_int($key2))
						{
							foreach($this->asArray($value2) as $key3 => $value3)
							{
								switch($key3)
								{
									case 'nom_activite':
										$this->_activites[] = $this->asString($value3, $silent);
										break;
									default:
										if(!$silent)
											throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
												array('{key}' => $key3, '{class}' => get_class($this))));
								}
							}
						}
						else if(!$silent)
							throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
								array('{key}' => $key2, '{class}' => get_class($this))));
					}
					break;
				case 'etat':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						switch($key2)
						{
							case 'nom_etat':
								$this->_nom_etat = $this->asString($value2, $silent);
								break;
							default:
								if(!$silent)
									throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
										array('{key}' => $key2, '{class}' => get_class($this))));
						}
					}
					break;
				case 'evaluations':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						if(is_int($key2))
						{
							foreach($this->asArray($value2) as $key3 => $value3)
							{
								switch($key3)
								{
									case 'id':
										$this->_evaluation_ids[] = $this->asString($value3, $silent);
										break;
									case 'etag':
										// ignore
										break;
									default:
										if(!$silent)
											throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
												array('{key}' => $key3, '{class}' => get_class($this))));
								}
							}
						}
						else if(!$silent)
							throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
								array('{key}' => $key2, '{class}' => get_class($this))));
					}
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
	 * Gets the id of the demande.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the number of demande.
	 * 
	 * @return string
	 */
	public function getNumeroDemande()
	{
		return $this->_numero_demande;
	}
	
	/**
	 * Gets the date of creation of this demande.
	 * 
	 * @return \DateTime
	 */
	public function getCreated()
	{
		return $this->_created;
	}
	
	/**
	 * Gets whether this demande is locked.
	 * 
	 * @return boolean
	 */
	public function getLocked()
	{
		return $this->_locked;
	}
	
	/**
	 * Gets the id of the locker.
	 * 
	 * @return string
	 */
	public function getLockerId()
	{
		return $this->_locker_id;
	}
	
	/**
	 * Gets the full name of the locker.
	 * 
	 * @return string
	 */
	public function getLockerFullname()
	{
		return $this->_locker_fullname;
	}
	
	/**
	 * Gets the name of the type of demande.
	 * 
	 * @return string
	 */
	public function getTypeDemande()
	{
		return $this->_type_demande;
	}
	
	/**
	 * Gets the id of the etablissement.
	 * 
	 * @return string
	 */
	public function getEtablissementId()
	{
		return $this->_etablissement_id;
	}
	
	/**
	 * Gets the name of the etablissement.
	 * 
	 * @return string
	 */
	public function getNomEtablissement()
	{
		return $this->_nom_etablissement;
	}
	
	/**
	 * Gets the name of the city.
	 * 
	 * @return string
	 */
	public function getNomCommune()
	{
		return $this->_nom_commune;
	}
	
	/**
	 * Gets the id of the candidature.
	 * 
	 * @return integer
	 */
	public function getCandidatureId()
	{
		return $this->_candidature_id;
	}
	
	/**
	 * Gets the etag of the candidature.
	 * 
	 * @return integer
	 */
	public function getCandidatureEtag()
	{
		return $this->_candidature_etag;
	}
	
	/**
	 * Gets the activities of this demande.
	 * 
	 * @return string[]
	 */
	public function getActivites()
	{
		return $this->_activites;
	}
	
	/**
	 * Gets the name of the state for this demande.
	 * 
	 * @return string
	 */
	public function getNomEtat()
	{
		return $this->_nom_etat;
	}
	
	/**
	 * Gets the etag of this demande.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
	/**
	 * Gets the ids of the evaluations for this demande.
	 * 
	 * @return string[]
	 */
	public function getEvaluationIds()
	{
		return $this->_evaluation_ids;
	}
	
}
