<?php

namespace PhpExtended\Gmth;

/**
 * GmthAvisInterface interface file.
 * 
 * This interface represents an avis object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthAvisInterface
{
	
	/**
	 * Gets the evaluation for which this avis was emitted.
	 * 
	 * @return GmthEvaluationInterface
	 */
	public function getEvaluation();
	
	/**
	 * Gets the type decision this avis holds.
	 * 
	 * @return GmthTypeDecisionInterface
	 */
	public function getTypeDecision();
	
	/**
	 * Gets the id of this avis.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the avis of the commission (true = ok, false = ko).
	 * 
	 * @return boolean
	 */
	public function getAvisCommission();
	
	/**
	 * Gets whether the avis is ok for the picto auditif.
	 * 
	 * @return boolean
	 */
	public function getPictoAuditifObtenu();
	
	/**
	 * Gets whether the avis is ok for the picto mental.
	 * 
	 * @return boolean
	 */
	public function getPictoMentalObtenu();
	
	/**
	 * Gets whether the avis is ok for the picto moteur.
	 * 
	 * @return boolean
	 */
	public function getPictoMoteurObtenu();
	
	/**
	 * Gets whether the avis is ok for the picto visuel.
	 * 
	 * @return boolean
	 */
	public function getPictoVisuelObtenu();
	
}
