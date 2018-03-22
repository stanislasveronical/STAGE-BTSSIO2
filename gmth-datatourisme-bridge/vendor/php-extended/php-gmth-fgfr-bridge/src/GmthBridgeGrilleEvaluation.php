<?php

namespace PhpExtended\Gmth;

class GmthBridgeGrilleEvaluation implements GmthGrilleEvaluationInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The grille evaluation data object.
	 * 
	 * @var GmthDataGrille
	 */
	private $_grille_evaluation = null;
	
	/**
	 * Builds a new GmthBridgeGrilleEvaluation with the given data repository and grille.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataGrille $grille
	 */
	public function __construct(GmthDataRepository $repository, GmthDataGrille $grille)
	{
		$this->_repository = $repository;
		$this->_grille_evaluation = $grille;
	}
	
	/**
	 * Gets the grille evaluation data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataGrille
	 */
	public function getDataGrilleEvaluation()
	{
		return $this->_grille_evaluation;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getEvaluations()
	 * @return GmthEvaluationInterface[]
	 */
	public function getEvaluations()
	{
		return $this->_repository->getEvaluationsByGrilleEvaluationId($this->_grille_evaluation->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_grille_evaluation->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_grille_evaluation->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getDescription()
	 * @return string
	 */
	public function getDescription()
	{
		return $this->_grille_evaluation->description;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getDateDebut()
	 * @return \DateTime
	 */
	public function getDateDebut()
	{
		return $this->_grille_evaluation->date_debut;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getDateFin()
	 * @return \DateTime
	 */
	public function getDateFin()
	{
		return $this->_grille_evaluation->date_fin;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getData()
	 * @return GmthGrilleDataInterface
	 */
	public function getData()
	{
		return new GmthBridgeGrilleData($this->_repository, $this->_grille_evaluation->data);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleEvaluationInterface::getVersion()
	 * @return string
	 */
	public function getVersion()
	{
		return $this->_grille_evaluation->version;
	}
	
}
