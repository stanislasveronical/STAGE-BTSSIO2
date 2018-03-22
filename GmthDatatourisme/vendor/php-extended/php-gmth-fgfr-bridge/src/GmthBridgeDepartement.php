<?php

namespace PhpExtended\Gmth;

class GmthBridgeDepartement implements GmthDepartementInterface
{
	
	/**
	 *
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 *
	 * @var GmthDataDepartement
	 */
	private $_departement = null;
	
	/**
	 * Builds a new GmthBridgeDepartement with the given data repository and departement.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataDepartement $departement
	 */
	public function __construct(GmthDataRepository $repository, GmthDataDepartement $departement)
	{
		$this->_repository = $repository;
		$this->_departement = $departement;
	}
	
	/**
	 * Gets the departement data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataDepartement
	 */
	public function getDataDepartement()
	{
		return $this->_departement;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDepartementInterface::getCommunes()
	 * @return GmthCommuneInterface[]
	 */
	public function getCommunes()
	{
		return $this->_repository->getCommunesByDepartementId($this->_departement->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDepartementInterface::getRegion()
	 * @return GmthRegionInterface
	 */
	public function getRegion()
	{
		return $this->_repository->getRegionById($this->_departement->region_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDepartementInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_departement->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthDepartementInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_departement->nom;
	}
	
}
