<?php

namespace PhpExtended\Gmth;

class GmthDataRepository extends GmthDataAbstractRepository
{
	
	/**
	 * The api to load the objects.
	 * 
	 * @var GmthApiPrivateEndpoint
	 */
	private $_api = null;
	
	/**
	 * Whether the activites are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_activites_loaded = false;
	
	/**
	 * Whether the avis decision are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_avis_decision_loaded = false;
	
	/**
	 * Whether the categories were loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_categories_loaded = false;
	
	/**
	 * Whether the civilites are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_civilites_loaded = false;
	
	/**
	 * Whether the communes are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_communes_loaded = false;
	
	/**
	 * Whether the departements are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_departements_loaded = false;
	
	/**
	 * Whether the etats are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_etats_loaded = false;
	
	/**
	 * Whether the grilles candidature are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_grilles_candidature_loaded = false;
	
	/**
	 * Whether the grilles evaluation are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_grilles_evaluation_loaded = false;
	
	/**
	 * Whether the regions are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_regions_loaded = false;
	
	/**
	 * Whether the types classement are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_types_classement_loaded = false;
	
	/**
	 * Whether the types demande are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_types_demande_loaded = false;
	
	/**
	 * Whether the types piece jointe are loaded from the api.
	 * 
	 * @var boolean
	 */
	private $_types_piece_jointe_loaded = false;
	
