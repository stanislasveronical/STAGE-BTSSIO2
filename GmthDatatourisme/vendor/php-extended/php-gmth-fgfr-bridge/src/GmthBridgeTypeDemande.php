<?php

namespace PhpExtended\Gmth;

class GmthBridgeTypeDemande implements GmthTypeDemandeInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The type demande data object.
	 * 
	 * @var GmthDataTypeDemande
	 */
	private $_type_demande = null;
	
	/**
	 * Builds a new GmthBridgeTypeDemande with the given data repository and type demande.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataTypeDemande $typeDemande
	 */
	public function __construct(GmthDataRepository $repository, GmthDataTypeDemande $typeDemande)
	{
		$this->_repository = $repository;
		$this->_type_demande = $typeDemande;
	}
	
	/**
	 * Gets the type demande data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataTypeDemande
	 */
	public function getDataTypeDemande()
	{
		return $this->_type_demande;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDemandeInterface::getDemandes()
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes()
	{
		return $this->_repository->getDemandesByTypeDemandeId($this->_type_demande->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDemandeInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_type_demande->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeDemandeInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_type_demande->libelle;
	}
	
}
