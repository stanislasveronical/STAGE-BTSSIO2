<?php

namespace PhpExtended\Gmth;

/**
 * GmthObservationInterface interface file.
 * 
 * This interface represents an observation object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthObservationInterface
{
	
	/**
	 * Gets the demande related to this observation.
	 * 
	 * @return GmthDemandeInterface
	 */
	public function getDemande();
	
	/**
	 * Gets the utilisateur that made this observation.
	 * 
	 * @return GmthUtilisateurInterface
	 */
	public function getAuteur();
	
	/**
	 * Gets the id of this observation.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the date ecriture of this observation.
	 * 
	 * @return \DateTime
	 */
	public function getDateEcriture();
	
	/**
	 * Gets the text of this observation.
	 * 
	 * @return string
	 */
	public function getText();
	
}
