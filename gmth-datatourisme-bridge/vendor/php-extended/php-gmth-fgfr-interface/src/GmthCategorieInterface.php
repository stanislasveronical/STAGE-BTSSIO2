<?php

namespace PhpExtended\Gmth;

/**
 * GmthCategorieInterface interface file.
 * 
 * This interface represents a categorie object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthCategorieInterface
{
	
	/**
	 * Gets the activites whithin this categorie.
	 * 
	 * @return GmthActiviteInterface[]
	 */
	public function getActivites();
	
	/**
	 * Gets the id of this categorie.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this categorie.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
