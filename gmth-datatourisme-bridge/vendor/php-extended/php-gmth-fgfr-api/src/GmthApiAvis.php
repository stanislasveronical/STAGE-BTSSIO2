<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiAvis extends JsonObject
{
	
	/**
	 * The id of the avis.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The avis of the commission.
	 * 
	 * @var boolean
	 */
	private $_avis_commission = null;
	
	/**
	 * Whether the picto auditif is ok.
	 * 
	 * @var boolean
	 */
	private $_auditif_obtenu = null;
	
	/**
	 * Whether the picto mental is ok.
	 * 
	 * @var boolean
	 */
	private $_mental_obtenu = null;
	
	/**
	 * Whether the picto moteur is ok.
	 * 
	 * @var boolean
	 */
	private $_moteur_obtenu = null;
	
	/**
	 * Whether the picto visuel is ok.
	 * 
	 * @var boolean
	 */
	private $_visuel_obtenu = null;
	
	/**
	 * The type of decision.
	 * 
	 * @var GmthApiTypeDecision
	 */
	private $_type_decision = null;
	
	/**
	 * Builds a new GmthApiAvis with the given decoded json data.
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
				case 'avis_commission':
					$this->_avis_commission = $this->asBoolean($value, $silent);
					break;
				case 'auditif_obtenu':
					$this->_auditif_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'mental_obtenu':
					$this->_mental_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'moteur_obtenu':
					$this->_moteur_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'visuel_obtenu':
					$this->_visuel_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'type_decision':
					$this->_type_decision = new GmthApiTypeDecision($this->asArray($value, $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the avis.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets whether the avis of the commission is favorable.
	 * 
	 * @return boolean
	 */
	public function getAvisCommission()
	{
		return $this->_avis_commission;
	}
	
	/**
	 * Gets whether the picto auditif is ok.
	 * 
	 * @return boolean
	 */
	public function getAuditifObtenu()
	{
		return $this->_auditif_obtenu;
	}
	
	/**
	 * Gets whether the picto mental is ok.
	 * 
	 * @return boolean
	 */
	public function getMentalObtenu()
	{
		return $this->_mental_obtenu;
	}
	
	/**
	 * Gets whether the picto moteur is ok.
	 * 
	 * @return boolean
	 */
	public function getMoteurObtenu()
	{
		return $this->_moteur_obtenu;
	}
	
	/**
	 * Gets whether the picto visuel is ok.
	 * 
	 * @return boolean
	 */
	public function getVisuelObtenu()
	{
		return $this->_visuel_obtenu;
	}
	
	/**
	 * Gets the type of decision.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiTypeDecision
	 */
	public function getTypeDecision()
	{
		return $this->_type_decision;
	}
	
}
