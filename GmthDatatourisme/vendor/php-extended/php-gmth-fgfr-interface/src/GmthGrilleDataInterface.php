<?php

namespace PhpExtended\Gmth;

/**
 * GmthGrilleDataInterface interface file.
 * 
 * This interface represents objects that are the contents of any grille.
 * 
 * @author Anastaszor
 */
interface GmthGrilleDataInterface
{
	
	/**
	 * Gets the question of the grille with the given variable id.
	 * 
	 * @param string $variableId
	 * @return GmthQuestionInterface
	 */
	public function getQuestion($variableId);
	
	/**
	 * Gets all the questions of the grille.
	 * 
	 * @return \Iterator[GmthQuestionInterface]
	 */
	public function getQuestions();
	
}
