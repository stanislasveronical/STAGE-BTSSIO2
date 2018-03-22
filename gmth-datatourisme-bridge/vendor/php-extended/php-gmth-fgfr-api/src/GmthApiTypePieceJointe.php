<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiTypePieceJointe extends JsonObject
{
	
	/**
	 * Gets the id of the type piece jointe.
	 *
	 * @var integer
	 */
	private $_id = null;
	
	/**
	 * Gets the name of the type piece jointe.
	 *
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * Gets the priority of the type piece jointe.
	 * 
	 * @var integer
	 */
	private $_priorite = null;
	
	/**
	 * Builds a new GmthApiTypePieceJointe with the given decoded json data.
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
				case 'type_piece_jointe':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'priorite':
					$this->_priorite = $this->asInteger($value, $silent);
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
	 * Gets the id of the type piece jointe.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the type piece jointe.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the priority of the type piece jointe.
	 * 
	 * @return integer
	 */
	public function getPriorite()
	{
		return $this->_priorite;
	}
	
}
