<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleData extends JsonObject
{
	
	/**
	 * The metadata of the evaluation.
	 * 
	 * @var GmthApiGrilleMetadata
	 */
	private $_metadata = null;
	
	/**
	 * The question blocks of the grille.
	 * 
	 * @var JsonCollection [GmthApiGrilleBloc]
	 */
	private $_blocs = null;
	
	/**
	 * Builds a new GmthApiGrilleData object with the given decoded
	 * json data and the given silent policy.
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
				case 'metadata':
					$this->_metadata = new GmthApiGrilleMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'bloc':
					$this->_blocs = new JsonCollection('\PhpExtended\Gmth\GmthApiGrilleBloc', $this->asArray($value, $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
		
		if($this->_blocs === null)
			$this->_blocs = new JsonCollection('\PhpExtended\Gmth\GmthApiGrilleBloc', array());
	}
	
	/**
	 * Gets the metadata about this grid.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleMetadata
	 */
	public function getMetadata()
	{
		return $this->_metadata;
	}
	
	/**
	 * Gets the blocks that forms the grid.
	 * 
	 * @return \PhpExtended\Json\JsonCollection[GmthApiGrilleBloc]
	 */
	public function getBlocs()
	{
		return $this->_blocs;
	}
	
}
