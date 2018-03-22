<?php

namespace PhpExtended\Gmth;

class GmthFilterDemandeByCandidatIterator extends \FilterIterator
{
	
	/**
	 * The id of the candidat to search for.
	 * 
	 * @var string
	 */
	private $_candidat_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Candidat Iterator with the given
	 * candidat id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $candidat_id
	 */
	public function __construct(\Traversable $iterator, $candidat_id)
	{
		parent::__construct($iterator);
		$this->_candidat_id = (string) $candidat_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = $this->current();
		if($current->getCandidat() !== null)
		{
			if((string) $current->getCandidat()->getId() === $this->_candidat_id)
				return true;
		}
		return false;
	}
	
}
