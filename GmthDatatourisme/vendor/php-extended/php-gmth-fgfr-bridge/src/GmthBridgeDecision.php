<?php

namespace PhpExtended\Gmth;

class GmthBridgeDecision implements GmthDecisionInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The decision data object.
	 * 
	 * @var GmthDataDecision
	 */
	private $_decision = null;
	
	/**
	 * Builds a new GmthBridgeDecision with the given data repository and decision.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataDecision $decision
	 */
	public function __construct(GmthDataRepository $repository, GmthDataDecision $decision)
	{
		$this->_repository = $repository;
		$this->_decision = $decision;
	}
	
	/**
	 * Gets the decision data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataDecision
	 */
	public function getDataDecision()
	{
		return $this->_decision;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getDemande()
	 * @return GmthDemandeInterface
	 */
	public function getDemande()
	{
		return $this->_repository->getDemandeById($this->_decision->demande_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getAvisDecision()
	 * @return GmthAvisDecisionInterface
	 */
	public function getAvisDecision()
	{
		return $this->_repository->getAvisDecisionById($this->_decision->avis_decision_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getTypeDecision()
	 * @return GmthTypeDecisionInterface
	 */
	public function getTypeDecision()
	{
		return $this->_repository->getTypeDecisionById($this->_decision->type_decision_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_decision->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getDateCommission()
	 * @return \DateTime
	 */
	public function getDateCommission()
	{
		return $this->_decision->date_commission;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getConfirmationDecisionPrecedente()
	 * @return boolean
	 */
	public function getConfirmationDecisionPrecedente()
	{
		return (boolean) $this->_decision->confirmation;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getMotifDecision()
	 * @return string
	 */
	public function getMotifDecision()
	{
		return $this->_decision->motif;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getDateNotification()
	 * @return \DateTime
	 */
	public function getDateNotification()
	{
		return $this->_decision->date_notification;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getAuditifObtenu()
	 * @return boolean
	 */
	public function getAuditifObtenu()
	{
		return (boolean) $this->_decision->auditif_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getMentalObtenu()
	 * @return boolean
	 */
	public function getMentalObtenu()
	{
		return (boolean) $this->_decision->mental_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getMoteurObtenu()
	 * @return boolean
	 */
	public function getMoteurObtenu()
	{
		return (boolean) $this->_decision->moteur_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getVisuelObtenu()
	 * @return boolean
	 */
	public function getVisuelObtenu()
	{
		return (boolean) $this->_decision->visuel_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDecisionInterface::getMotifRefus()
	 * @return string
	 */
	public function getMotifRefus()
	{
		return $this->_decision->motif_refus;
	}
	
}
