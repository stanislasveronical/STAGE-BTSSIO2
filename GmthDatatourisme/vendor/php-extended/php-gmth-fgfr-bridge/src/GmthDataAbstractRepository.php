<?php

namespace PhpExtended\Gmth;

abstract class GmthDataAbstractRepository
{
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataActivite[]
	 */
	protected $_activites = array();
	
	/**
	 *
	 * @var GmthDataAvis[]
	 */
	protected $_avis = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataAvisDecision[]
	 */
	protected $_avis_decision = array();
	
	/**
	 *
	 * @var GmthDataCandidat[]
	 */
	protected $_candidats = array();
	
	/**
	 *
	 * @var GmthDataCandidature[]
	 */
	protected $_candidatures = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataCategorie[]
	 */
	protected $_categories = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataCivilite[]
	 */
	protected $_civilites = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataCommune[]
	 */
	protected $_communes = array();
	
	/**
	 *
	 * @var GmthDataDecision[]
	 */
	protected $_decisions = array();
	
	/**
	 *
	 * @var GmthDataDemande[]
	 */
	protected $_demandes = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataDepartement[]
	 */
	protected $_departements = array();
	
	/**
	 *
	 * @var GmthDataEtablissement[]
	 */
	protected $_etablissements = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataEtat[]
	 */
	protected $_etats = array();
	
	/**
	 *
	 * @var GmthDataEvaluation[]
	 */
	protected $_evaluations = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataGrille[]
	 */
	protected $_grilles_candidature = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataGrille[]
	 */
	protected $_grilles_evaluation = array();
	
	/**
	 *
	 * @var GmthDataObservation[]
	 */
	protected $_observations = array();
	
	/**
	 *
	 * @var GmthDataPieceJointe[]
	 */
	protected $_piece_jointes = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataRegion[]
	 */
	protected $_regions = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataTypeClassement[]
	 */
	protected $_types_classement = array();
	
	/**
	 *
	 * @var GmthDataTypeDecision[]
	 */
	protected $_types_decision = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataTypeDemande[]
	 */
	protected $_types_demande = array();
	
	/**
	 * Referentiel. Loaded once and for all. Indexed by id.
	 *
	 * @var GmthDataTypePieceJointe[]
	 */
	protected $_types_piece_jointe = array();
	
	/**
	 *
	 * @var GmthDataUtilisateur[]
	 */
	protected $_utilisateurs = array();
	
	/**
	 * Ensures the activites are well loaded.
	 * 
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureActivitesLoaded(array $ids = array());
	
	/**
	 * Handle the api activite object and updates the data activite list.
	 *
	 * @param GmthApiActivite $apiActivite
	 * @return boolean success
	 */
	protected function handleActivite(GmthApiActivite $apiActivite)
	{
		if(empty($apiActivite->getId()))
			return false;
// 			throw new GmthApiException('Empty id for given api activite.');
		if(isset($this->_activites[$apiActivite->getId()]))
			$activite = $this->_activites[$apiActivite->getId()];
		else
		{
			$activite = new GmthDataActivite();
			$this->_activites[$apiActivite->getId()] = $activite;
		}
		$activite->id = $apiActivite->getId();
		if(!$apiActivite->getCategorie() !== null)
		{
			$this->handleCategorie($apiActivite->getCategorie());
			if(!empty($apiActivite->getCategorie()->getId()))
				$activite->categorie_id = $apiActivite->getCategorie()->getId();
		}
		if(!empty($apiActivite->getNom()))
			$activite->nom = $apiActivite->getNom();
		
		return true;
	}
	
	/**
	 * Gets the activite by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthActiviteInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getActiviteById($id)
	{
		if($id === null)
			return null;
		$this->ensureActivitesLoaded(array($id));
		if(!isset($this->_activites[$id]))
			return null;
		return new GmthBridgeActivite($this, $this->_activites[$id]);
	}
	
	/**
	 * Gets all the activites.
	 *
	 * @return \Iterator[GmthActiviteInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getActivites()
	{
		$this->ensureActivitesLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_activites),
			$this, '\PhpExtended\Gmth\GmthBridgeActivite');
	}
	
	/**
	 * Gets all the activites filtered by categorie id.
	 * 
	 * @param string $categorieId
	 * @param \Iterator[GmthActiviteInterface] $activiteIterator
	 * @return \Iterator[GmthActiviteInterface]
	 */
	public function getActiviteByCategorieId($categorieId, \Iterator $activiteIterator = null)
	{
		if($activiteIterator === null)
			$activiteIterator = $this->getActivites();
		return new GmthFilterActiviteByCategorieIterator($activiteIterator, $categorieId);
	}
	
	/**
	 * Ensures the avis are well loaded.
	 * 
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureAvisLoaded(array $ids = array());
	
	/**
	 * Handle the api avis object and updates the data avis list.
	 *
	 * @param GmthApiAvis $apiAvis
	 * @return boolean success
	 */
	protected function handleAvis(GmthApiAvis $apiAvis, GmthApiEvaluation $apiEvaluation)
	{
		if(empty($apiAvis->getId()))
			return false;
// 			throw new GmthApiException('Empty id for given api avis.');
		if(isset($this->_avis[$apiAvis->getId()]))
			$avis = $this->_avis[$apiAvis->getId()];
		else
		{
			$avis = new GmthDataAvis();
			$this->_avis[$apiAvis->getId()] = $avis;
		}
		$avis->id = $apiAvis->getId();
		$avis->evaluation_id = $apiEvaluation->getId();
		if($apiAvis->getTypeDecision() !== null)
		{
			$this->handleTypeDecision($apiAvis->getTypeDecision());
			if(!empty($apiAvis->getTypeDecision()->getId()))
				$avis->type_decision_id = $apiAvis->getTypeDecision()->getId();
		}
		
		// those are booleans
		$avis->avis_commission = $apiAvis->getAvisCommission();
		$avis->auditif_obtenu = $apiAvis->getAuditifObtenu();
		$avis->mental_obtenu = $apiAvis->getMentalObtenu();
		$avis->moteur_obtenu = $apiAvis->getMoteurObtenu();
		$avis->visuel_obtenu = $apiAvis->getVisuelObtenu();
		
		return true;
	}
	
	/**
	 * Gets the avis by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthAvisInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getAvisById($id)
	{
		if($id === null)
			return null;
		$this->ensureAvisLoaded(array($id));
		if(!isset($this->_avis[$id]))
			return null;
		return new GmthBridgeAvis($this, $this->_avis[$id]);
	}
	
	/**
	 * Gets all the avis.
	 *
	 * @return \Iterator[GmthAvisInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getAviss()
	{
		$this->ensureAvisLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_avis),
			$this, '\PhpExtended\Gmth\GmthBridgeAvis');
	}
	
	/**
	 * Gets all the avis filtered by the evaluation.
	 * 
	 * @param string $evaluationId
	 * @param \Iterator[GmthAvisInterface] $avisIterator
	 * @return \Iterator[GmthAvisInterface]
	 */
	public function getAvissByEvaluationId($evaluationId, \Iterator $avisIterator = null)
	{
		if($avisIterator === null)
			$avisIterator = $this->getAviss();
		return new GmthFilterAvisByEvaluationIterator($avisIterator, $evaluationId);
	}
	
	/**
	 * Gets all the avis filtered by the type decision.
	 * 
	 * @param string $typeDecisionId
	 * @param \Iterator[GmthAvisInterface]
	 * @return \Iterator[GmthAvisInterface]
	 */
	public function getAvissByTypeDecisionId($typeDecisionId, \Iterator $avisIterator = null)
	{
		if($avisIterator === null)
			$avisIterator = $this->getAviss();
		return new GmthFilterAvisByTypeDecisionIterator($avisIterator, $typeDecisionId);
	}
	
