<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDecision extends JsonObject
{
	
	/**
	 * The id of the decision.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The avis decision associated to this decision.
	 * 
	 * @var GmthApiAvisDecision
	 */
	private $_avis_decision = null;
	
	/**
	 * The date when the commission passed.
	 * 
	 * @var \DateTime
	 */
	private $_date_commission = null;
	
	/**
	 * Whether this decision confirms the decision initiale.
	 * 
	 * @var boolean
	 */
	private $_confirmation_decision_initiale = null;
	
	/**
	 * The type of decision.
	 * 
	 * @var GmthApiTypeDecision
	 */
	private $_type_decision = null;
	
	/**
	 * The justification of the decision.
	 * 
	 * @var string
	 */
	private $_motivation_notification = null;
	
	/**
	 * The date the candidate was notified.
	 * 
	 * @var \DateTime
	 */
	private $_date_notification = null;
	
	/**
	 * Whether the picto auditif was obtained.
	 * 
	 * @var boolean
	 */
	private $_auditif_obtenu = null;
	
	/**
	 * Whether the picto mental was obtained.
	 * 
	 * @var boolean
	 */
	private $_mental_obtenu = null;
	
	/**
	 * Whether the picto moteur was obtained.
	 * 
	 * @var boolean
	 */
	private $_moteur_obtenu = null;
	
	/**
	 * Whether the picto visuel was obtained.
	 * 
	 * @var boolean
	 */
	private $_visuel_obtenu = null;
	
	/**
	 * The justification for the refusal.
	 * 
	 * @var string
	 */
	private $_motif_refus = null;
	
	/**
	 * The name of the file associated with this decision.
	 * 
	 * @var string
	 */
	private $_nom_technique = null;
	
	/**
	 * Whether this decision is from the reprise.
	 * 
	 * @var boolean
	 */
	private $_reprise = null;
	
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
				case 'avis_decision':
					$this->_avis_decision = new GmthApiAvisDecision($this->asArray($value, $silent), $silent);
					break;
				case 'date_commission':
					$this->_date_commission = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'confirmation_decision_initiale':
					$this->_confirmation_decision_initiale = $this->asBoolean($value, $silent);
					break;
				case 'type_decision':
					$this->_type_decision = new GmthApiTypeDecision($this->asArray($value, $silent), $silent);
					break;
				case 'motivation_notification':
					$this->_motivation_notification = $this->asString($value, $silent);
					break;
				case 'date_notification':
					$this->_date_notification = $this->asDatetime($value, \DateTime::ATOM, $silent);
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
				case 'motif_refus':
					$this->_motif_refus = $this->asString($value, $silent);
					break;
				case 'nom_technique':
					$this->_nom_technique = $this->asString($value, $silent);
					break;
				case 'reprise':
					$this->_reprise = $this->asBoolean($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the id of the decision.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the avis that was given.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiAvisDecision
	 */
	public function getAvisDecision()
	{
		return $this->_avis_decision;
	}
	
	/**
	 * Gets the date when this decision passed in commission.
	 * 
	 * @return DateTime
	 */
	public function getDateCommission()
	{
		return $this->_date_commission;
	}
	
	/**
	 * Gets whether this decision confirms the initial decision.
	 * 
	 * @return boolean
	 */
	public function getConfirmationDecisionInitiale()
	{
		return $this->_confirmation_decision_initiale;
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
	
	/**
	 * Gets the justification of the notification.
	 * 
	 * @return string
	 */
	public function getMotivationNotification()
	{
		return $this->_motivation_notification;
	}
	
	/**
	 * Gets the date when the candidate was notified.
	 * 
	 * @return \DateTime
	 */
	public function getDateNotification()
	{
		return $this->_date_notification;
	}
	
	/**
	 * Gets whether the picto auditif was obtained.
	 * 
	 * @return boolean
	 */
	public function getAuditifObtenu()
	{
		return $this->_auditif_obtenu;
	}
	
	/**
	 * Gets whether the picto mental was obtained.
	 * 
	 * @return boolean
	 */
	public function getMentalObtenu()
	{
		return $this->_mental_obtenu;
	}
	
	/**
	 * Gets whether the picto moteur was obtained.
	 * 
	 * @return boolean
	 */
	public function getMoteurObtenu()
	{
		return $this->_moteur_obtenu;
	}
	
	/**
	 * Gets whether the picto visuel was obtained.
	 * 
	 * @return boolean
	 */
	public function getVisuelObtenu()
	{
		return $this->_visuel_obtenu;
	}
	
	/**
	 * Gets the justification of the refusal.
	 * 
	 * @return string
	 */
	public function getMotifRefus()
	{
		return $this->_motif_refus;
	}
	
	/**
	 * Gets the name of the file associated with the decision.
	 * 
	 * @return string
	 */
	public function getNomTechnique()
	{
		return $this->_nom_technique;
	}
	
	/**
	 * Gets whether this decision is from the reprise.
	 * 
	 * @return boolean
	 */
	public function getReprise()
	{
		return $this->_reprise;
	}
	
}
