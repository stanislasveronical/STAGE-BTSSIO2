<?php

namespace PhpExtended\Gmth;

class GmthBridgeCivilite implements GmthCiviliteInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The civilite data object.
	 * 
	 * @var GmthDataCivilite
	 */
	private $_civilite = null;
	
	/**
	 * Builds a new GmthBridgeCivilite with the given data repository and civilite.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataCivilite $civilite
	 */
	public function __construct(GmthDataRepository $repository, GmthDataCivilite $civilite)
	{
		$this->_repository = $repository;
		$this->_civilite = $civilite;
	}
	
	/**
	 * Gets the civilite data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataCivilite
	 */
	public function getDataCivilite()
	{
		return $this->_civilite;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCiviliteInterface::getCandidats()
	 * @return GmthCandidatInterface[]
	 */
	public function getCandidats()
	{
		return $this->_repository->getCandidatByCiviliteId($this->_civilite->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCiviliteInterface::getUtilisateurs()
	 * @return GmthUtilisateurInterface[]
	 */
	public function getUtilisateurs()
	{
		return $this->_repository->getUtilisateurByCiviliteId($this->_civilite->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCiviliteInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_civilite->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCiviliteInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_civilite->libelle;
	}
	
}
