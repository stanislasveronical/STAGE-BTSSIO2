<?php

namespace PhpExtended\Gmth;

class GmthFilterAvisByEvaluationIterator extends \FilterIterator
{
	
	/**
	 * The id of the evaluation to search for.
	 * 
	 * @var string
	 */
	private $_evaluation_id = null;
	
	/**
	 * Builds a new Gmth Filter Avis By Evaluation Iterator with the given
	 * evaluation id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $evaluation_id
	 */
	public function __construct(\Traversable $iterator, $evaluation_id)
	{
		parent::__construct($iterator);
		$this->_evaluation_id = (string) $evaluation_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthAvisInterface */
		$current = $this->current();
		if($current->getEvaluation() !== null)
		{
			if((string) $current->getEvaluation()->getId() === $this->_evaluation_id)
				return true;
		}
		return false;
	}
	
}
