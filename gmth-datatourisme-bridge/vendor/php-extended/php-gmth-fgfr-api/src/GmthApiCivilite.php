<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiCivilite extends JsonObject
{
	
	/**
	 * Gets the id of the civilite.
	 *
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * Gets the name of the civilite.
	 *
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * Builds a new GmthApiCivilite with the given decoded json data.
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
				case 'libelle':
					$this->_nom = $this->asString($value, $silent);
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
	 * Gets the id of the civility.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the civility.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
}
