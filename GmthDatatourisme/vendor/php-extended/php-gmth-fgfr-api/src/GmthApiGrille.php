<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrille extends JsonObject
{
	
	/**
	 * The id of the grid.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The name of the grid.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The validity date of the grid.
	 * 
	 * @var \DateTime
	 */
	private $_date_debut = null;
	
	/**
	 * The last updated date of the grid.
	 * 
	 * @var \DateTime
	 */
	private $_updated = null;
	
	/**
	 * The end of validity date of the grid.
	 * 
	 * @var \DateTime
	 */
	private $_date_fin = null;
	
	/**
	 * The data of the grid.
	 *
	 * @var GmthApiGrilleData
	 */
	private $_data = null;
	
	/**
	 * The type of grid.
	 * 
	 * @var integer
	 */
	private $_type = null;
	
	/**
	 * The version number of the grid.
	 * 
	 * @var integer
	 */
	private $_version = null;
	
	/**
	 * Gets the description of the grid.
	 * 
	 * @var string
	 */
	private $_description = null;
	
	/**
	 * The etag of the grid.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * Builds a new GmthApiGrille object with the given decoded json
	 * data and the given silent policy.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @throws JsonException if the object cannot be built and if not silent
	 */
	public function __construct(array $json, $silent = false)
	{
		foreach($json as $key => $value)
		{
			switch($key)
			{
				case 'id':
					$this->_id = $this->asString($value, $silent);
					break;
				case 'nom_grille':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'date_debut':
					$this->_date_debut = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'updated':
					$this->_updated = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'date_fin':
					$this->_date_fin = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'data':
					$this->_data = new GmthApiGrilleData($this->asArray($value, $silent), $silent);
					break;
				case 'type':
					$this->_type = $this->asInteger($value, $silent);
					break;
				case 'version':
					$this->_version = $this->asInteger($value, $silent);
					break;
				case 'description':
					$this->_description = $this->asInteger($value, $silent);
					break;
				case 'etag':
					$this->_etag = $this->asInteger($value, $silent);
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
	 * Gets the id of the grid.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the grid.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the date when the candidature started.
	 * 
	 * @return \DateTime
	 */
	public function getDateDebut()
	{
		return $this->_date_debut;
	}
	
	/**
	 * Gets the last updated date time.
	 * 
	 * @return \DateTime
	 */
	public function getDateUpdated()
	{
		return $this->_updated;
	}
	
	/**
	 * Gets the date of end validity.
	 * 
	 * @return \DateTime
	 */
	public function getDateFin()
	{
		return $this->_date_fin;
	}
	
	/**
	 * Gets the data of the grid.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleData
	 */
	public function getData()
	{
		return $this->_data;
	}
	
	/**
	 * Gets the type of the grid.
	 * 
	 * @return integer
	 */
	public function getType()
	{
		return $this->_type;
	}
	
	/**
	 * Gets the version of the grid.
	 * 
	 * @return integer
	 */
	public function getVersion()
	{
		return $this->_version;
	}
	
	/**
	 * Gets the description of the grid.
	 * 
	 * @return string
	 */
	public function getDescription()
	{
		return $this->_description;
	}
	
	/**
	 * Gets the etag of the grid.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
}
