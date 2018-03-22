<?php

namespace PhpExtended\Gmth;

/**
 * GmthEtatInterface interface file.
 * 
 * This interface represents an etat object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthEtatInterface
{
	
	/**
	 * Gets the demandes in this etat.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes();
	
	/**
	 * Gets the id of this etat.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this etat.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
