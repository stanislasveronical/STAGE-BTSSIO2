<?php

namespace PhpExtended\Gmth;

/**
 * GmthAvisDecisionInterface interface file.
 * 
 * This interface represents an avis decision object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthAvisDecisionInterface
{
	
	/**
	 * Gets the decisions in which this avis decision is used.
	 * 
	 * @return GmthDecisionInterface[]
	 */
	public function getDecisions();
	
	/**
	 * Gets the id of the avis decision.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of the avis decision.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
