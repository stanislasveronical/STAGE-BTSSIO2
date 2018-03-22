<?php

namespace PhpExtended\Gmth;

class GmthBridgeCategorie implements GmthCategorieInterface
{
	
	/**
	 * The repository for all data.
	 *
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The categorie data object.
	 *
	 * @var GmthDataCategorie
	 */
	private $_categorie = null;
	
	/**
	 * Builds a new GmthBridgeCategorie with the given data repository and categorie.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataCategorie $categorie
	 */
	public function __construct(GmthDataRepository $repository, GmthDataCategorie $categorie)
	{
		$this->_repository = $repository;
		$this->_categorie = $categorie;
	}
	
	/**
	 * Gets the categorie data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataCategorie
	 */
	public function getDataCategorie()
	{
		return $this->_categorie;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCategorieInterface::getActivites()
	 * @return GmthActiviteInterface[]
	 */
	public function getActivites()
	{
		return $this->_repository->getActiviteByCategorieId($this->_categorie->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCategorieInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_categorie->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthCategorieInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_categorie->libelle;
	}
	
}
