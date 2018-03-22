<?php

namespace PhpExtended\Gmth;

/**
 * GmthRegionInterface interface file.
 * 
 * This interface represents a region object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthRegionInterface
{
	
	/**
	 * Gets the departements that are included in this region.
	 * 
	 * @return GmthDepartementInterface[]
	 */
	public function getDepartements();
	
	/**
	 * Gets the utilisateurs that are attached to this region.
	 * 
	 * @return GmthUtilisateurInterface[]
	 */
	public function getUtilisateurs();
	
	/**
	 * Gets the id of this region.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the nom of this region.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the nom of the contact for this region.
	 * 
	 * @return string
	 */
	public function getNomContact();
	
	/**
	 * Gets the prenom of the contact for this region.
	 * 
	 * @return string
	 */
	public function getPrenomContact();
	
	/**
	 * Gets the telephone of the contact for this region.
	 * 
	 * @return string
	 */
	public function getTelephoneContact();
	
	/**
	 * Gets the adresse of the contact for this region.
	 * 
	 * @return string
	 */
	public function getAdresseContact();
	
	/**
	 * Gets the email of the contact for this region.
	 * 
	 * @return string
	 */
	public function getEmailContact();
	
}
