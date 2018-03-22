<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDemande extends JsonObject
{
	
	/**
	 * The id of the demande.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The numero demande.
	 * 
	 * @var string
	 */
	private $_numero_demande = null;
	
	/**
	 * Whether this demande is from the reprise.
	 * 
	 * @var boolean
	 */
	private $_reprise = null;
	
	/**
	 * Whether the picto auditif is currently awarded.
	 * 
	 * @var boolean
	 */
	private $_auditif_actuel = null;
	
	/**
	 * Whether the picto mental is currently awarded.
	 * 
	 * @var boolean
	 */
	private $_mental_actuel = null;
	
	/**
	 * Whether the picto moteur is currently awarded.
	 * 
	 * @var boolean
	 */
	private $_moteur_actuel = null;
	
	/**
	 * Whether the picto visuel is currently awarded.
	 * 
	 * @var boolean
	 */
	private $_visuel_actuel = null;
	
	/**
	 * Whether the candidate wants the picto auditif. 
	 * 
	 * @var boolean
	 */
	private $_auditif_demande = null;
	
	/**
	 * Whether the candidate wants the picto mental.
	 * 
	 * @var boolean
	 */
	private $_mental_demande = null;
	
	/**
	 * Whether the candidate wants the picto moteur.
	 * 
	 * @var boolean
	 */
	private $_moteur_demande = null;
	
	/**
	 * Whether the candidate wants the picto visuel.
	 * 
	 * @var boolean
	 */
	private $_visuel_demande = null;
	
	/**
	 * The date when the visite is done.
	 * 
	 * @var \DateTime
	 */
	private $_date_visite = null;
	
	/**
	 * The date when the next mail should be sent.
	 * 
	 * @var \DateTime
	 */
	private $_date_prochaine_relance = null;
	
	/**
	 * The date when the candidate contested the decision.
	 * 
	 * @var \DateTime
	 */
	private $_date_contestation = null;
	
	/**
	 * The arguments to help the commission decide.
	 * 
	 * @var string
	 */
	private $_aide_decision_commission = null;
	
	/**
	 * Additional text to help the commission decide.
	 * 
	 * @var string
	 */
	private $_amendement = null;
	
	/**
	 * Whether this demande has been removed.
	 * 
	 * @var boolean
	 */
	private $_retrait = null;
	
	/**
	 * The date of creation of this demande.
	 * 
	 * @var \DateTime
	 */
	private $_created = null;
	
	/**
	 * The date of last modification of this demande.
	 * 
	 * @var \DateTime
	 */
	private $_updated = null;
	
	/**
	 * The date of last modification of the state of this demande.
	 * 
	 * @var \DateTime
	 */
	private $_updated_etat = null;
	
	/**
	 * If the candidate withdraws, its motivation.
	 * 
	 * @var string
	 */
	private $_motif_abandon = null;
	
	/**
	 * Whether this demande is locked.
	 * 
	 * @var boolean
	 */
	private $_locked = null;
	
	/**
	 * The id of the locker.
	 * 
	 * @var string
	 */
	private $_locker_id = null;
	
	/**
	 * The full name of the locker.
	 * 
	 * @var string
	 */
	private $_locker_fullname = null;
	
	/**
	 * The candidate for this demande.
	 * 
	 * @var GmthApiCandidat
	 */
	private $_candidat = null;
	
	/**
	 * The type of demande.
	 * 
	 * @var GmthApiTypeDemande
	 */
	private $_type_demande = null;
	
	/**
	 * The etablissement of this demande.
	 * 
	 * @var GmthApiEtablissement
	 */
	private $_etablissement = null;
	
	/**
	 * The candidature of this demande.
	 * 
	 * @var GmthApiGrille
	 */
	private $_candidature = null;
	
	/**
	 * The activites of the demande.
	 * 
	 * @var JsonCollection[GmthApiActivite]
	 */
	private $_activites = null;
	
	/**
	 * The state of the demande.
	 * 
	 * @var GmthApiEtat
	 */
	private $_etat = null;
	
	/**
	 * The pieces jointes of the demande.
	 * 
	 * @var JsonCollection[GmthApiPieceJointe]
	 */
	private $_piece_jointes = null;
	
	/**
	 * The types of pieces jointes of the demande.
	 * 
	 * @var JsonCollection[GmthApiTypePieceJointe]
	 */
	private $_types_piece_jointe = null;
	
	/**
	 * The etag of the demande.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * The observations of the demande.
	 * 
	 * @var JsonCollection[GmthApiObservation]
	 */
	private $_observations = null;
	
	/**
	 * The evaluations of the demande.
	 * 
	 * @var JsonCollection[GmthApiEvaluation]
	 */
	private $_evaluations = null;
	
	/**
	 * The decisions of the demande.
	 * 
	 * @var JsonCollection[GmthApiDecision]
	 */
	private $_decisions = null;
	
	/**
	 * Builds a new GmthApiDemande with the given decoded json data.
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
				case 'numero_demande':
					$this->_numero_demande = $this->asString($value, $silent);
					break;
				case 'reprise':
					$this->_reprise = $this->asBoolean($value, $silent);
					break;
				case 'auditif_actuel':
					$this->_auditif_actuel = $this->asBoolean($value, $silent);
					break;
				case 'mental_actuel':
					$this->_mental_actuel = $this->asBoolean($value, $silent);
					break;
				case 'moteur_actuel':
					$this->_moteur_actuel = $this->asBoolean($value, $silent);
					break;
				case 'visuel_actuel':
					$this->_visuel_actuel = $this->asBoolean($value, $silent);
					break;
				case 'auditif_demande':
					$this->_auditif_demande = $this->asBoolean($value, $silent);
					break;
				case 'mental_demande':
					$this->_mental_demande = $this->asBoolean($value, $silent);
					break;
				case 'moteur_demande':
					$this->_moteur_demande = $this->asBoolean($value, $silent);
					break;
				case 'visuel_demande':
					$this->_visuel_demande = $this->asBoolean($value, $silent);
					break;
				case 'date_visite':
					$this->_date_visite = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'date_contestation':
					$this->_date_contestation = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'date_prochaine_relance':
					$this->_date_prochaine_relance = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'aide_decision_commission':
					$this->_aide_decision_commission = $this->asString($value, $silent);
					break;
				case 'amendement':
					$this->_amendement = $this->asString($value, $silent);
					break;
				case 'retrait':
					$this->_retrait = $this->asBoolean($value, $silent);
					break;
				case 'created':
					$this->_created = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'updated':
					$this->_updated = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'updated_etat':
					$this->_updated_etat = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'motif_abandon':
					$this->_motif_abandon = $this->asString($value, $silent);
					break;
				case 'locked':
					$this->_locked = $this->asBoolean($value, $silent);
					break;
				case 'locker_id':
					$this->_locker_id = $this->asString($value, $silent);
					break;
				case 'locker_fullname':
					$this->_locker_fullname = $this->asString($value, $silent);
					break;
				case 'candidat':
					$this->_candidat = new GmthApiCandidat($this->asArray($value, $silent), $silent);
					break;
				case 'type_demande':
					$this->_type_demande = new GmthApiTypeDemande($this->asArray($value, $silent), $silent);
					break;
				case 'etablissement':
					$this->_etablissement = new GmthApiEtablissement($this->asArray($value, $silent), $silent);
					break;
				case 'candidature':
					$this->_candidature = new GmthApiGrille($this->asArray($value, $silent), $silent);
					break;
				case 'activites':
					$this->_activites = new JsonCollection('\PhpExtended\Gmth\GmthApiActivite', $this->asArray($value, $silent), $silent);
					break;
				case 'etat':
					$this->_etat = new GmthApiEtat($this->asArray($value, $silent), $silent);
					break;
				case 'piece_jointes':
					$this->_piece_jointes = new JsonCollection('\PhpExtended\Gmth\GmthApiPieceJointe', $this->asArray($value, $silent), $silent);
					break;
				case 'type_piece_jointe':
					$this->_types_piece_jointe = new JsonCollection('\PhpExtended\Gmth\GmthApiTypePieceJointe', $this->asArray($value, $silent), $silent);
					break;
				case 'etag':
					$this->_etag = $this->asInteger($value, $silent);
					break;
				case 'observations':
					$this->_observations = new JsonCollection('\PhpExtended\Gmth\GmthApiObservation', $this->asArray($value, $silent), $silent);
					break;
				case 'evaluations':
					$this->_evaluations = new JsonCollection('\PhpExtended\Gmth\GmthApiEvaluation', $this->asArray($value, $silent), $silent);
					break;
				case 'decisions':
					$this->_decisions = new JsonCollection('\PhpExtended\Gmth\GmthApiDecision', $this->asArray($value, $silent), $silent);
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
		
		if($this->_activites === null)
			$this->_activites = new JsonCollection('\PhpExtended\Gmth\GmthApiActivite', array());
		if($this->_piece_jointes === null)
			$this->_piece_jointes = new JsonCollection('\PhpExtended\Gmth\GmthApiPieceJointe', array());
		if($this->_observations === null)
			$this->_observations = new JsonCollection('\PhpExtended\Gmth\GmthApiObservation', array());
		if($this->_evaluations === null)
			$this->_evaluations = new JsonCollection('\PhpExtended\Gmth\GmthApiEvaluation', array());
		if($this->_decisions === null)
			$this->_decisions = new JsonCollection('\PhpExtended\Gmth\GmthApiDecision', array());
	}
	
	/**
	 * Gets the id of the demande.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the numero demande.
	 * 
	 * @return string
	 */
	public function getNumeroDemande()
	{
		return $this->_numero_demande;
	}
	
	/**
	 * Gets whether this demande is from the reprise.
	 * 
	 * @return boolean
	 */
	public function getReprise()
	{
		return $this->_reprise;
	}
	
	/**
	 * Gets whether the etablissement already has the picto auditif.
	 * 
	 * @return boolean
	 */
	public function getAuditifActuel()
	{
		return $this->_auditif_actuel;
	}
	
	/**
	 * Gets whether the etablissement already has the picto mental.
	 * 
	 * @return boolean
	 */
	public function getMentalActuel()
	{
		return $this->_mental_actuel;
	}
	
	/**
	 * Gets whether the etablissement already has the picto moteur.
	 * 
	 * @return boolean
	 */
	public function getMoteurActuel()
	{
		return $this->_moteur_actuel;
	}
	
	/**
	 * Gets whether the etablissement already has the picto visuel.
	 * 
	 * @return boolean
	 */
	public function getVisuelActuel()
	{
		return $this->_visuel_actuel;
	}
	
	/**
	 * Gets whether the candidate wants the picto auditif.
	 * 
	 * @return boolean
	 */
	public function getAuditifDemande()
	{
		return $this->_auditif_demande;
	}
	
	/**
	 * Gets whether the candidate wants the picto mental.
	 * 
	 * @return boolean
	 */
	public function getMentalDemande()
	{
		return $this->_mental_demande;
	}
	
	/**
	 * Gets whether the candidate wants the picto moteur.
	 * 
	 * @return boolean
	 */
	public function getMoteurDemande()
	{
		return $this->_moteur_demande;
	}
	
	/**
	 * Gets whether the candidate wants the picto visuel.
	 * 
	 * @return boolean
	 */
	public function getVisuelDemande()
	{
		return $this->_visuel_demande;
	}
	
	/**
	 * Gets the date when the visit took place.
	 * 
	 * @return DateTime
	 */
	public function getDateVisite()
	{
		return $this->_date_visite;
	}
	
	/**
	 * Gets the date when the next mail should be sent.
	 * 
	 * @return \DateTime
	 */
	public function getDateProchaineRelance()
	{
		return $this->_date_prochaine_relance;
	}
	
	/**
	 * Gets the date when the commission took place.
	 * 
	 * @return \DateTime
	 */
	public function getDateContestation()
	{
		return $this->_date_contestation;
	}
	
	/**
	 * Gets the help text for the commission to decide.
	 * 
	 * @return string
	 */
	public function getAideDecisionCommission()
	{
		return $this->_aide_decision_commission;
	}
	
	/**
	 * Gets the amendments to the commission decision.
	 * 
	 * @return string
	 */
	public function getAmendement()
	{
		return $this->_amendement;
	}
	
	/**
	 * Gets whether this demande has been removed.
	 * 
	 * @return boolean
	 */
	public function getRetrait()
	{
		return $this->_retrait;
	}
	
	/**
	 * Gets the date of creation of this demande.
	 * 
	 * @return \DateTime
	 */
	public function getCreated()
	{
		return $this->_created;
	}
	
	/**
	 * Gets the last updated date of this demande.
	 * 
	 * @return \DateTime
	 */
	public function getUpdated()
	{
		return $this->_updated;
	}
	
	/**
	 * Gets the last date the state was updated.
	 * 
	 * @return \DateTime
	 */
	public function getUpdatedEtat()
	{
		return $this->_updated_etat;
	}
	
	/**
	 * Gets the motivation of the candidate's withdrawal.
	 * 
	 * @return string
	 */
	public function getMotifAbandon()
	{
		return $this->_motif_abandon;
	}
	
	/**
	 * Gets whether this demande is locked.
	 * 
	 * @return boolean
	 */
	public function getLocked()
	{
		return $this->_locked;
	}
	
	/**
	 * Gets the id of the locker.
	 * 
	 * @return string
	 */
	public function getLockerId()
	{
		return $this->_locker_id;
	}
	
	/**
	 * Gets the full name of the locker.
	 * 
	 * @return string
	 */
	public function getLockerFullname()
	{
		return $this->_locker_fullname;
	}
	
	/**
	 * Gets the candidate.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiCandidat
	 */
	public function getCandidat()
	{
		return $this->_candidat;
	}
	
	/**
	 * Gets the type of demande.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiTypeDemande
	 */
	public function getTypeDemande()
	{
		return $this->_type_demande;
	}
	
	/**
	 * Gets the etablissement.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiEtablissement
	 */
	public function getEtablissement()
	{
		return $this->_etablissement;
	}
	
	/**
	 * Gets the grid of candidature.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrille
	 */
	public function getCandidature()
	{
		return $this->_candidature;
	}
	
	/**
	 * Gets the activities of the demande.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiActivite]
	 */
	public function getActivites()
	{
		return $this->_activites;
	}
	
	/**
	 * Gets the state of the demande.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiEtat
	 */
	public function getEtat()
	{
		return $this->_etat;
	}
	
	/**
	 * Gets the piece jointes.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiPieceJointe]
	 */
	public function getPieceJointes()
	{
		return $this->_piece_jointes;
	}
	
	/**
	 * Gets the types of expected piece jointes.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiTypePieceJointe]
	 */
	public function getTypesPieceJointe()
	{
		return $this->_types_piece_jointe;
	}
	
	/**
	 * Gets the etag for this demande.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
	/**
	 * Gets the observations for this demande.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiObservation]
	 */
	public function getObservations()
	{
		return $this->_observations;
	}
	
	/**
	 * Gets the evaluations for this demande.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiEvaluation]
	 */
	public function getEvaluations()
	{
		return $this->_evaluations;
	}
	
	/**
	 * Gets the decisions for this demande.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiDecision]
	 */
	public function getDecisions()
	{
		return $this->_decisions;
	}
	
}
