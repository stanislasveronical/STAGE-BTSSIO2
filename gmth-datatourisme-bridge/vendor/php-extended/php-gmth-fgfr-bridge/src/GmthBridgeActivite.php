<?php

namespace PhpExtended\Gmth;

class GmthBridgeActivite implements GmthActiviteInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The activite data object.
	 * 
	 * @var GmthDataActivite
	 */
	private $_activite = null;
	
	/**
	 * Builds a new GmthBridgeActivite with the given data repository and activite.
	 * 
	 * @param GmthDataRepository $repository
	 * @param GmthDataActivite $activite
	 */
	public function __construct(GmthDataRepository $repository, GmthDataActivite $activite)
	{
		$this->_repository = $repository;
		$this->_activite = $activite;
	}
	
	/**
	 * Gets the activite data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataActivite
	 */
	public function getDataActivite()
	{
		return $this->_activite;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthActiviteInterface::getCategorie()
	 * @return GmthCategorieInterface
	 */
	public function getCategorie()
	{
		return $this->_repository->getCategorieById($this->_activite->categorie_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthActiviteInterface::getDemandes()
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes()
	{
		return $this->_repository->getDemandesByActiviteId($this->_activite->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthActiviteInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_activite->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthActiviteInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_activite->nom;
	}
	
}
