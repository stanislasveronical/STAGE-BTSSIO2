<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiPieceJointe extends JsonObject
{
	
	/**
	 * The id of the piece jointe.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * When the piece jointe was created.
	 * 
	 * @var \DateTime
	 */
	private $_created = null;
	
	/**
	 * When the piece jointe was last updated.
	 * 
	 * @var \DateTime
	 */
	private $_updated = null;
	
	/**
	 * The type of piece jointe.
	 * 
	 * @var GmthApiTypePieceJointe
	 */
	private $_type_piece_jointe = null;
	
	/**
	 * The technical name of the piece jointe.
	 * 
	 * @var string
	 */
	private $_nom_technique = null;
	
	/**
	 * The user name of the piece jointe.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The size of the piece jointe, in bytes.
	 * 
	 * @var integer
	 */
	private $_taille = null;
	
	/**
	 * Builds a new GmthApiPieceJointe with the given decoded json data.
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
				case 'created':
					$this->_created = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'updated':
					$this->_created = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'type_piece_jointe':
					$this->_type_piece_jointe = new GmthApiTypePieceJointe($this->asArray($value, $silent), $silent);
					break;
				case 'nom_technique':
					$this->_nom_technique = $this->asString($value, $silent);
					break;
				case 'nom':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'taille':
					$this->_taille = $this->asInteger($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the piece jointe.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the created date.
	 * 
	 * @return DateTime
	 */
	public function getCreated()
	{
		return $this->_created;
	}
	
	/**
	 * Gets the last updated date.
	 * 
	 * @return DateTime
	 */
	public function getUpdated()
	{
		return $this->_updated;
	}
	
	/**
	 * Gets the type of the piece jointe.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiTypePieceJointe
	 */
	public function getTypePieceJointe()
	{
		return $this->_type_piece_jointe;
	}
	
	/**
	 * Gets the technical name of the piece jointe.
	 * 
	 * @return string
	 */
	public function getNomTechnique()
	{
		return $this->_nom_technique;
	}
	
	/**
	 * Gets the name of the piece jointe.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the size of the piece jointe.
	 * 
	 * @return integer
	 */
	public function getTaille()
	{
		return $this->_taille;
	}
}
