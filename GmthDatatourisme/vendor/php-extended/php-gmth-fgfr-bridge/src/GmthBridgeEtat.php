<?php

namespace PhpExtended\Gmth;

class GmthBridgeEtat implements GmthEtatInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The etat data object.
	 * 
	 * @var GmthDataEtat
	 */
	private $_etat = null;
	
	/**
	 * Builds a new GmthBridgeEtat with the given data repository and etat.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataEtat $etat
	 */
	public function __construct(GmthDataRepository $repository, GmthDataEtat $etat)
	{
		$this->_repository = $repository;
		$this->_etat = $etat;
	}
	
	/**
	 * Gets the etat data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataEtat
	 */
	public function getDataEtat()
	{
		return $this->_etat;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtatInterface::getDemandes()
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes()
	{
		return $this->_repository->getDemandesByEtatId($this->_etat->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtatInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_etat->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtatInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_etat->libelle;
	}
	
}
