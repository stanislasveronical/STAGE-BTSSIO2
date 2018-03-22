<?php

namespace PhpExtended\Gmth;

class GmthBridgeRegion implements GmthRegionInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The region data object.
	 * 
	 * @var GmthDataRegion
	 */
	private $_region = null;
	
	/**
	 * Builds a new GmthBridgeRegion with the given data repository and region.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataRegion $region
	 */
	public function __construct(GmthDataRepository $repository, GmthDataRegion $region)
	{
		$this->_repository = $repository;
		$this->_region = $region;
	}
	
	/**
	 * Gets the region data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataRegion
	 */
	public function getDataRegion()
	{
		return $this->_region;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getDepartements()
	 * @return GmthDepartementInterface[]
	 */
	public function getDepartements()
	{
		return $this->_repository->getDepartementsByRegionId($this->_region->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getUtilisateurs()
	 * @return GmthUtilisateurInterface[]
	 */
	public function getUtilisateurs()
	{
		return $this->_repository->getUtilisateursByRegionId($this->_region->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_region->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_region->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getNomContact()
	 * @return string
	 */
	public function getNomContact()
	{
		return $this->_region->nom_contact;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getPrenomContact()
	 * @return string
	 */
	public function getPrenomContact()
	{
		return $this->_region->prenom_contact;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getTelephoneContact()
	 * @return string
	 */
	public function getTelephoneContact()
	{
		return $this->_region->telephone_contact;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getAdresseContact()
	 * @return string
	 */
	public function getAdresseContact()
	{
		return $this->_region->adresse_contact;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthRegionInterface::getEmailContact()
	 * @return string
	 */
	public function getEmailContact()
	{
		return $this->_region->email_contact;
	}
	
}
