<?php

namespace PhpExtended\Gmth;

/**
 * GmthEvaluationInterface interface file.
 * 
 * This interface represents an evaluation object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthEvaluationInterface
{
	
	/**
	 * Gets the demande related to this evaluation.
	 * 
	 * @return GmthDemandeInterface
	 */
	public function getDemande();
	
	/**
	 * Gets the avis that are made from this evaluation.
	 * 
	 * @return GmthAvisInterface[]
	 */
	public function getAviss();
	
	/**
	 * Gets the id of this evaluation.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the nom of this evaluation.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets whether this evaluation is complete.
	 * 
	 * @return boolean
	 */
	public function getComplete();
	
	/**
	 * Gets the grid that serves as template for this evaluation.
	 * 
	 * @return GmthGrilleEvaluationInterface
	 */
	public function getGrille();
	
	/**
	 * Gets the grid that is filled for this evaluation.
	 * 
	 * @return GmthGrilleDataInterface
	 */
	public function getData();
	
}
