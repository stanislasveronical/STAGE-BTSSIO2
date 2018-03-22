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
	 * Gets the question of the grille with the given label.
	 * 
	 * @param string $label
	 * @return GmthQuestionInterface
	 */
	public function getQuestionByLabel($label);
	
	/**
	 * Gets the question of the grille with the given name.
	 * 
	 * @param string $name
	 * @return GmthQuestionInterface
	 */
	public function getQuestionByName($name);
	
	/**
	 * Gets all the questions of the grille.
	 * 
	 * @return \Iterator[GmthQuestionInterface]
	 */
	public function getQuestions();
	
}
