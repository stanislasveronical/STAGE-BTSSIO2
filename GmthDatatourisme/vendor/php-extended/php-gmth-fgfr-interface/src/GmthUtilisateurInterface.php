<?php

namespace PhpExtended\Gmth;

/**
 * GmthUtilisateurInterface interface file.
 * 
 * This interface represents an utilisateur obejct and its relations.
 * 
 * @author Anastaszor
 */
interface GmthUtilisateurInterface
{
	
	/**
	 * Gets the related civilite of this utilisateur.
	 * 
	 * @return GmthCiviliteInterface
	 */
	public function getCivilite();
	
	/**
	 * Gets the demandes that are locked by this utilisateur.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getLockedDemandes();
	
	/**
	 * Gets the region in which this utilisateur operates.
	 * 
	 * @return GmthRegionInterface
	 */
	public function getRegion();
	
	/**
	 * Gets the observations this utilisateur made.
	 * 
	 * @return GmthObservationInterface[]
	 */
	public function getObservations();
	
	/**
	 * Gets the id of this utilisateur.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the email of this utilisateur.
	 * 
	 * @return string
	 */
	public function getEmail();
	
	/**
	 * Gets the nom of this utilisateur.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the prenom of this utilisateur.
	 * 
	 * @return string
	 */
	public function getPrenom();
	
	/**
	 * Gets the name of the organisme this utilisateur is in.
	 * 
	 * @return string
	 */
	public function getOrganisme();
	
	/**
	 * Gets the telephone of this utilisateur.
	 * 
	 * @return string
	 */
	public function getTelephone();
	
	/**
	 * Gets the nom of the relais this utilisateur uses.
	 * 
	 * @return string
	 */
	public function getNomRelais();
	
	/**
	 * Gets the adresse of the relais this utilisateur uses.
	 * 
	 * @return string
	 */
	public function getAdresseRelais();
	
	/**
	 * Gets the telephone of the relais this utilisateur uses.
	 * 
	 * @return string
	 */
	public function getTelephoneRelais();
	
	/**
	 * Gets the email of the relais this utilisateur uses.
	 * 
	 * @return string
	 */
	public function getEmailRelais();
	
}
