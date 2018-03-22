<?php

namespace PhpExtended\Gmth;

class GmthBridgeAvis implements GmthAvisInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The avis data object.
	 * 
	 * @var GmthDataAvis
	 */
	private $_avis = null;
	
	/**
	 * Builds a new GmthBridgeAvis with the given data repository and avis.
	 * 
	 * @param GmthDataRepository $repository
	 * @param GmthDataAvis $avis
	 */
	public function __construct(GmthDataRepository $repository, GmthDataAvis $avis)
	{
		$this->_repository = $repository;
		$this->_avis = $avis;
	}
	
	/**
	 * Gets the avis data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataAvis
	 */
	public function getDataAvis()
	{
		return $this->_avis;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getEvaluation()
	 * @return GmthEvaluationInterface
	 */
	public function getEvaluation()
	{
		return $this->_repository->getEvaluationById($this->_avis->evaluation_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getTypeDecision()
	 * @return GmthTypeDecisionInterface
	 */
	public function getTypeDecision()
	{
		return $this->_repository->getTypeDecisionById($this->_avis->type_decision_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_avis->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getAvisCommission()
	 * @return boolean
	 */
	public function getAvisCommission()
	{
		return (boolean) $this->_avis->avis_commission;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getPictoAuditifObtenu()
	 * @return boolean
	 */
	public function getPictoAuditifObtenu()
	{
		return (boolean) $this->_avis->auditif_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getPictoMentalObtenu()
	 * @return boolean
	 */
	public function getPictoMentalObtenu()
	{
		return (boolean) $this->_avis->mental_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getPictoMoteurObtenu()
	 * @return boolean
	 */
	public function getPictoMoteurObtenu()
	{
		return (boolean) $this->_avis->moteur_obtenu;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisInterface::getPictoVisuelObtenu()
	 * @return boolean
	 */
	public function getPictoVisuelObtenu()
	{
		return (boolean) $this->_avis->visuel_obtenu;
	}
	
}
