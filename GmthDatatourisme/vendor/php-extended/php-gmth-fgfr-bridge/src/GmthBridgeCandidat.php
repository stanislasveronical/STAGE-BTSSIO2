<?php

namespace PhpExtended\Gmth;

class GmthBridgeCandidat implements GmthCandidatInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The candidat data object.
	 * 
	 * @var GmthDataCandidat
	 */
	private $_candidat = null;
	
	/**
	 * Builds a new GmthBridgeCandidat with the given data repository and candidat.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataCandidat $candidat
	 */
	public function __construct(GmthDataRepository $repository, GmthDataCandidat $candidat)
	{
		$this->_repository = $repository;
		$this->_candidat = $candidat;
	}
	
	/**
	 * Gets the candidat data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataCandidat
	 */
	public function getDataCandidat()
	{
		return $this->_candidat;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getCivilite()
	 * @return GmthCiviliteInterface
	 */
	public function getCivilite()
	{
		return $this->_repository->getCiviliteById($this->_candidat->civilite_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getDemandes()
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes()
	{
		return $this->_repository->getDemandesByCandidatId($this->_candidat->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_candidat->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getEmail()
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_candidat->email;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_candidat->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getPrenom()
	 * @return string
	 */
	public function getPrenom()
	{
		return $this->_candidat->prenom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCandidatInterface::getTelephone()
	 * @return string
	 */
	public function getTelephone()
	{
		return $this->_candidat->telephone;
	}
	
}
