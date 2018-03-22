<?php

namespace PhpExtended\Gmth;

/**
 * GmthDecisionInterface interface file.
 * 
 * This interface represents a decision object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthDecisionInterface
{
	
	/**
	 * Gets the demande related to this decision.
	 * 
	 * @return GmthDemandeInterface
	 */
	public function getDemande();
	
	/**
	 * Gets the avis decision related to this decision.
	 * 
	 * @return GmthAvisDecisionInterface
	 */
	public function getAvisDecision();
	
	/**
	 * Gets the type decision related to this decision.
	 * 
	 * @return GmthTypeDecisionInterface
	 */
	public function getTypeDecision();
	
	/**
	 * Gets the id of the decision.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the date of the commission that made the decision.
	 * 
	 * @return \DateTime
	 */
	public function getDateCommission();
	
	/**
	 * Gets whether this decision confirms the previous one, if any.
	 * 
	 * @return boolean
	 */
	public function getConfirmationDecisionPrecedente();
	
	/**
	 * Gets the motif of the decision.
	 * 
	 * @return string
	 */
	public function getMotifDecision();
	
	/**
	 * Gets the date when this decision was notified.
	 * 
	 * @return \DateTime
	 */
	public function getDateNotification();
	
	/**
	 * Gets whether this decision gives the picto auditif.
	 * 
	 * @return boolean
	 */
	public function getAuditifObtenu();
	
	/**
	 * Gets whether this decision gives the picto mental.
	 * 
	 * @return boolean
	 */
	public function getMentalObtenu();
	
	/**
	 * Gets whether this decision gives the picto moteur.
	 * 
	 * @return boolean
	 */
	public function getMoteurObtenu();
	
	/**
	 * Gets whether this decision gives the picto visuel.
	 * 
	 * @return boolean
	 */
	public function getVisuelObtenu();
	
	/**
	 * Gets the motif of refus for this decision.
	 * 
	 * @return string
	 */
	public function getMotifRefus();
	
}
