<?php

namespace PhpExtended\Gmth;

/**
 * GmthCandidatureInterface interface file.
 * 
 * This interface represents a candidature object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthCandidatureInterface
{
	
	/**
	 * Gets the demande that is linked to this candidature.
	 * 
	 * @return GmthDemandeInterface
	 */
	public function getDemande();
	
	/**
	 * Gets the grille that was used as a template for this candidature.
	 * 
	 * @return GmthGrilleCandidatureInterface
	 */
	public function getGrilleCandidature();
	
	/**
	 * Gets the id of this candidature.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the data of this candidature.
	 * 
	 * @return GmthGrilleDataInterface
	 */
	public function getData();
	
}