	/**
	 * Builds a new DataRepository with the given private endpoint.
	 * 
	 * @param GmthApiPrivateEndpoint $endpoint
	 */
	public function __construct(GmthApiPrivateEndpoint $endpoint)
	{
		$this->_api = $endpoint;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureActivitesLoaded()
	 */
	protected function ensureActivitesLoaded(array $ids = array())
	{
		if($this->_activites_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_activites[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$activiteList = $this->_api->getActivites();
		foreach($activiteList as $apiActivite)
			$this->handleActivite($apiActivite);
		$this->_activites_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureAvisLoaded()
	 */
	protected function ensureAvisLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureAvisDecisionLoaded()
	 */
	protected function ensureAvisDecisionLoaded(array $ids = array())
	{
		if($this->_avis_decision_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_avis_decision[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$avisDecisionList = $this->_api->getAvisDecisions();
		foreach($avisDecisionList as $apiAvisDecision)
			$this->handleAvisDecision($apiAvisDecision);
		$this->_avis_decision_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureCandidatLoaded()
	 */
	protected function ensureCandidatLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureCandidatureLoaded()
	 */
	protected function ensureCandidatureLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureCategoriesLoaded()
	 */
	protected function ensureCategoriesLoaded(array $ids = array())
	{
		if($this->_categories_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_categories[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$categoriesList = $this->_api->getCategories();
		foreach($categoriesList as $apiCategorie)
			$this->handleCategorie($apiCategorie);
		$this->_categories_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureCivilitesLoaded()
	 */
	protected function ensureCivilitesLoaded(array $ids = array())
	{
		if($this->_civilites_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_civilites[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$civilitesList = $this->_api->getCivilites();
		foreach($civilitesList as $apiCivilite)
			$this->handleCivilite($apiCivilite);
		$this->_civilites_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureCommunesLoaded()
	 */
	protected function ensureCommunesLoaded(array $ids = array())
	{
		if($this->_communes_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_communes[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$communesList = $this->_api->getCommunes();
		foreach($communesList as $apiCommune)
			$this->handleCommune($apiCommune);
		$this->_communes_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureDecisionsLoaded()
	 */
	protected function ensureDecisionsLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureDemandesLoaded()
	 */
	protected function ensureDemandesLoaded(array $ids = array())
	{
		foreach($ids as $id)
		{
			if(!isset($this->_demandes[$id]))
			{
				$apiDemande= $this->_api->getDemande($id);
				if($apiDemande!== null)
					$this->handleDemande($apiDemande);
			}
			else
			{
				// if the etablissement id is not set, this demande has been
				// partially loaded when loading the its etablissement
				// we need to properly reload it to have full data
				$demande = $this->_demandes[$id];
				if(!isset($demande->etablissement_id))
				{
					$apiDemande= $this->_api->getDemande($id);
					if($apiDemande!== null)
						$this->handleDemande($apiDemande);
				}
			}
		}
	}
	
	/**
	 * Gets the list of demandes that fullfill the query.
	 * 
	 * @param GmthBridgeQuery $query
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function queryDemandes(GmthBridgeQuery $query)
	{
		$iterator = new GmthQueryDemandeIterator($this, $this->_api, $query);
		return new GmthFilterUniqueDemandeIterator($iterator);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureDepartementsLoaded()
	 */
	protected function ensureDepartementsLoaded(array $ids = array())
	{
		if($this->_departements_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_departements[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$departementList = $this->_api->getDepartements();
		foreach($departementList as $apiDepartement)
			$this->handleDepartement($apiDepartement);
		$this->_departements_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureEtablissementsLoaded()
	 */
	protected function ensureEtablissementsLoaded(array $ids = array())
	{
		foreach($ids as $id)
		{
			if(!isset($this->_etablissements[$id]))
			{
				$apiEtablissement= $this->_api->getEtablissement($id);
				if($apiEtablissement!== null)
					$this->handleEtablissement($apiEtablissement);
			}
		}
	}
	
	/**
	 * Gets the list of demandes that fullfill the query.
	 *
	 * @param GmthBridgeQuery $query
	 * @return \Iterator[GmthEtablissementInterface]
	 */
	public function queryEtablissements(GmthBridgeQuery $query)
	{
		$iterator = new GmthQueryEtablissementIterator($this, $this->_api, $query);
		return new GmthFilterUniqueEtablissementIterator($iterator);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureEtatsLoaded()
	 */
	protected function ensureEtatsLoaded(array $ids = array())
	{
		if($this->_etats_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_etats[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$etatsList = $this->_api->getEtats();
		foreach($etatsList as $apiEtat)
			$this->handleEtat($apiEtat);
		$this->_etats_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureEvaluationsLoaded()
	 */
	protected function ensureEvaluationsLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureGrillesCandidatureLoaded()
	 */
	protected function ensureGrillesCandidatureLoaded(array $ids = array())
	{
		if($this->_grilles_candidature_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_grilles_candidature[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$grilleCandidatureList = $this->_api->getModelesGrilleCandidature();
		foreach($grilleCandidatureList as $apiGrilleCandidature)
			$this->handleGrilleCandidature($apiGrilleCandidature);
		$this->_grilles_candidature_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureGrillesEvaluationLoaded()
	 */
	protected function ensureGrillesEvaluationLoaded(array $ids = array())
	{
		if($this->_grilles_evaluation_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_grilles_evaluation[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$grilleEvaluationList = $this->_api->getModelesGrilleEvaluation();
		foreach($grilleEvaluationList as $apiGrilleEvaluation)
			$this->handleGrilleEvaluation($apiGrilleEvaluation);
		$this->_grilles_evaluation_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureObservationsLoaded()
	 */
	protected function ensureObservationsLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensurePieceJointeLoaded()
	 */
	protected function ensurePieceJointeLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * 
	 * @param GmthDataPieceJointe $pieceJointe
	 * @return string
	 * @throws GmthApiException
	 */
	public function getPieceJointeRawData(GmthDataPieceJointe $pieceJointe)
	{
		$data = new GmthApiPieceJointe(array('nom_technique' => $pieceJointe->techid));
		return $this->_api->getFichier($data);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureRegionsLoaded()
	 */
	protected function ensureRegionsLoaded(array $ids = array())
	{
		if($this->_regions_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_regions[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$regionList = $this->_api->getRegions();
		foreach($regionList as $apiRegion)
			$this->handleRegion($apiRegion);
		$this->_regions_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureTypesClassementLoaded()
	 */
	protected function ensureTypesClassementLoaded(array $ids = array())
	{
		if($this->_types_classement_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_types_classement[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$typeClassementList = $this->_api->getTypeClassements();
		foreach($typeClassementList as $apiTypeClassement)
			$this->handleTypeClassement($apiTypeClassement);
		$this->_types_classement_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureTypeDecisionLoaded()
	 */
	protected function ensureTypeDecisionLoaded(array $ids = array())
	{
		// nothing to do
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureTypesDemandeLoaded()
	 */
	protected function ensureTypesDemandeLoaded(array $ids = array())
	{
		if($this->_types_demande_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_types_demande[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$typeDemandeList = $this->_api->getTypeDemandes();
		foreach($typeDemandeList as $apiTypeDemande)
			$this->handleTypeDemande($apiTypeDemande);
		$this->_types_demande_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureTypesPieceJointeLoaded()
	 */
	protected function ensureTypesPieceJointeLoaded(array $ids = array())
	{
		if($this->_types_piece_jointe_loaded)
			return;
		$allLoaded = true;
		foreach($ids as $id)
		{
			if(!isset($this->_types_piece_jointe[$id]))
			{
				$allLoaded = false;
				break;
			}
		}
		if($ids !== array() && $allLoaded)
			return;
		$typePieceJointeList = $this->_api->getTypePieceJointes();
		foreach($typePieceJointeList as $apiTypePieceJointe)
			$this->handleTypePieceJointe($apiTypePieceJointe);
		$this->_types_piece_jointe_loaded = true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDataAbstractRepository::ensureUtilisateursLoaded()
	 */
	protected function ensureUtilisateursLoaded(array $ids = array())
	{
		// nothing to do
	}
	
}
