<?php

namespace PhpExtended\Gmth;

class GmthBridgeGrilleCandidature implements GmthGrilleCandidatureInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The grille candidature data object.
	 * 
	 * @var GmthDataGrille
	 */
	private $_grille_candidature = null;
	
	/**
	 * Builds a new GmthBridgeGrilleCandidature with the given data repository and grille.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataGrille $grille
	 */
	public function __construct(GmthDataRepository $repository, GmthDataGrille $grille)
	{
		$this->_repository = $repository;
		$this->_grille_candidature = $grille;
	}
	
	/**
	 * Gets the grille candidature data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataGrille
	 */
	public function getDataGrilleCandidature()
	{
		return $this->_grille_candidature;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getCandidatures()
	 * @return GmthCandidatureInterface[]
	 */
	public function getCandidatures()
	{
		return $this->_repository->getCandidaturesByGrilleCandidatureId($this->_grille_candidature->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_grille_candidature->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_grille_candidature->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getDateDebut()
	 * @return \DateTime
	 */
	public function getDateDebut()
	{
		return $this->_grille_candidature->date_debut;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getDateFin()
	 * @return \DateTime
	 */
	public function getDateFin()
	{
		return $this->_grille_candidature->date_fin;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getData()
	 * @return GmthGrilleDataInterface
	 */
	public function getData()
	{
		return new GmthBridgeGrilleData($this->_repository, $this->_grille_candidature->data);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleCandidatureInterface::getVersion()
	 * @return string
	 */
	public function getVersion()
	{
		return $this->_grille_candidature->version;
	}
	
}