	/**
	 * Ensures the avis decision are well loaded.
	 * 
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureAvisDecisionLoaded(array $ids = array());
	
	/**
	 * Handle the api avis decision object and updates the data avis decision list.
	 *
	 * @param GmthApiAvisDecision $apiAvisDecision
	 * @return boolean success
	 */
	protected function handleAvisDecision(GmthApiAvisDecision $apiAvisDecision)
	{
		if(empty($apiAvisDecision->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api avis decision.');
		if(isset($this->_avis_decision[$apiAvisDecision->getId()]))
			$avisDecision = $this->_avis_decision[$apiAvisDecision->getId()];
		else
		{
			$avisDecision = new GmthDataAvisDecision();
			$this->_avis_decision[$apiAvisDecision->getId()] = $avisDecision;
		}
		$avisDecision->id = $apiAvisDecision->getId();
		if(!empty($apiAvisDecision->getNom()))
			$avisDecision->libelle = $apiAvisDecision->getNom();
		
		return true;
	}
	
	/**
	 * Gets the avis decision by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthDataAvisDecision
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getAvisDecisionById($id)
	{
		if($id === null)
			return null;
		$this->ensureAvisDecisionLoaded(array($id));
		if(!isset($this->_avis_decision[$id]))
			return null;
		return new GmthBridgeAvisDecision($this, $this->_avis_decision[$id]);
	}
	
	/**
	 * Gets all the avis decision.
	 *
	 * @return \Iterator[GmthAvisDecisionInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getAvissDecision()
	{
		$this->ensureAvisDecisionLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_avis_decision),
			$this, '\PhpExtended\Gmth\GmthBridgeAvisDecision');
	}
	
	/**
	 * Ensures the candidats are well loaded.
	 * 
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureCandidatLoaded(array $ids = array());
	
	/**
	 * Handle the api candidat object and updates the data candidat list.
	 *
	 * @param GmthApiCandidat $apiCandidat
	 * @return boolean success
	 */
	protected function handleCandidat(GmthApiCandidat $apiCandidat)
	{
		if(empty($apiCandidat->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api candidat.');
		if(isset($this->_candidats[$apiCandidat->getId()]))
			$candidat = $this->_candidats[$apiCandidat->getId()];
		else
		{
			$candidat = new GmthDataCandidat();
			$this->_candidats[$apiCandidat->getId()] = $candidat;
		}
		$candidat->id = $apiCandidat->getId();
		$candidat->civilite_id = $apiCandidat->getCivilite();
		if(!empty($apiCandidat->getEmail()))
			$candidat->email = $apiCandidat->getEmail();
		if(!empty($apiCandidat->getNom()))
			$candidat->nom = $apiCandidat->getNom();
		if(!empty($apiCandidat->getPrenom()))
			$candidat->prenom = $apiCandidat->getPrenom();
		if(!empty($apiCandidat->getTelephone()))
			$candidat->telephone = $apiCandidat->getTelephone();
		
		return true;
	}
	
	/**
	 * Gets the candidat by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthCandidatInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCandidatById($id)
	{
		if($id === null)
			return null;
		$this->ensureCandidatLoaded(array($id));
		if(!isset($this->_candidats[$id]))
			return null;
		return new GmthBridgeCandidat($this, $this->_candidats[$id]);
	}
	
	/**
	 * Gets all the candidats.
	 *
	 * @return \Iterator[GmthCandidatInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCandidats()
	{
		$this->ensureCandidatLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_candidats),
			$this, '\PhpExtended\Gmth\GmthBridgeCandidat');
	}
	
	/**
	 * Gets all the candidats filtered by civilite.
	 * 
	 * @param string $civiliteId
	 * @param \Iterator[GmthCandidatInterface] $candidatIterator
	 * @return \Iterator[GmthCandidatInterface]
	 */
	public function getCandidatByCiviliteId($civiliteId, \Iterator $candidatIterator = null)
	{
		if($candidatIterator === null)
			$candidatIterator = $this->getCandidats();
		return new GmthFilterCandidatByCiviliteIterator($candidatIterator, $civiliteId);
	}
	
	/**
	 * Ensures the candidatures are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureCandidatureLoaded(array $ids = array());
	
	/**
	 * Handle the api candidature object and updates the data candidature list.
	 *
	 * @param GmthApiGrille $apiCandidature
	 * @return boolean success
	 */
	protected function handleCandidature(GmthApiGrille $apiCandidature, GmthApiDemande $apiDemande)
	{
		if(empty($apiCandidature->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api candidature.');
		if(isset($this->_candidatures[$apiCandidature->getId()]))
			$candidature = $this->_candidatures[$apiCandidature->getId()];
		else
		{
			$candidature = new GmthDataCandidature();
			$this->_candidatures[$apiCandidature->getId()] = $candidature;
		}
		$candidature->id = $apiCandidature->getId();
		$candidature->demande_id = $apiDemande->getId();
		$candidature->grille_candidature_id = $apiCandidature->getId();
		if(!empty($apiCandidature->getData()))
			$candidature->data = $apiCandidature->getData();
		$this->handleGrilleCandidature($apiCandidature);
		
		return true;
	}
	
	/**
	 * Gets the candidature by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthCandidatureInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCandidatureById($id)
	{
		if($id === null)
			return null;
		$this->ensureCandidatureLoaded(array($id));
		if(!isset($this->_candidatures[$id]))
			return null;
		return new GmthBridgeCandidature($this, $this->_candidatures[$id]);
	}
	
	/**
	 * Gets all the candidatures.
	 *
	 * @return \Iterator[GmthCandidatureInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCandidatures()
	{
		$this->ensureCandidatureLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_candidatures),
			$this, '\PhpExtended\Gmth\GmthBridgeCandidature');
	}
	
	/**
	 * Gets all the candidatures filtered by grille candidature.
	 * 
	 * @param string $grilleCandidatureId
	 * @param \Iterator[GmthCandidatureInterface] $candidatureIterator
	 * @return \Iterator[GmthCandidatureInterface]
	 */
	public function getCandidaturesByGrilleCandidatureId($grilleCandidatureId, \Iterator $candidatureIterator = null)
	{
		if($candidatureIterator === null)
			$candidatureIterator = $this->getCandidatures();
		return new GmthFilterCandidatureByGrilleCandidatureIterator($candidatureIterator, $grilleCandidatureId);
	}
	
	/**
	 * Ensures the categories are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureCategoriesLoaded(array $ids = array());
	
	/**
	 * Handle the api categorie object and updates the data categorie list.
	 *
	 * @param GmthApiCategorie $apiCategorie
	 * @return boolean success
	 */
	protected function handleCategorie(GmthApiCategorie $apiCategorie)
	{
		if(empty($apiCategorie->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api categorie.');
		if(isset($this->_categories[$apiCategorie->getId()]))
			$categorie = $this->_categories[$apiCategorie->getId()];
		else
		{
			$categorie = new GmthDataCategorie();
			$this->_categories[$apiCategorie->getId()] = $categorie;
		}
		$categorie->id = $apiCategorie->getId();
		if(!empty($apiCategorie->getNom()))
			$categorie->libelle = $apiCategorie->getNom();
		foreach($apiCategorie->getActivites() as $apiActivite)
			$this->handleActivite($apiActivite);
		
		return true;
	}
	
	/**
	 * Gets the categorie by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthCandidatureInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCategorieById($id)
	{
		if($id === null)
			return null;
		$this->ensureCategoriesLoaded(array($id));
		if(!isset($this->_categories[$id]))
			return null;
		return new GmthBridgeCategorie($this, $this->_categories[$id]);
	}
	
	/**
	 * Gets all the categories.
	 *
	 * @return \Iterator[GmthCategorieInterface]
	 */
	public function getCategories()
	{
		$this->ensureCategoriesLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_categories),
			$this, '\PhpExtended\Gmth\GmthBridgeCategorie');
	}
	
	/**
	 * Ensures the civilites are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureCivilitesLoaded(array $ids = array());
	
	/**
	 * Handle the api civilite object and updates the data civilite list.
	 *
	 * @param GmthApiCivilite $apiCivilite
	 * @return boolean success
	 */
	protected function handleCivilite(GmthApiCivilite $apiCivilite)
	{
		if(empty($apiCivilite->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api civilite.');
		if(isset($this->_civilites[$apiCivilite->getId()]))
			$civilite = $this->_civilites[$apiCivilite->getId()];
		else
		{
			$civilite = new GmthDataCivilite();
			$this->_civilites[$apiCivilite->getId()] = $civilite;
		}
		$civilite->id = $apiCivilite->getId();
		if(!empty($apiCivilite->getId()))
			$civilite->libelle = $apiCivilite->getNom();
		
		return true;
	}
	
	/**
	 * Gets the civilite by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthCiviliteInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCiviliteById($id)
	{
		if($id === null)
			return null;
		$this->ensureCivilitesLoaded(array($id));
		if(!isset($this->_civilites[$id]))
			return null;
		return new GmthBridgeCivilite($this, $this->_civilites[$id]);
	}
	
	/**
	 * Gets all the civilites.
	 *
	 * @return \Iterator[GmthCiviliteInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCivilites()
	{
		$this->ensureCivilitesLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_civilites),
			$this, '\PhpExtended\Gmth\GmthBridgeCivilite');
	}
	
	/**
	 * Ensures the communes are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureCommunesLoaded(array $ids = array());
	
	/**
	 * Handle the commune object and updates the data commune list.
	 *
	 * @param GmthApiCommune $apiCommune
	 * @return boolean success
	 */
	protected function handleCommune(GmthApiCommune $apiCommune)
	{
		if(empty($apiCommune->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api commune.');
		if(isset($this->_communes[$apiCommune->getId()]))
			$commune = $this->_communes[$apiCommune->getId()];
		else
		{
			$commune = new GmthDataCommune();
			$this->_communes[$apiCommune->getId()] = $commune;
		}
		$commune->id = $apiCommune->getId();
		if(!empty($apiCommune->getNom()))
			$commune->nom = $apiCommune->getNom();
		if(!empty($apiCommune->getCodePostal()))
			$commune->code_postal = $apiCommune->getCodePostal();
		if(!empty($apiCommune->getCodeInsee()))
			$commune->code_insee = $apiCommune->getCodeInsee();
		if($apiCommune->getDepartement() !== null)
		{
			$this->handleDepartement($apiCommune->getDepartement());
			if(!empty($apiCommune->getDepartement()->getCode()))
				$commune->departement_id = $apiCommune->getDepartement()->getCode();
		}
		
		return true;
	}
	
	/**
	 * Gets the commune by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthCommuneInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCommuneById($id)
	{
		if($id === null)
			return null;
		$this->ensureCommunesLoaded(array($id));
		if(!isset($this->_communes[$id]))
			return null;
		return new GmthBridgeCommune($this, $this->_communes[$id]);
	}
	
	/**
	 * Gets all the communes.
	 *
	 * @return \Iterator[GmthCommuneInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getCommunes()
	{
		$this->ensureCommunesLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_communes),
			$this, '\PhpExtended\Gmth\GmthBridgeCommune');
	}
	
	/**
	 * Gets all the communes with the departement filter.
	 * 
	 * @param string $departementId
	 * @param \Iterator[GmthCommuneInterface] $communeIterator
	 * @return \Iterator[GmthCommuneInterface]
	 */
	public function getCommunesByDepartementId($departementId, \Iterator $communeIterator = null)
	{
		if($communeIterator === null)
			$communeIterator = $this->getCommunes();
		return new GmthFilterCommuneByDepartementIterator($communeIterator, $departementId);
	}
	
	/**
	 * Ensures the decisions are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureDecisionsLoaded(array $ids = array());
	
	/**
	 * Handle the decision object and updates the data decision list.
	 *
	 * @param GmthApiDecision $apiDecision
	 * @return boolean success
	 */
	protected function handleDecision(GmthApiDecision $apiDecision, GmthApiDemande $apiDemande)
	{
		if(empty($apiDecision->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api decision.');
		if(isset($this->_decisions[$apiDecision->getId()]))
			$decision = $this->_decisions[$apiDecision->getId()];
		else
		{
			$decision = new GmthDataDecision();
			$this->_decisions[$apiDecision->getId()] = $decision;
		}
		$decision->id = $apiDecision->getId();
		$decision->demande_id = $apiDemande->getId();
		if($apiDecision->getAvisDecision() !== null)
		{
			$this->handleAvisDecision($apiDecision->getAvisDecision());
			if(!empty($apiDecision->getAvisDecision()->getId()))
				$decision->avis_decision_id = $apiDecision->getAvisDecision()->getId();
		}
		if($apiDecision->getTypeDecision() !== null)
		{
			$this->handleTypeDecision($apiDecision->getTypeDecision());
			if(!empty($apiDecision->getTypeDecision()->getId()))
				$decision->type_decision_id = $apiDecision->getTypeDecision()->getId();
		}
		if(!empty($apiDecision->getDateCommission()))
			$decision->date_commission = $apiDecision->getDateCommission();
		if(!empty($apiDecision->getConfirmationDecisionInitiale()))
			$decision->confirmation = $apiDecision->getConfirmationDecisionInitiale();
		if(!empty($apiDecision->getMotivationNotification()))
			$decision->motif = $apiDecision->getMotivationNotification();
		if(!empty($apiDecision->getDateNotification()))
			$decision->date_notification = $apiDecision->getDateNotification();
		if(!empty($apiDecision->getMotifRefus()))
			$decision->motif_refus = $apiDecision->getMotifRefus();
		
		// those are booleans
		$decision->auditif_obtenu = $apiDecision->getAuditifObtenu();
		$decision->mental_obtenu = $apiDecision->getMentalObtenu();
		$decision->moteur_obtenu = $apiDecision->getMoteurObtenu();
		$decision->visuel_obtenu = $apiDecision->getVisuelObtenu();
		
		return true;
	}
	
	/**
	 * Gets the decisions by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthDecisionInterface
	 */
	public function getDecisionById($id)
	{
		if($id === null)
			return null;
		$this->ensureDecisionsLoaded(array($id));
		if(!isset($this->_decisions[$id]))
			return null;
		return new GmthBridgeDecision($this, $this->_decisions[$id]);
	}
	
	/**
	 * Gets all the decisions.
	 *
	 * @return \Iterator[GmthDecisionInterface]
	 */
	public function getDecisions()
	{
		$this->ensureDecisionsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_decisions),
			$this, '\PhpExtended\Gmth\GmthBridgeDecision');
	}
	
	/**
	 * Gets all the decisions filtered by avis decision.
	 * 
	 * @param string $avisDecisionId
	 * @param \Iterator[GmthDecisionInterface] $decisionIterator
	 * @return \Iterator[GmthDecisionInterface]
	 */
	public function getDecisionsByAvisDecisionId($avisDecisionId, \Iterator $decisionIterator = null)
	{
		if($decisionIterator === null)
			$decisionIterator = $this->getDecisions();
		return new GmthFilterDecisionByAvisDecisionIterator($decisionIterator, $avisDecisionId);
	}
	
	/**
	 * Gets all the decisions filtered by type decision.
	 * 
	 * @param string $typeDecisionId
	 * @param \Iterator[GmthDecisionInterface] $decisionIterator
	 * @return \Iterator[GmthDecisionInterface]
	 */
	public function getDecisionsByTypeDecisionId($typeDecisionId, \Iterator $decisionIterator = null)
	{
		if($decisionIterator === null)
			$decisionIterator = $this->getDecisions();
		return new GmthFilterDecisionByTypeDecisionIterator($decisionIterator, $typeDecisionId);
	}
	
	/**
	 * Gets all the decisions filtered by demande.
	 * 
	 * @param string $demandeId
	 * @param \Iterator[GmthDecisionInterface] $decisionIterator
	 * @return \Iterator[GmthDecisionInterface]
	 */
	public function getDecisionsByDemandeId($demandeId, \Iterator $decisionIterator = null)
	{
		if($decisionIterator === null)
			$decisionIterator = $this->getDecisions();
		return new GmthFilterDecisionByDemandeIterator($decisionIterator, $demandeId);
	}
	
	/**
	 * Ensures the demandes are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureDemandesLoaded(array $ids = array());
	
	/**
	 * Handle the demande object and updates the data demande list.
	 *
	 * @param GmthApiDemande $apiDemande
	 * @return boolean success
	 */
	protected function handleDemande(GmthApiDemande $apiDemande)
	{
		if(empty($apiDemande->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api demande.');
		if(isset($this->_demandes[$apiDemande->getId()]))
			$demande = $this->_demandes[$apiDemande->getId()];
		else
		{
			$demande = new GmthDataDemande();
			$this->_demandes[$apiDemande->getId()] = $demande;
		}
		$demande->id = $apiDemande->getId();
		if($apiDemande->getCandidat() !== null)
		{
			$this->handleCandidat($apiDemande->getCandidat());
			if(!empty($apiDemande->getCandidat()->getId()))
				$demande->candidat_id = $apiDemande->getCandidat()->getId();
		}
		if($apiDemande->getCandidature() !== null)
		{
			$this->handleCandidature($apiDemande->getCandidature(), $apiDemande);
			if(!empty($apiDemande->getCandidature()->getId()))
				$demande->candidature_id = $apiDemande->getCandidature()->getId();
		}
		if($apiDemande->getTypeDemande() !== null)
		{
			$this->handleTypeDemande($apiDemande->getTypeDemande());
			if(!empty($apiDemande->getTypeDemande()->getId()))
				$demande->type_demande_id = $apiDemande->getTypeDemande()->getId();
		}
		if($apiDemande->getEtablissement() !== null)
		{
			$this->handleEtablissement($apiDemande->getEtablissement());
			if(!empty($apiDemande->getEtablissement()->getId()))
				$demande->etablissement_id = $apiDemande->getEtablissement()->getId();
		}
		if($apiDemande->getEtat() !== null)
		{
			$this->handleEtat($apiDemande->getEtat());
			if(!empty($apiDemande->getEtat()->getId()))
				$demande->etat_id = $apiDemande->getEtat()->getId();
		}
		$demande->locker_id = $apiDemande->getLockerId();	// even if empty
		foreach($apiDemande->getActivites() as $apiActivite)
		{
			$demande->activite_ids[] = $apiActivite->getId();
			$this->handleActivite($apiActivite);
		}
		$demande->activite_ids = array_unique($demande->activite_ids);
		foreach($apiDemande->getTypesPieceJointe() as $apiTypePieceJointe)
		{
			$demande->types_piece_jointe_ids[] = $apiTypePieceJointe->getId();
			$this->handleTypePieceJointe($apiTypePieceJointe);
		}
		$demande->types_piece_jointe_ids = array_unique($demande->types_piece_jointe_ids);
		foreach($apiDemande->getPieceJointes() as $apiPieceJointe)
		{
			$this->handlePieceJointe($apiPieceJointe, $apiDemande);
		}
		foreach($apiDemande->getObservations() as $apiObservation)
		{
			$this->handleObservation($apiObservation, $apiDemande);
		}
		foreach($apiDemande->getEvaluations() as $apiEvaluation)
		{
			$this->handleEvaluation($apiEvaluation);
		}
		foreach($apiDemande->getDecisions() as $apiDecision)
		{
			$this->handleDecision($apiDecision, $apiDemande);
		}
		if(!empty($apiDemande->getNumeroDemande()))
			$demande->numero_mnt = $apiDemande->getNumeroDemande();
		if(!empty($apiDemande->getDateVisite()))
			$demande->date_visite = $apiDemande->getDateVisite();
		if(!empty($apiDemande->getAideDecisionCommission()))
			$demande->aide_decision = $apiDemande->getAideDecisionCommission();
		if(!empty($apiDemande->getRetrait()))
			$demande->is_retrait = $apiDemande->getRetrait();
		if(!empty($apiDemande->getMotifAbandon()))
			$demande->motif_abandon = $apiDemande->getMotifAbandon();
		if(!empty($apiDemande->getAmendement()))
			$demande->amendement = $apiDemande->getAmendement();
		
		return true;
	}
	
	/**
	 * Gets the demande by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthDemandeInterface
	 */
	public function getDemandeById($id)
	{
		if($id === null)
			return null;
		$this->ensureDemandesLoaded(array($id));
		if(!isset($this->_demandes[$id]))
			return null;
		return new GmthBridgeDemande($this, $this->_demandes[$id]);
	}
	
	/**
	 * Gets all the demandes.
	 *
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandes()
	{
		$this->ensureDemandesLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_demandes),
			$this, '\PhpExtended\Gmth\GmthBridgeDemande');
	}
	
	/**
	 * Gets all the demandes filtered by activite.
	 * 
	 * @param string $activiteId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByActiviteId($activiteId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByActiviteIterator($demandeIterator, $activiteId);
	}
	
	/**
	 * Gets all the demandes filtered by avis decision.
	 * 
	 * @param string $avisDecisionId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByAvisDecisionId($avisDecisionId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByAvisDecisionIterator($demandeIterator, $avisDecisionId);
	}
	
	/**
	 * Gets all the demandes filtered by candidat.
	 * 
	 * @param string $candidatId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByCandidatId($candidatId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByCandidatIterator($demandeIterator, $candidatId);
	}
	
	/**
	 * Gets all the demandes filtered by etablissement.
	 * 
	 * @param string $etablissementId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByEtablissementId($etablissementId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByEtablissementIterator($demandeIterator, $etablissementId);
	}
	
	/**
	 * Gets all the demandes filtered by etat.
	 * 
	 * @param string $etatId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByEtatId($etatId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByEtatIterator($demandeIterator, $etatId);
	}
	
	/**
	 * Gets all the demandes filtered by type demande.
	 * 
	 * @param string $typeDemandeId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByTypeDemandeId($typeDemandeId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByTypeDemandeIterator($demandeIterator, $typeDemandeId);
	}
	
	/**
	 * Gets all the demandes filtered by type piece jointe.
	 * 
	 * @param string $typePieceJointeId
	 * @param \Iterator[GmthDemandeInterface] $demandeIterator
	 * @return \Iterator[GmthDemandeInterface]
	 */
	public function getDemandesByTypePieceJointeId($typePieceJointeId, \Iterator $demandeIterator = null)
	{
		if($demandeIterator === null)
			$demandeIterator = $this->getDemandes();
		return new GmthFilterDemandeByTypePieceJointeIterator($demandeIterator, $typePieceJointeId);
	}
	
	/**
	 * Ensures the departements are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureDepartementsLoaded(array $ids = array());
	
	/**
	 * Handle the departement object and updates the data departement list.
	 *
	 * @param GmthApiDepartement $apiDepartement
	 * @return boolean success
	 */
	protected function handleDepartement(GmthApiDepartement $apiDepartement)
	{
		if(empty($apiDepartement->getCode()))
			return false;
// 			throw new GmthApiException('Empty code for api departement.');
		if(isset($this->_departements[$apiDepartement->getCode()]))
			$departement = $this->_departements[$apiDepartement->getCode()];
		else
		{
			$departement = new GmthDataDepartement();
			$this->_departements[$apiDepartement->getCode()] = $departement;
		}
		$departement->id = $apiDepartement->getCode();
		if(!empty($apiDepartement->getNom()))
			$departement->nom = $apiDepartement->getNom();
		if($apiDepartement->getRegion() !== null)
		{
			$this->handleRegion($apiDepartement->getRegion());
			if(!empty($apiDepartement->getRegion()->getId()))
				$departement->region_id = $apiDepartement->getRegion()->getId();
		}
		
		return true;
	}
	
	/**
	 * Gets the departement by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthDepartementInterface
	 */
	public function getDepartementById($id)
	{
		if($id === null)
			return null;
		$this->ensureDepartementsLoaded(array($id));
		if(!isset($this->_departements[$id]))
			return null;
		return new GmthBridgeDepartement($this, $this->_departements[$id]);
	}
	
	/**
	 * Gets all the departements.
	 *
	 * @return \Iterator[GmthDepartementInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getDepartements()
	{
		$this->ensureDepartementsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_departements),
			$this, 'PhpExtended\Gmth\GmthBridgeDepartement');
	}
	
	/**
	 * Gets all the departements filtered by region.
	 * 
	 * @param string $regionId
	 * @param \Iterator[GmthDepartementInterface] $departementIterator
	 * @return \Iterator[GmthDepartementInterface]
	 */
	public function getDepartementsByRegionId($regionId, \Iterator $departementIterator = null)
	{
		if($departementIterator === null)
			$departementIterator = $this->getDepartements();
		return new GmthFilterDepartementByRegionIterator($departementIterator, $regionId);
	}
	
	/**
	 * Ensures the etablissements are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureEtablissementsLoaded(array $ids = array());
	
	/**
	 * Handle the etablissement object and updates the data etablissement list.
	 *
	 * @param GmthApiEtablissement $apiEtablissement
	 * @return boolean success
	 */
	protected function handleEtablissement(GmthApiEtablissement $apiEtablissement)
	{
		if(empty($apiEtablissement->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api etablissement');
		if(isset($this->_etablissements[$apiEtablissement->getId()]))
			$etablissement = $this->_etablissements[$apiEtablissement->getId()];
		else
		{
			$etablissement = new GmthDataEtablissement();
			$this->_etablissements[$apiEtablissement->getId()] = $etablissement;
		}
		$etablissement->id = $apiEtablissement->getId();
		if($apiEtablissement->getCommune() !== null)
		{
			$this->handleCommune($apiEtablissement->getCommune());
			if(!empty($apiEtablissement->getCommune()->getId()))
				$etablissement->commune_id = $apiEtablissement->getCommune()->getId();
		}
		if($apiEtablissement->getDemandeActive() !== null)
		{
			$this->handleDemande($apiEtablissement->getDemandeActive());
			if(!empty($apiEtablissement->getDemandeActive()->getId()))
				$etablissement->demande_active_id = $apiEtablissement->getDemandeActive()->getId();
		}
		if($apiEtablissement->getTypeClassement() !== null)
		{
			$this->handleTypeClassement($apiEtablissement->getTypeClassement());
			if(!empty($apiEtablissement->getTypeClassement()->getId()))
				$etablissement->type_classement_id = $apiEtablissement->getTypeClassement()->getId();
		}
		foreach($apiEtablissement->getDemandes() as $apiDemande)
		{
			$this->handleDemande($apiDemande);
		}
		if(!empty($apiEtablissement->getNom()))
			$etablissement->nom = $apiEtablissement->getNom();
		if(!empty($apiEtablissement->getNumeroSiret()))
			$etablissement->numero_siret = $apiEtablissement->getNumeroSiret();
		if(!empty($apiEtablissement->getRaisonSociale()))
			$etablissement->raison_sociale = $apiEtablissement->getRaisonSociale();
		if(!empty($apiEtablissement->getDateDebutExploitation()))
			$etablissement->date_debut_exploitation = $apiEtablissement->getDateDebutExploitation();
		if(!empty($apiEtablissement->getAdresse1()))
			$etablissement->adresse1 = $apiEtablissement->getAdresse1();
		if(!empty($apiEtablissement->getAdresse2()))
			$etablissement->adresse2 = $apiEtablissement->getAdresse2();
		if(!empty($apiEtablissement->getAdresse3()))
			$etablissement->adresse3 = $apiEtablissement->getAdresse3();
		if(!empty($apiEtablissement->getNombrePlaques()))
			$etablissement->nombre_plaques = $apiEtablissement->getNombrePlaques();
		if(!empty($apiEtablissement->getClassementErp()))
			$etablissement->classement_erp = $apiEtablissement->getClassementErp();
		if(!empty($apiEtablissement->getClassementIop()))
			$etablissement->classement_iop = $apiEtablissement->getClassementIop();
		if(!empty($apiEtablissement->getDateClassementAtoutFrance()))
			$etablissement->date_classement_atout_france = $apiEtablissement->getDateClassementAtoutFrance();
		if(!empty($apiEtablissement->getNombreEtoiles()))
			$etablissement->nombre_etoiles = $apiEtablissement->getNombreEtoiles();
		if(!empty($apiEtablissement->getMarqueEtatQualiteTourisme()))
			$etablissement->marque_qualite_tourisme = $apiEtablissement->getMarqueEtatQualiteTourisme();
		if(!empty($apiEtablissement->getBoitePostale()))
			$etablissement->boite_postale = $apiEtablissement->getBoitePostale();
		if(!empty($apiEtablissement->getCourriel()))
			$etablissement->email = $apiEtablissement->getCourriel();
		if(!empty($apiEtablissement->getTelephone()))
			$etablissement->telephone = $apiEtablissement->getTelephone();
		if(!empty($apiEtablissement->getSiteInternet()))
			$etablissement->site_internet = $apiEtablissement->getSiteInternet();
		if(!empty($apiEtablissement->getAdresseProprietaire()))
			$etablissement->adresse_proprio = $apiEtablissement->getAdresseProprietaire();
		if(!empty($apiEtablissement->getMotifRetrait()))
			$etablissement->motif_retrait = $apiEtablissement->getMotifRetrait();
		
		return true;
	}
	
	/**
	 * Gets the etablissement by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthEtablissementInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getEtablissementById($id)
	{
		if($id === null)
			return null;
		$this->ensureEtablissementsLoaded(array($id));
		if(!isset($this->_etablissements[$id]))
			return null;
		return new GmthBridgeEtablissement($this, $this->_etablissements[$id]);
	}
	
	/**
	 * Gets all the etablissements.
	 *
	 * @return \Iterator[GmthEtablissementInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getEtablissements()
	{
		$this->ensureEtablissementsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_etablissements),
			$this, '\PhpExtended\Gmth\GmthEtablissement');
	}
	
	/**
	 * Gets all the etablissements filtered by type classement.
	 * 
	 * @param string $typeClassementId
	 * @param \Iterator[GmthEtablissementInterface] $etablissementIterator
	 * @return \Iterator[GmthEtablissementInterface]
	 */
	public function getEtablissementsByTypeClassementId($typeClassementId, \Iterator $etablissementIterator = null)
	{
		if($etablissementIterator === null)
			$etablissementIterator = $this->getEtablissements();
		return new GmthFilterEtablissementByTypeClassementIterator($etablissementIterator, $typeClassementId);
	}
	
	/**
	 * Gets all the etablissements filtered by commune.
	 * 
	 * @param string $communeId
	 * @param \Iterator[GmthEtablissementInterface] $etablissementIterator
	 * @return \Iterator[GmthEtablissementInterface]
	 */
	public function getEtablissementsByCommuneId($communeId, \Iterator $etablissementIterator = null)
	{
		if($etablissementIterator === null)
			$etablissementIterator = $this->getEtablissements();
		return new GmthFilterEtablissementByCommuneIterator($etablissementIterator, $typeClassementId);
	}
	
	/**
	 * Ensures the etats are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureEtatsLoaded(array $ids = array());
	
	/**
	 * Handle the etat object and updates the data etat list.
	 *
	 * @param GmthApiEtat $apiEtat
	 * @return boolean success
	 */
	protected function handleEtat(GmthApiEtat $apiEtat)
	{
		if(empty($apiEtat->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api etat');
		if(isset($this->_etats[$apiEtat->getId()]))
			$etat = $this->_etats[$apiEtat->getId()];
		else
		{
			$etat = new GmthDataEtat();
			$this->_etats[$apiEtat->getId()] = $etat;
		}
		$etat->id = $apiEtat->getId();
		if(!empty($apiEtat->getNom()))
			$etat->libelle = $apiEtat->getNom();
		
		return true;
	}
	
	/**
	 * Gets the etat by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthEtatInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getEtatById($id)
	{
		if($id === null)
			return null;
		$this->ensureEtatsLoaded(array($id));
		if(!isset($this->_etats[$id]))
			return null;
		return new GmthBridgeEtat($this, $this->_etats[$id]);
	}
	
	/**
	 * Gets all the etats.
	 *
	 * @return \Iterator[GmthEtatInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getEtats()
	{
		$this->ensureEtatsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_etats),
			$this, '\PhpExtended\Gmth\GmthBridgeEtat');
	}
	
	/**
	 * Ensures the evaluations are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureEvaluationsLoaded(array $ids = array());
	
	/**
	 * Handle the evaluation object and updates the data evaluation list.
	 *
	 * @param GmthApiEvaluation $apiEvaluation
	 * @return boolean success
	 */
	protected function handleEvaluation(GmthApiEvaluation $apiEvaluation)
	{
		if(empty($apiEvaluation->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api evaluation.');
		if(isset($this->_evaluations[$apiEvaluation->getId()]))
			$evaluation = $apiEvaluation->getId();
		else
		{
			$evaluation = new GmthDataEvaluation();
			$this->_evaluations[$apiEvaluation->getId()] = $evaluation;
		}
		$evaluation->id = $apiEvaluation->getId();
		if(!empty($apiEvaluation->getDemandeId()))
			$evaluation->demande_id = $apiEvaluation->getDemandeId();
		if(!empty($apiEvaluation->getGrilleEvaluationId()))
			$evaluation->grille_evaluation_id = $apiEvaluation->getGrilleEvaluationId();
		if(!empty($apiEvaluation->getNom()))
			$evaluation->nom = $apiEvaluation->getNom();
		$evaluation->complete = $apiEvaluation->getComplete();
		if($apiEvaluation->getGrilleEvaluation() !== null)
		{
			$this->handleGrilleEvaluation($apiEvaluation->getGrilleEvaluation());
			if(!empty($apiEvaluation->getGrilleEvaluation()->getData()))
				$evaluation->data = $apiEvaluation->getGrilleEvaluation()->getData();
		}
		foreach($apiEvaluation->getAviss() as $apiAvis)
		{
			$this->handleAvis($apiAvis, $apiEvaluation);
		}
		
		return true;
	}
	
	/**
	 * Gets the evaluation by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthEvaluationInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getEvaluationById($id)
	{
		if($id === null)
			return null;
		$this->ensureEvaluationsLoaded(array($id));
		if(!isset($this->_evaluations[$id]))
			return null;
		return new GmthBridgeEvaluation($this, $this->_evaluations[$id]);
	}
	
	/**
	 * Gets all the evaluations.
	 *
	 * @return \Iterator[GmthEvaluationInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getEvaluations()
	{
		$this->ensureEvaluationsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_evaluations),
			$this, '\PhpExtended\Gmth\GmthBridgeEvaluation');
	}
	
	/**
	 * Gets all the evaluations filtered by demande.
	 * 
	 * @param string $demandeId
	 * @param \Iterator[GmthEvaluationInterface] $evaluationIterator
	 * @return \Iterator[GmthEvaluationInterface]
	 */
	public function getEvaluationsByDemandeId($demandeId, \Iterator $evaluationIterator = null)
	{
		if($evaluationIterator === null)
			$evaluationIterator = $this->getEvaluations();
		return new GmthFilterEvaluationByDemandeIterator($evaluationIterator, $demandeId);
	}
	
	/**
	 * Gets all the evaluations filtered by grille evaluation.
	 * 
	 * @param string $grilleEvaluationId
	 * @param \Iterator[GmthEvaluationInterface] $evaluationIterator
	 * @return \Iterator[GmthEvaluationInterface]
	 */
	public function getEvaluationsByGrilleEvaluationId($grilleEvaluationId, \Iterator $evaluationIterator = null)
	{
		if($evaluationIterator === null)
			$evaluationIterator = $this->getEvaluations();
		return new GmthFilterEvaluationByGrilleEvaluationIterator($evaluationIterator, $grilleEvaluationId);
	}
	
	/**
	 * Ensures the grilles candidature are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureGrillesCandidatureLoaded(array $ids = array());
	
	/**
	 * Handle the grille candidature object and updates the grille candidature
	 * list.
	 *
	 * @param GmthApiGrille $apiGrilleCandidature
	 * @return boolean success
	 */
	protected function handleGrilleCandidature(GmthApiGrille $apiGrilleCandidature)
	{
		if(empty($apiGrilleCandidature->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api grille candidature.');
		if(isset($this->_grilles_candidature[$apiGrilleCandidature->getId()]))
			$grilleCandidature = $this->_grilles_candidature[$apiGrilleCandidature->getId()];
		else
		{
			$grilleCandidature = new GmthDataGrille();
			$this->_grilles_candidature[$apiGrilleCandidature->getId()] = $grilleCandidature;
		}
		$grilleCandidature->id = $apiGrilleCandidature->getId();
		if(!empty($apiGrilleCandidature->getNom()))
			$grilleCandidature->nom = $apiGrilleCandidature->getNom();
		if(!empty($apiGrilleCandidature->getDateDebut()))
			$grilleCandidature->date_debut = $apiGrilleCandidature->getDateDebut();
		if(!empty($apiGrilleCandidature->getDateFin()))
			$grilleCandidature->date_fin = $apiGrilleCandidature->getDateFin();
		if(!empty($apiGrilleCandidature->getData()))
			$grilleCandidature->data = $apiGrilleCandidature->getData();
		if(!empty($apiGrilleCandidature->getVersion()))
			$grilleCandidature->version = $apiGrilleCandidature->getVersion();
		if(!empty($apiGrilleCandidature->getDescription()))
			$grilleCandidature->description = $apiGrilleCandidature->getDescription();
		
		return true;
	}
	
	/**
	 * Gets the grille candidature by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthGrilleCandidatureInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getGrilleCandidatureById($id)
	{
		if($id === null)
			return null;
		$this->ensureGrillesCandidatureLoaded(array($id));
		if(!isset($this->_grilles_candidature[$id]))
			return null;
		return new GmthBridgeGrilleCandidature($this, $this->_grilles_candidature[$id]);
	}
	
	/**
	 * Gets all the grilles candidature.
	 *
	 * @return \Iterator[GmthGrilleCandidatureInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getGrillesCandidature()
	{
		$this->ensureGrillesCandidatureLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_grilles_candidature),
			$this, '\PhpExtended\Gmth\GmthBridgeGrilleCandidature');
	}
	
	/**
	 * Ensures the grilles candidature are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureGrillesEvaluationLoaded(array $ids = array());
	
	/**
	 * Handle the grille evaluation object and updates the grille evaluation
	 * list.
	 *
	 * @param GmthApiGrille $apiGrilleEvaluation
	 * @return boolean success
	 */
	protected function handleGrilleEvaluation(GmthApiGrille $apiGrilleEvaluation)
	{
		if(empty($apiGrilleEvaluation->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api grille evaluation.');
		if(isset($this->_grilles_evaluation[$apiGrilleEvaluation->getId()]))
			$grilleEvaluation = $this->_grilles_evaluation[$apiGrilleEvaluation->getId()];
		else
		{
			$grilleEvaluation = new GmthDataGrille();
			$this->_grilles_evaluation[$apiGrilleEvaluation->getId()] = $grilleEvaluation;
		}
		$grilleEvaluation->id = $apiGrilleEvaluation->getId();
		if(!empty($apiGrilleEvaluation->getNom()))
			$grilleEvaluation->nom = $apiGrilleEvaluation->getNom();
		if(!empty($apiGrilleEvaluation->getDateDebut()))
			$grilleEvaluation->date_debut = $apiGrilleEvaluation->getDateDebut();
		if(!empty($apiGrilleEvaluation->getDateFin()))
			$grilleEvaluation->date_fin = $apiGrilleEvaluation->getDateFin();
		if(!empty($apiGrilleEvaluation->getData()))
			$grilleEvaluation->data = $apiGrilleEvaluation->getData();
		if(!empty($apiGrilleEvaluation->getVersion()))
			$grilleEvaluation->version = $apiGrilleEvaluation->getVersion();
		if(!empty($apiGrilleEvaluation->getDescription()))
			$grilleEvaluation->description = $apiGrilleEvaluation->getDescription();
		
		return true;
	}
	
	/**
	 * Gets the grille evaluation by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthGrilleEvaluationInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getGrilleEvaluationById($id)
	{
		if($id === null)
			return null;
		$this->ensureGrillesEvaluationLoaded(array($id));
		if(!isset($this->_grilles_evaluation[$id]))
			return null;
		return new GmthBridgeGrilleEvaluation($this, $this->_grilles_evaluation[$id]);
	}
	
	/**
	 * Gets all the grilles evaluation.
	 *
	 * @return \Iterator[GmthGrilleEvaluationInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getGrillesEvaluation()
	{
		$this->ensureGrillesEvaluationLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_grilles_evaluation),
			$this, '\PhpExtended\Gmth\GmthBridgeGrilleEvaluation');
	}
	
	/**
	 * Ensures the observations are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureObservationsLoaded(array $ids = array());
	
	/**
	 * Handle the observation object and udpates the observation list.
	 *
	 * @param GmthApiObservation $apiObservation
	 * @return boolean success
	 */
	protected function handleObservation(GmthApiObservation $apiObservation, GmthApiDemande $apiDemande)
	{
		if(empty($apiObservation->getId()))
			return true;
// 			throw new GmthApiException('Empty id for api observation.');
		if(isset($this->_observations[$apiObservation->getId()]))
			$observation = $this->_observations[$apiObservation->getId()];
		else
		{
			$observation = new GmthDataObservation();
			$this->_observations[$apiObservation->getId()] = $observation;
		}
		$observation->id = $apiObservation->getId();
		$observation->demande_id = $apiDemande->getId();
		if(!empty($apiObservation->getIdUtilisateur()))
			$observation->auteur_id = $apiObservation->getIdUtilisateur();
		if(!empty($apiObservation->getDate()))
			$observation->date = $apiObservation->getDate();
		if(!empty($apiObservation->getText()))
			$observation->text = $apiObservation->getText();
		
		return false;
	}
	
	/**
	 * Gets the observation by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthObservationInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getObservationById($id)
	{
		if($id === null)
			return null;
		$this->ensureObservationsLoaded(array($id));
		if(!isset($this->_observations[$id]))
			return null;
		return new GmthBridgeObservation($this, $this->_observations[$id]);
	}
	
	/**
	 * Gets all the observations.
	 *
	 * @return \Iterator[GmthObservationInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getObservations()
	{
		$this->ensureObservationsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_observations),
			$this, '\PhpExtended\Gmth\GmthBridgeObservation');
	}
	
	/**
	 * Gets all the observations filtered by demande.
	 * 
	 * @param string $demandeId
	 * @param \Iterator[GmthObservationInterface] $observationIterator
	 * @return \Iterator[GmthObservationInterface]
	 */
	public function getObservationsByDemandeId($demandeId, \Iterator $observationIterator = null)
	{
		if($observationIterator === null)
			$observationIterator = $this->getObservations();
		return new GmthFilterObservationByDemandeIterator($observationIterator, $demandeId);
	}
	
	/**
	 * Ensures the pieces jointes are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensurePieceJointeLoaded(array $ids = array());
	
	/**
	 * Handle the piece jointe object and updates the piece jointe list.
	 *
	 * @param GmthApiPieceJointe $apiPieceJointe
	 * @return boolean success
	 */
	protected function handlePieceJointe(GmthApiPieceJointe $apiPieceJointe, GmthApiDemande $apiDemande)
	{
		if(empty($apiPieceJointe->getId()))
			return true;
// 			throw new GmthApiException('Empty id for api piece jointe.');
		if(isset($this->_piece_jointes[$apiPieceJointe->getId()]))
			$pieceJointe = $this->_piece_jointes[$apiPieceJointe->getId()];
		else
		{
			$pieceJointe = new GmthDataPieceJointe();
			$this->_piece_jointes[$apiPieceJointe->getId()] = $pieceJointe;
		}
		$pieceJointe->id = $apiPieceJointe->getId();
		$pieceJointe->demande_id = $apiDemande->getId();
		if(!empty($apiPieceJointe->getNomTechnique()))
			$pieceJointe->techid = $apiPieceJointe->getNomTechnique();
		if($apiPieceJointe->getTypePieceJointe() !== null)
		{
			$this->handleTypePieceJointe($apiPieceJointe->getTypePieceJointe());
			if(!empty($apiPieceJointe->getTypePieceJointe()->getId()))
				$pieceJointe->type_piece_jointe_id = $apiPieceJointe->getTypePieceJointe()->getId();
		}
		if(!empty($apiPieceJointe->getNom()))
			$pieceJointe->nom = $apiPieceJointe->getNom();
		if(!empty($apiPieceJointe->getTaille()))
			$pieceJointe->taille = $apiPieceJointe->getTaille();
		
		return false;
	}
	
	/**
	 * Gets the piece jointe by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthPieceJointeInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getPieceJointeById($id)
	{
		if($id === null)
			return null;
		$this->ensurePieceJointeLoaded(array($id));
		if(!isset($this->_piece_jointes[$id]))
			return null;
		return new GmthBridgePieceJointe($this, $this->_piece_jointes[$id]);
	}
	
	/**
	 * Gets all the pieces jointes.
	 *
	 * @return \Iterator[GmthPieceJointeInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getPiecesJointes()
	{
		$this->ensurePieceJointeLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_piece_jointes),
			$this, '\PhpExtended\Gmth\GmthBridgePieceJointe');
	}
	
	/**
	 * Gets all the pieces jointes filtered by demande.
	 * 
	 * @param string $demandeId
	 * @param \Iterator[GmthPieceJointeInterface] $pieceJointeIterator
	 * @return \Iterator[GmthPieceJointeInterface]
	 */
	public function getPiecesJointesByDemandeId($demandeId, \Iterator $pieceJointeIterator = null)
	{
		if($pieceJointeIterator === null)
			$pieceJointeIterator = $this->getPiecesJointes();
		return new GmthFilterPieceJointeByDemandeIterator($pieceJointeIterator, $demandeId);
	}
	
	/**
	 * Gets all the pieces jointes filtered by type piece jointe.
	 * 
	 * @param string $typePieceJointeId
	 * @param \Iterator[GmthPieceJointeInterface] $pieceJointeIterator
	 * @return \Iterator[GmthPieceJointeInterface]
	 */
	public function getPiecesJointesByTypePieceJointeId($typePieceJointeId, \Iterator $pieceJointeIterator = null)
	{
		if($pieceJointeIterator === null)
			$pieceJointeIterator = $this->getPiecesJointes();
		return new GmthFilterPieceJointeByTypePieceJointeIterator($pieceJointeIterator, $typePieceJointeId);
	}
	
	/**
	 * Ensures the regions are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureRegionsLoaded(array $ids = array());
	
	/**
	 * Handle the region object and updates the region list.
	 *
	 * @param GmthApiRegion $apiRegion
	 * @return boolean success
	 */
	protected function handleRegion(GmthApiRegion $apiRegion)
	{
		if(empty($apiRegion->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api region.');
		if(isset($this->_regions[$apiRegion->getId()]))
			$region = $this->_regions[$apiRegion->getId()];
		else
		{
			$region = new GmthDataRegion();
			$this->_regions[$apiRegion->getId()] = $region;
		}
		$region->id = $apiRegion->getId();
		if(!empty($apiRegion->getNom()))
			$region->nom = $apiRegion->getNom();
		if(!empty($apiRegion->getNomContact()))
			$region->nom_contact = $apiRegion->getNomContact();
		if(!empty($apiRegion->getPrenomContact()))
			$region->prenom_contact = $apiRegion->getPrenomContact();
		if(!empty($apiRegion->getTelephoneContact()))
			$region->telephone_contact = $apiRegion->getTelephoneContact();
		if(!empty($apiRegion->getAdresseContact()))
			$region->adresse_contact = $apiRegion->getAdresseContact();
		if(!empty($apiRegion->getCourrielContact()))
			$region->email_contact = $apiRegion->getCourrielContact();
		foreach($apiRegion->getDepartements() as $apiDepartement)
		{
			$this->handleDepartement($apiDepartement);
		}
		
		return true;
	}
	
	/**
	 * Gets the region by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthRegionInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getRegionById($id)
	{
		if($id === null)
			return null;
		$this->ensureRegionsLoaded(array($id));
		if(!isset($this->_regions[$id]))
			return null;
		return new GmthBridgeRegion($this, $this->_regions[$id]);
	}
	
	/**
	 * Gets all the regions.
	 *
	 * @return \Iterator[GmthRegionInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getRegions()
	{
		$this->ensureRegionsLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_regions),
			$this, '\PhpExtended\Gmth\GmthBridgeRegion');
	}
	
	/**
	 * Ensures the types classement are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureTypesClassementLoaded(array $ids = array());
	
	/**
	 * Handle the type classement object and updates the type classement list.
	 *
	 * @param GmthApiTypeClassement $apiTypeClassement
	 * @return boolean success
	 */
	protected function handleTypeClassement(GmthApiTypeClassement $apiTypeClassement)
	{
		if(empty($apiTypeClassement->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api type classement.');
		if(isset($this->_types_classement[$apiTypeClassement->getId()]))
			$typeClassement = $this->_types_classement[$apiTypeClassement->getId()];
		else
		{
			$typeClassement = new GmthDataTypeClassement();
			$this->_types_classement[$apiTypeClassement->getId()] = $typeClassement;
		}
		$typeClassement->id = $apiTypeClassement->getId();
		if(!empty($apiTypeClassement->getNom()))
			$typeClassement->libelle = $apiTypeClassement->getNom();
		
		return true;
	}
	
	/**
	 * Gets the type classement by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthTypeClassementInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypeClassementById($id)
	{
		if($id === null)
			return null;
		$this->ensureTypesClassementLoaded(array($id));
		if(!isset($this->_types_classement[$id]))
			return null;
		return new GmthBridgeTypeClassement($this, $this->_types_classement[$id]);
	}
	
	/**
	 * Gets all the types classements.
	 *
	 * @return \Iterator[GmthTypeClassementInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypesClassement()
	{
		$this->ensureTypesClassementLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_types_classement),
			$this, '\PhpExtended\Gmth\GmthBridgeTypeClassement');
	}
	
	/**
	 * Ensures the types decision are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureTypeDecisionLoaded(array $ids = array());
	
	/**
	 * Handle the type decision object and updates the type decision list.
	 *
	 * @param GmthApiTypeDecision $apiTypeDecision
	 * @return boolean success
	 */
	protected function handleTypeDecision(GmthApiTypeDecision $apiTypeDecision)
	{
		if(empty($apiTypeDecision->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api type decision.');
		if(isset($this->_types_decision[$apiTypeDecision->getId()]))
			$typeDecision = $this->_types_decision[$apiTypeDecision->getId()];
		else
		{
			$typeDecision = new GmthDataTypeDecision();
			$this->_types_decision[$apiTypeDecision->getId()] = $typeDecision;
		}
		$typeDecision->id = $apiTypeDecision->getId();
		if(!empty($apiTypeDecision->getNom()))
			$typeDecision->libelle = $apiTypeDecision->getNom();
		
		return true;
	}
	
	/**
	 * Gets the type decision by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthTypeDecisionInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypeDecisionById($id)
	{
		if($id === null)
			return null;
		$this->ensureTypeDecisionLoaded(array($id));
		if(!isset($this->_types_decision[$id]))
			return null;
		return new GmthBridgeTypeDecision($this, $this->_types_decision[$id]);
	}
	
	/**
	 * Gets all the types decision.
	 *
	 * @return \Iterator[GmthTypeDecisionInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypesDecision()
	{
		$this->ensureTypeDecisionLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_types_decision),
			$this, '\PhpExtended\Gmth\GmthBridgeTypeDecision');
	}
	
	/**
	 * Ensures the types demande are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureTypesDemandeLoaded(array $ids = array());
	
	/**
	 * Handle the type demande object and updates the type demande list.
	 *
	 * @param GmthApiTypeDemande $apiTypeDemande
	 * @return boolean success
	 */
	protected function handleTypeDemande(GmthApiTypeDemande $apiTypeDemande)
	{
		if(empty($apiTypeDemande->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api type demande.');
		if(isset($this->_types_demande[$apiTypeDemande->getId()]))
			$typeDemande = $this->_types_demande[$apiTypeDemande->getId()];
		else
		{
			$typeDemande = new GmthDataTypeDemande();
			$this->_types_demande[$apiTypeDemande->getId()] = $typeDemande;
		}
		$typeDemande->id = $apiTypeDemande->getId();
		if(!empty($apiTypeDemande->getNom()))
			$typeDemande->libelle = $apiTypeDemande->getNom();
		
		return true;
	}
	
	/**
	 * Gets the type demande by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthTypeDemandeInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypeDemandeById($id)
	{
		if($id === null)
			return null;
		$this->ensureTypesDemandeLoaded(array($id));
		if(!isset($this->_types_demande[$id]))
			return null;
		return new GmthBridgeTypeDemande($this, $this->_types_demande[$id]);
	}
	
	/**
	 * Gets all the types demande.
	 *
	 * @return \Iterator[GmthTypeDemandeInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypesDemande()
	{
		$this->ensureTypesDemandeLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_types_demande),
			$this, '\PhpExtended\Gmth\GmthBridgeTypeDemande');
	}
	
	/**
	 * Ensures the types piece jointe are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureTypesPieceJointeLoaded(array $ids = array());
	
	/**
	 * Handle the type piece jointe object and updates the type piece jointe list.
	 *
	 * @param GmthApiTypePieceJointe $apiTypePieceJointe
	 * @return boolean success
	 */
	protected function handleTypePieceJointe(GmthApiTypePieceJointe $apiTypePieceJointe)
	{
		if(empty($apiTypePieceJointe->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api type piece jointe.');
		if(isset($this->_types_piece_jointe[$apiTypePieceJointe->getId()]))
			$typePieceJointe = $this->_types_piece_jointe[$apiTypePieceJointe->getId()];
		else
		{
			$typePieceJointe = new GmthDataTypePieceJointe();
			$this->_types_piece_jointe[$apiTypePieceJointe->getId()] = $typePieceJointe;
		}
		$typePieceJointe->id = $apiTypePieceJointe->getId();
		if(!empty($apiTypePieceJointe->getNom()))
			$typePieceJointe->libelle = $apiTypePieceJointe->getNom();
		
		return true;
	}
	
	/**
	 * Gets the type piece jointe by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthPieceJointeInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypePieceJointeById($id)
	{
		if($id === null)
			return null;
		$this->ensureTypesPieceJointeLoaded(array($id));
		if(!isset($this->_types_piece_jointe[$id]))
			return null;
		return new GmthBridgeTypePieceJointe($this, $this->_types_piece_jointe[$id]);
	}
	
	/**
	 * Gets all the types piece jointe.
	 *
	 * @return \Iterator[GmthTypePieceJointeInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getTypesPieceJointe()
	{
		$this->ensureTypesPieceJointeLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_types_piece_jointe),
			$this, '\PhpExtended\Gmth\GmthBridgeTypePieceJointe');
	}
	
	/**
	 * Ensures the utilisateurs are well loaded.
	 *
	 * @throws GmthApiException if the data cannot be loaded
	 */
	protected abstract function ensureUtilisateursLoaded(array $ids = array());
	
	/**
	 * Handle the utilisateurs objects and updates the utilisateur list.
	 *
	 * @param GmthApiObservation $apiObservation
	 * @return boolean success
	 */
	protected function handleUtilisateur(GmthApiObservation $apiObservation)
	{
		if(empty($apiObservation->getId()))
			return false;
// 			throw new GmthApiException('Empty id for api utilisateur.');
		if(isset($this->_utilisateurs[$apiObservation->getIdUtilisateur()]))
			$utilisateur = $this->_utilisateurs[$apiObservation->getIdUtilisateur()];
		else
		{
			$utilisateur = new GmthDataUtilisateur();
			$this->_utilisateurs[$apiObservation->getIdUtilisateur()] = $utilisateur;
		}
		$utilisateur->id = $apiObservation->getIdUtilisateur();
		if(!empty($apiObservation->getNomUtilisateur()))
			$utilisateur->nom = $apiObservation->getNomUtilisateur();
		if(!empty($apiObservation->getPrenomUtilisateur()))
			$utilisateur->prenom = $apiObservation->getPrenomUtilisateur();
		
		return true;
	}
	
	/**
	 * Gets the utilisateur by id.
	 *
	 * @param string $id
	 * @return \PhpExtended\Gmth\GmthUtilisateurInterface
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getUtilisateurById($id)
	{
		if($id === null)
			return null;
		$this->ensureUtilisateursLoaded(array($id));
		if(!isset($this->_utilisateurs[$id]))
			return null;
		return new GmthBridgeUtilisateur($this, $this->_utilisateurs[$id]);
	}
	
	/**
	 * Gets all the utilisateurs.
	 *
	 * @return \Iterator[GmthUtilisateurInterface]
	 * @throws GmthApiException if the data cannot be loaded
	 */
	public function getUtilisateurs()
	{
		$this->ensureUtilisateursLoaded();
		return new GmthBridgeIterator(new \ArrayIterator($this->_utilisateurs),
			$this, '\PhpExtended\Gmth\GmthBridgeUtilisateur');
	}
	
	/**
	 * Gets all the utilisateurs filtered by civilite.
	 * 
	 * @param string $civiliteId
	 * @param \Iterator[GmthUtilisateurInterface] $utilisateurIterator
	 * @return \Iterator[GmthUtilisateurInterface]
	 */
	public function getUtilisateurByCiviliteId($civiliteId, \Iterator $utilisateurIterator = null)
	{
		if($utilisateurIterator === null)
			$utilisateurIterator = $this->getUtilisateurs();
		return new GmthFilterUtilisateurByCiviliteIterator($utilisateurIterator, $civiliteId);
	}
	
	/**
	 * Gets all the utilisateurs filtered by region.
	 * 
	 * @param string $regionId
	 * @param \Iterator[GmthUtilisateurInterface] $utilisateurIterator
	 * @return \Iterator[GmthUtilisateurInterface]
	 */
	public function getUtilisateursByRegionId($regionId, \Iterator $utilisateurIterator = null)
	{
		if($utilisateurIterator === null)
			$utilisateurIterator = $this->getUtilisateurs();
		return new GmthFilterUtilisateurByRegionIterator($utilisateurIterator, $regionId);
	}
	
}
