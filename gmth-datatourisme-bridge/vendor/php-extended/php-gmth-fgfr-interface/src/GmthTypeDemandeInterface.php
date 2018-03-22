<?php

namespace PhpExtended\Gmth;

/**
 * GmthTypeDemandeInterface interface file.
 * 
 * This interface represents a type demande object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthTypeDemandeInterface
{
	
	/**
	 * Gets the demandes this type demande is linked to.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes();
	
	/**
	 * Gets the id of this type demande.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this type demande.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
