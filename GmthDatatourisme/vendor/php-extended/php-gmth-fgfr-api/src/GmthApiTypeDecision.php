<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiTypeDecision extends JsonObject
{
	
	/**
	 * Gets the id of the type demande.
	 *
	 * @var integer
	 */
	private $_id = null;
	
	/**
	 * Gets the name of the type demande.
	 *
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * Builds a new GmthApiTypeDemande with the given decoded json data.
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
				case 'type_decision':
					$this->_nom = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the if of the type decision.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the nom of the type decision.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
}
