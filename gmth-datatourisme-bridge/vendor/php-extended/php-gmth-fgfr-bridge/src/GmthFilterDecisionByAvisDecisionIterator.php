<?php

namespace PhpExtended\Gmth;

class GmthFilterDecisionByAvisDecisionIterator extends \FilterIterator
{
	
	/**
	 * The id of the avis decision to search for.
	 *
	 * @var string
	 */
	private $_avis_decision_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Avis Decision Iterator with the given
	 * avis decision id.
	 *
	 * @param \Traversable $iterator
	 * @param string $avis_decision_id
	 */
	public function __construct(\Traversable $iterator, $avis_decision_id)
	{
		parent::__construct($iterator);
		$this->_avis_decision_id = (string) $avis_decision_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDecisionInterface */
		$current = $this->current();
		if($current->getAvisDecision() !== null)
		{
			if((string) $current->getAvisDecision()->getId() === $this->_avis_decision_id)
				return true;
		}
		return false;
	}
	
}
