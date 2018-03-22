<?php

namespace PhpExtended\Gmth;

class GmthBridgeDemande implements GmthDemandeInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The demande data object.
	 * 
	 * @var GmthDataDemande
	 */
	private $_demande = null;
	
	/**
	 * Builds a new GmthBridgeDemande with the given data repository and demande.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataDemande $demande
	 */
	public function __construct(GmthDataRepository $repository, GmthDataDemande $demande)
	{
		$this->_repository = $repository;
		$this->_demande = $demande;
	}
	
	/**
	 * Gets the demande data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataDemande
	 */
	public function getDataDemande()
	{
		return $this->_demande;
	}
	
	/**
	 *
	 * @return GmthActiviteInterface[]
	 */
	public function getActivites()
	{
		$activites = array();
		foreach($this->_demande->activite_ids as $activite_id)
		{
			$activites[] = $this->_repository->getActiviteById($activite_id);
		}
		return $activites;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getCandidat()
	 * @return GmthCandidatInterface
	 */
	public function getCandidat()
	{
		return $this->_repository->getCandidatById($this->_demande->candidat_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getCandidature()
	 * @return GmthCandidatureInterface
	 */
	public function getCandidature()
	{
		return $this->_repository->getCandidatureById($this->_demande->candidature_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getDecisions()
	 * @return GmthDecisionInterface[]
	 */
	public function getDecisions()
	{
		return $this->_repository->getDecisionsByDemandeId($this->_demande->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getEtablissement()
	 * @return GmthEtablissementInterface
	 */
	public function getEtablissement()
	{
		return $this->_repository->getEtablissementById($this->_demande->etablissement_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getEtat()
	 * @return GmthEtatInterface
	 */
	public function getEtat()
	{
		return $this->_repository->getEtatById($this->_demande->etat_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getEvaluations()
	 * @return GmthEvaluationInterface[]
	 */
	public function getEvaluations()
	{
		return $this->_repository->getEvaluationsByDemandeId($this->_demande->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getLocker()
	 * @return GmthUtilisateurInterface
	 */
	public function getLocker()
	{
		return $this->_repository->getUtilisateurById($this->_demande->locker_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getObservations()
	 * @return GmthObservationInterface[]
	 */
	public function getObservations()
	{
		return $this->_repository->getObservationsByDemandeId($this->_demande->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getPiecesJointes()
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPiecesJointes()
	{
		return $this->_repository->getPiecesJointesByDemandeId($this->_demande->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getTypeDemande()
	 * @return GmthTypeDemandeInterface
	 */
	public function getTypeDemande()
	{
		return $this->_repository->getTypeDemandeById($this->_demande->type_demande_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getTypesPieceJointe()
	 * @return GmthTypePieceJointeInterface[]
	 */
	public function getTypesPieceJointe()
	{
		$typesPieceJointe = array();
		foreach($this->_demande->types_piece_jointe_ids as $type_piece_jointe_id)
		{
			$typesPieceJointe[] = $this->_repository->getTypePieceJointeById($type_piece_jointe_id);
		}
		return $typesPieceJointe;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_demande->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getNumeroMnt()
	 * @return string
	 */
	public function getNumeroMnt()
	{
		return $this->_demande->numero_mnt;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getDateVisite()
	 * @return \DateTime
	 */
	public function getDateVisite()
	{
		return $this->_demande->date_visite;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getAideDecision()
	 * @return string
	 */
	public function getAideDecision()
	{
		return $this->_demande->aide_decision;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getIsRetrait()
	 * @return boolean
	 */
	public function getIsRetrait()
	{
		return (boolean) $this->_demande->is_retrait;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getMotifAbandon()
	 * @return string
	 */
	public function getMotifAbandon()
	{
		return $this->_demande->motif_abandon;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDemandeInterface::getAmendement()
	 * @return string
	 */
	public function getAmendement()
	{
		return $this->_demande->amendement;
	}
	
}
