<?php

namespace PhpExtended\Gmth;

class GmthBridgeCandidature implements GmthCandidatureInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The candidature data object.
	 * 
	 * @var GmthDataCandidature
	 */
	private $_candidature = null;
	
	/**
	 * Builds a new GmthBridgeCandidature with the given data repository and candidature.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataCandidature $candidature
	 */
	public function __construct(GmthDataRepository $repository, GmthDataCandidature $candidature)
	{
		$this->_repository = $repository;
		$this->_candidature = $candidature;
	}
	
	/**
	 * Gets the candidature data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataCandidature
	 */
	public function getDataCandidature()
	{
		return $this->_candidature;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatureInterface::getDemande()
	 * @return GmthDemandeInterface
	 */
	public function getDemande()
	{
		return $this->_repository->getDecisionById($this->_candidature->demande_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatureInterface::getGrilleCandidature()
	 * @return GmthGrilleCandidatureInterface
	 */
	public function getGrilleCandidature()
	{
		return $this->_repository->getGrilleCandidatureById($this->_candidature->grille_candidature_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatureInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_candidature->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatureInterface::getData()
	 * @return GmthGrilleDataInterface
	 */
	public function getData()
	{
		return new GmthBridgeGrilleData($this->_repository, $this->_candidature->data);
	}
	
}
