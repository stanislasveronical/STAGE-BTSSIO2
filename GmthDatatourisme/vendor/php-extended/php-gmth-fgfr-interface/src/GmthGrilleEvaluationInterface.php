<?php

namespace PhpExtended\Gmth;

/**
 * GmthGrilleEvaluationInterface interface file.
 * 
 * This interface represents a grille evaluation object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthGrilleEvaluationInterface
{
	
	/**
	 * Gets the evaluations made with this grille.
	 * 
	 * @return GmthEvaluationInterface[]
	 */
	public function getEvaluations();
	
	/**
	 * Gets the id of this grille.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the nom of this grille.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the description of this grille.
	 * 
	 * @return string
	 */
	public function getDescription();
	
	/**
	 * Gets the date debut of this grille.
	 * 
	 * @return \DateTime
	 */
	public function getDateDebut();
	
	/**
	 * Gets the date fin of this grille.
	 * 
	 * @return \DateTime
	 */
	public function getDateFin();
	
	/**
	 * Gets the data of this grille.
	 * 
	 * @return GmthGrilleDataInterface
	 */
	public function getData();
	
	/**
	 * Gets the version of this grille.
	 * 
	 * @return string
	 */
	public function getVersion();
	
}
