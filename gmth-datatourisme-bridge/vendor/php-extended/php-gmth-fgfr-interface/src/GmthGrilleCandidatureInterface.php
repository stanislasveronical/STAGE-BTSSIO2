<?php

namespace PhpExtended\Gmth;

/**
 * GmthGrilleCandidatureInterface file.
 * 
 * This interface represents a grille candidature object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthGrilleCandidatureInterface
{
	
	/**
	 * Gets the candidatures made with this grille candidature.
	 * 
	 * @return GmthCandidatureInterface[]
	 */
	public function getCandidatures();
	
	/**
	 * Gets the id of the grille.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the nom of the grille.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the date debut of the grille.
	 * 
	 * @return \DateTime
	 */
	public function getDateDebut();
	
	/**
	 * Gets the date fin of the grille.
	 * 
	 * @return \DateTime
	 */
	public function getDateFin();
	
	/**
	 * Gets the data of the grille.
	 * 
	 * @return GmthGrilleDataInterface
	 */
	public function getData();
	
	/**
	 * Gets the version of the grille.
	 * 
	 * @return string
	 */
	public function getVersion();
	
}
