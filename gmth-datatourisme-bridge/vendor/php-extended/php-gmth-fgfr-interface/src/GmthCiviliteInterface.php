<?php

namespace PhpExtended\Gmth;

/**
 * GmthCiviliteInterface interface file.
 * 
 * This interface represents a civilite object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthCiviliteInterface
{
	
	/**
	 * Gets the candidats with this civilite.
	 * 
	 * @return GmthCandidatInterface[]
	 */
	public function getCandidats();
	
	/**
	 * Gets the utilisateurs with this civilite.
	 * 
	 * @return GmthUtilisateurInterface[]
	 */
	public function getUtilisateurs();
	
	/**
	 * Gets the id of this civilite.
	 *
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this civilite.
	 *
	 * @return string
	 */
	public function getLibelle();
	
}
