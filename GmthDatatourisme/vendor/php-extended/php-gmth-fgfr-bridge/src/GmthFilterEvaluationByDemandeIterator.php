<?php

namespace PhpExtended\Gmth;

class GmthFilterEvaluationByDemandeIterator extends \FilterIterator
{
	
	/**
	 * The id of the demande to search for.
	 * 
	 * @var string
	 */
	private $_demande_id = null;
	
	/**
	 * Builds a new Gmth Filter Evaluation By Demande Iterator with the given
	 * demande id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $demande_id
	 */
	public function __construct(\Traversable $iterator, $demande_id)
	{
		parent::__construct($iterator);
		$this->_demande_id = $demande_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthEvaluationInterface */
		$current = $this->current();
		if($current->getDemande() !== null)
		{
			if((string) $current->getDemande()->getId() === $this->_demande_id)
				return true;
		}
		return false;
	}
	
}
