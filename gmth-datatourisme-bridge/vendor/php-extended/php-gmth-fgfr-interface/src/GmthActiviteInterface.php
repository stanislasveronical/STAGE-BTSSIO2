<?php

namespace PhpExtended\Gmth;

/**
 * GmthActiviteInterface interface file.
 * 
 * This interface represents an activite object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthActiviteInterface
{
	
	/**
	 * Gets the categorie related to this activite.
	 * 
	 * @return GmthCategorieInterface
	 */
	public function getCategorie();
	
	/**
	 * Gets the demandes that have this activite.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes();
	
	/**
	 * Gets the id of this activite.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the nom of this activite.
	 * 
	 * @return string
	 */
	public function getNom();
	
}
