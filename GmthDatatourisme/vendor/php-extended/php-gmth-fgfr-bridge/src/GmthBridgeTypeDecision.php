<?php

namespace PhpExtended\Gmth;


class GmthBridgeTypeDecision implements GmthTypeDecisionInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The type decision data object.
	 * 
	 * @var GmthDataTypeDecision
	 */
	private $_type_decision = null;
	
	/**
	 * Builds a new GmthBridgeTypeDecision with the given data repository and type decision.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataTypeDecision $typeDecision
	 */
	public function __construct(GmthDataRepository $repository, GmthDataTypeDecision $typeDecision)
	{
		$this->_repository = $repository;
		$this->_type_decision = $typeDecision;
	}
	
	/**
	 * Gets the type decision data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataTypeDecision
	 */
	public function getDataTypeDecision()
	{
		return $this->_type_decision;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDecisionInterface::getAviss()
	 * @return GmthAvisInterface[]
	 */
	public function getAviss()
	{
		return $this->_repository->getAvissByTypeDecisionId($this->_type_decision->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDecisionInterface::getDecisions()
	 * @return GmthDecisionInterface[]
	 */
	public function getDecisions()
	{
		return $this->_repository->getDecisionsByTypeDecisionId($this->_type_decision->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDecisionInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_type_decision->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDecisionInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_type_decision->libelle;
	}
	
}
