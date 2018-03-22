<?php

namespace PhpExtended\Gmth;

/**
 * GmthCandidatInterface interface file.
 * 
 * This interface represents a candidat object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthCandidatInterface
{
	
	/**
	 * Gets the civilite of this candidat.
	 * 
	 * @return GmthCiviliteInterface
	 */
	public function getCivilite();
	
	/**
	 * Gets the demande made by this candidat.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes();
	
	/**
	 * Gets the id of this candidat.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the email of this candidat.
	 * 
	 * @return string
	 */
	public function getEmail();
	
	/**
	 * Gets the nom of this candidat.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the prenom of this candidat.
	 * 
	 * @return string
	 */
	public function getPrenom();
	
	/**
	 * Gets the telephone of this candidat.
	 * 
	 * @return string
	 */
	public function getTelephone();
	
}
