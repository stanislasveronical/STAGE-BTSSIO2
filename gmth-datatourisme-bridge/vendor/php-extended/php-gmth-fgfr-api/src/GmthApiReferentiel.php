<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiReferentiel extends JsonObject
{
	
	/**
	 * The profil Collection.
	 * 
	 * @var JsonCollection[GmthApiProfil]
	 */
	private $_profils = null;
	
	/**
	 * Builds a new GmthApiReferentiel with the given decoded json data and
	 * the given silent policy.
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
				case 'profil':
					$this->_profils = new JsonCollection('\PhpExtended\Gmth\GmthApiProfil', $this->asArray($json['profil'], $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
		
		if($this->_profils === null)
			$this->_profils = new JsonCollection('\PhpExtended\Gmth\GmthApiProfil', array());
	}
	
	/**
	 * Gets the list of profiles for this referentiel.
	 * 
	 * @return \PhpExtended\Json\JsonCollection[GmthApiProfil]
	 */
	public function getProfils()
	{
		return $this->_profils;
	}
	
}
