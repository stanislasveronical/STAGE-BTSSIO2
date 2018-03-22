<?php

namespace PhpExtended\Gmth;

/**
 * GmthDemandeInterface interface file.
 * 
 * This interface represents a demande object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthDemandeInterface
{
	
	/**
	 * Gets the activites this demande is on.
	 * 
	 * @return GmthActiviteInterface[]
	 */
	public function getActivites();
	
	/**
	 * Gets the candidat that made the demande.
	 * 
	 * @return GmthCandidatInterface
	 */
	public function getCandidat();
	
	/**
	 * Gets the candidature that the candidat filled up.
	 * 
	 * @return GmthCandidatureInterface
	 */
	public function getCandidature();
	
	/**
	 * Gets the decisions that were made for this demande.
	 * 
	 * @return GmthDecisionInterface[]
	 */
	public function getDecisions();
	
	/**
	 * Gets the etablissement this demande is on.
	 * 
	 * @return GmthEtablissementInterface
	 */
	public function getEtablissement();
	
	/**
	 * Gets the etat this demande is in.
	 * 
	 * @return GmthEtatInterface
	 */
	public function getEtat();
	
	/**
	 * Gets the evaluations that were made for this demande.
	 * 
	 * @return GmthEvaluationInterface[]
	 */
	public function getEvaluations();
	
	/**
	 * Gets the utilisateur that has currently locked this demande, if any.
	 * 
	 * @return GmthUtilisateurInterface
	 */
	public function getLocker();
	
	/**
	 * Gets the observations made on this demande.
	 * 
	 * @return GmthObservationInterface[]
	 */
	public function getObservations();
	
	/**
	 * Gets the piece jointes attached to this demande.
	 * 
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPiecesJointes();
	
	/**
	 * Gets the type of demande.
	 *
	 * @return GmthTypeDemandeInterface
	 */
	public function getTypeDemande();
	
	/**
	 * Gets the expected types of piece jointes.
	 * 
	 * @return GmthTypePieceJointeInterface[]
	 */
	public function getTypesPieceJointe();
	
	/**
	 * Gets the id of the demande.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the numero MNT of the demande.
	 * 
	 * @return string
	 */
	public function getNumeroMnt();
	
	/**
	 * Gets the date of the visite.
	 * 
	 * @return \DateTime
	 */
	public function getDateVisite();
	
	/**
	 * Gets the help text for the decision.
	 * 
	 * @return string
	 */
	public function getAideDecision();
	
	/**
	 * Gets whether this demande is a retrait.
	 * 
	 * @return boolean
	 */
	public function getIsRetrait();
	
	/**
	 * Gets the motif of abandon, if any.
	 * 
	 * @return string
	 */
	public function getMotifAbandon();
	
	/**
	 * Gets the amendement text of the demande, if any.
	 * 
	 * @return string
	 */
	public function getAmendement();
	
}
