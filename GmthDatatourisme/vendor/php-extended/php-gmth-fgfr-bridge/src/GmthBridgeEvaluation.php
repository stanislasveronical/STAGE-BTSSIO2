<?php

namespace PhpExtended\Gmth;

class GmthBridgeEvaluation implements GmthEvaluationInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The evaluation data object.
	 * 
	 * @var GmthDataEvaluation
	 */
	private $_evaluation = null;
	
	/**
	 * Builds a new GmthBridgeEvaluation with the given data repository and evaluation.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataEvaluation $evaluation
	 */
	public function __construct(GmthDataRepository $repository, GmthDataEvaluation $evaluation)
	{
		$this->_repository = $repository;
		$this->_evaluation = $evaluation;
	}
	
	/**
	 * Gets the evaluation data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataEvaluation
	 */
	public function getDataEvaluation()
	{
		return $this->_evaluation;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getDemande()
	 * @return GmthDemandeInterface
	 */
	public function getDemande()
	{
		return $this->_repository->getDemandeById($this->_evaluation->demande_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getAviss()
	 * @return GmthAvisInterface[]
	 */
	public function getAviss()
	{
		return $this->_repository->getAvissByEvaluationId($this->_evaluation->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_evaluation->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_evaluation->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getComplete()
	 * @return boolean
	 */
	public function getComplete()
	{
		return (boolean) $this->_evaluation->complete;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getGrille()
	 * @return GmthGrilleEvaluationInterface
	 */
	public function getGrille()
	{
		return $this->_repository->getGrilleEvaluationById($this->_evaluation->grille_evaluation_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEvaluationInterface::getData()
	 * @return GmthGrilleDataInterface
	 */
	public function getData()
	{
		return new GmthBridgeGrilleData($this->_repository, $this->_evaluation->data);
	}
	
}
