<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiEtat extends JsonObject
{
	
	/**
	 * The id of the state.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The name of the state.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The priority of the state.
	 * 
	 * @var integer
	 */
	private $_priorite = null;
	
	/**
	 * Builds a new GmthApiEtat with the given decoded json data.
	 * 
	 * @param mixed[] $json
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
				case 'nom_etat':
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
	 * Gets the id of the state.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the state.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the priority of the state.
	 * 
	 * @return integer
	 */
	public function getPriorite()
	{
		return $this->_priorite;
	}
	
}
