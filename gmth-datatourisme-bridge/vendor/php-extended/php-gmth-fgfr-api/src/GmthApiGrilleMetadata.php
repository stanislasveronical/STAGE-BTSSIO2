<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleMetadata extends JsonObject
{
	
	/**
	 * The id of the metadata.
	 * 
	 * @var integer
	 */
	private $_id = null;
	
	/**
	 * The label of the metadata.
	 * 
	 * @var string
	 */
	private $_label = null;
	
	/**
	 * The date of visite of the evaluation.
	 * 
	 * @var \DateTime
	 */
	private $_date_visite = null;
	
	/**
	 * Builds a new GmthApiGrilleMetadata object with the given
	 * decoded json data and the given silent policy.
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
					$this->_id = $this->asInteger($value, $silent);
					break;
				case 'label':
					$this->_label = $this->asString($value, $silent);
					break;
				case 'visite':
					$this->_date_visite = $this->asDatetime($value, 'Y-m-d', $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of this grid.
	 * 
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of this grid.
	 * 
	 * @return string
	 */
	public function getLabel()
	{
		return $this->_label;
	}
	
	/**
	 * Gets the date of the visite.
	 * 
	 * @return \DateTime
	 */
	public function getDateVisite()
	{
		return $this->_date_visite;
	}
	
}
