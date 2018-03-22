<?php

namespace PhpExtended\Gmth;

class GmthFilterDecisionByTypeDecisionIterator extends \FilterIterator
{
	
	/**
	 * The id of the type decision to search for.
	 * 
	 * @var string
	 */
	private $_type_decision_id = null;
	
	/**
	 * Builds a new Gmth Filter Decision By Type Decision Iterator with the
	 * given type decision id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $type_decision_id
	 */
	public function __construct(\Traversable $iterator, $type_decision_id)
	{
		parent::__construct($iterator);
		$this->_type_decision_id = (string) $type_decision_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDecisionInterface */
		$current = $this->current();
		if($current->getTypeDecision() !== null)
		{
			if((string) $current->getTypeDecision()->getId() === $this->_type_decision_id)
				return true;
		}
		return false;
	}
	
}
