<?php

namespace PhpExtended\Gmth;

class GmthBridgeCommune implements GmthCommuneInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The commune data object.
	 * 
	 * @var GmthDataCommune
	 */
	private $_commune = null;
	
	/**
	 * Builds a new GmthBridgeCommune with the given data repository and commune.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataCommune $commune
	 */
	public function __construct(GmthDataRepository $repository, GmthDataCommune $commune)
	{
		$this->_repository = $repository;
		$this->_commune = $commune;
	}
	
	/**
	 * Gets the commune data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataCommune
	 */
	public function getDataCommune()
	{
		return $this->_commune;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCommuneInterface::getDepartement()
	 * @return GmthDepartementInterface
	 */
	public function getDepartement()
	{
		return $this->_repository->getDepartementById($this->_commune->departement_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCommuneInterface::getEtablissements()
	 * @return GmthEtablissementInterface[]
	 */
	public function getEtablissements()
	{
		return $this->_repository->getEtablissementsByCommuneId($this->_commune->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCommuneInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_commune->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCommuneInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_commune->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCommuneInterface::getCodeInsee()
	 * @return string
	 */
	public function getCodeInsee()
	{
		return $this->_commune->code_insee;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCommuneInterface::getCodePostal()
	 * @return string
	 */
	public function getCodePostal()
	{
		return $this->_commune->code_postal;
	}
	
}
