<?php

namespace PhpExtended\Gmth;

/**
 * GmthTypeDecisionInterface interface file.
 * 
 * This interface represents a type decision object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthTypeDecisionInterface
{
	
	/**
	 * Gets the avis related to this type decision.
	 * 
	 * @return GmthAvisInterface[]
	 */
	public function getAviss();
	
	/**
	 * Gets the decisions related to this type decision.
	 * 
	 * @return GmthDecisionInterface[]
	 */
	public function getDecisions();
	
	/**
	 * Gets the id of this type decision.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this type decision.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
