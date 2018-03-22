<?php

namespace PhpExtended\Gmth;

class GmthBridgeUtilisateur implements GmthUtilisateurInterface
{
	
	/**
	 *
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 *
	 * @var GmthDataUtilisateur
	 */
	private $_utilisateur = null;
	
	/**
	 * Builds a new GmthBridgeUtilisateur with the given data repository and utilisateur.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataUtilisateur $utilisateur
	 */
	public function __construct(GmthDataRepository $repository, GmthDataUtilisateur $utilisateur)
	{
		$this->_repository = $repository;
		$this->_utilisateur = $utilisateur;
	}
	
	/**
	 * Gets the utilisateur data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataUtilisateur
	 */
	public function getDataUtilisateur()
	{
		return $this->_utilisateur;
	}
	
}
