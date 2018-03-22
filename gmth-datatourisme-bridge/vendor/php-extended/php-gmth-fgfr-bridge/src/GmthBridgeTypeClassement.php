<?php

namespace PhpExtended\Gmth;

class GmthBridgeTypeClassement implements GmthTypeClassementInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The type classement data object.
	 * 
	 * @var GmthDataTypeClassement
	 */
	private $_type_classement = null;
	
	/**
	 * Builds a new GmthBridgeTypeClassement with the given data repository and type classement.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataTypeClassement $typeClassement
	 */
	public function __construct(GmthDataRepository $repository, GmthDataTypeClassement $typeClassement)
	{
		$this->_repository = $repository;
		$this->_type_classement = $typeClassement;
	}
	
	/**
	 * Gets the type classement data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataTypeClassement
	 */
	public function getDataTypeClassement()
	{
		return $this->_type_classement;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeClassementInterface::getEtablissements()
	 * @return GmthEtablissementInterface[]
	 */
	public function getEtablissements()
	{
		return $this->_repository->getEtablissementsByTypeClassementId($this->_type_classement->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeClassementInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_type_classement->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypeClassementInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_type_classement->libelle;
	}
	
}
