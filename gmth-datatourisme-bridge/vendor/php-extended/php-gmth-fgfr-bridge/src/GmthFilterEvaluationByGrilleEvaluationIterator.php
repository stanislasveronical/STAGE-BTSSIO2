<?php

namespace PhpExtended\Gmth;

class GmthFilterEvaluationByGrilleEvaluationIterator extends \FilterIterator
{
	
	/**
	 * The id of the grille evaluation to search for.
	 * 
	 * @var string
	 */
	private $_grille_evaluation_id = null;
	
	/**
	 * Builds a new Gmth Filter Evaluation By Grille Evaluation Iterator with
	 * the given grille evaluation id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $grille_evaluation_id
	 */
	public function __construct(\Traversable $iterator, $grille_evaluation_id)
	{
		parent::__construct($iterator);
		$this->_grille_evaluation_id = (string) $grille_evaluation_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthEvaluationInterface */
		$current = $this->current();
		if($current->getGrille() !== null)
		{
			if((string) $current->getGrille()->getId() === $this->_grille_evaluation_id)
				return true;
		}
		return false;
	}
	
}
