<?php

namespace PhpExtended\Gmth;

/**
 * GmthQuestionInterface interface file.
 * 
 * This interface represents a specific question from any grille.
 * 
 * @author Anastaszor
 */
interface GmthQuestionInterface
{
	
	/**
	 * Gets the variable of the question.
	 * 
	 * @return string
	 */
	public function getVariable();
	
	/**
	 * Gets the libelle of the question.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
	/**
	 * Gets the help text of the question.
	 * 
	 * @return string
	 */
	public function getHelptext();
	
	/**
	 * Gets whether the NC checkbox has been checked.
	 * 
	 * @return boolean
	 */
	public function getValeurNc();
	
	/**
	 * Gets the choice value (true = yes, false = no).
	 * 
	 * @return boolean
	 */
	public function getValeurChoix();
	
	/**
	 * Gets the text value.
	 * 
	 * @return string
	 */
	public function getValeurText();
	
	/**
	 * Gets the comment value.
	 * 
	 * @return string
	 */
	public function getCommentaire();
	
	/**
	 * Gets the piece jointes that are linked to this question.
	 * 
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPieceJointes();
	
	/**
	 * Gets whether this question is pertinent for the picto auditif.
	 * 
	 * @return boolean
	 */
	public function isForPictoAuditif();
	
	/**
	 * Gets whether this question is pertinent for the picto mental.
	 * 
	 * @return boolean
	 */
	public function isForPictoMental();
	
	/**
	 * Gets whether this question is pertinent for the picto moteur.
	 * 
	 * @return boolean
	 */
	public function isForPictoMoteur();
	
	/**
	 * Gets whether this question is pertinent for the picto visuel.
	 * 
	 * @return boolean
	 */
	public function isForPictoVisuel();
	
}
