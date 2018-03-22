<?php

namespace PhpExtended\Gmth;

class GmthBridgeAvisDecision implements GmthAvisDecisionInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The avis decision data object.
	 * 
	 * @var GmthDataAvisDecision
	 */
	private $_avis_decision = null;
	
	/**
	 * Builds a new GmthBridgeAvisDecision with the given repository and avis decision.
	 * 
	 * @param GmthDataRepository $repository
	 * @param GmthDataAvisDecision $avisDecision
	 */
	public function __construct(GmthDataRepository $repository, GmthDataAvisDecision $avisDecision)
	{
		$this->_repository = $repository;
		$this->_avis_decision = $avisDecision;
	}
	
	/**
	 * Gets the avis decision data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataAvisDecision
	 */
	public function getDataAvisDecision()
	{
		return $this->_avis_decision;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisDecisionInterface::getDecisions()
	 * @return GmthDecisionInterface[]
	 */
	public function getDecisions()
	{
		return $this->_repository->getDecisionsByAvisDecisionId($this->_avis_decision->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisDecisionInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_avis_decision->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthAvisDecisionInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_avis_decision->libelle;
	}
	
}
