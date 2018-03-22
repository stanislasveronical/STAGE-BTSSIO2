<?php

namespace PhpExtended\Gmth;

class GmthFilterCandidatureByGrilleCandidatureIterator extends \FilterIterator
{
	
	/**
	 * The id of the grille candidature to search for.
	 * 
	 * @var string
	 */
	private $_grille_candidature_id = null;
	
	/**
	 * Builds a new Gmth Filter Candidature By Grille Candidature Iterator with
	 * the given grille candidature id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $grille_candidature_id
	 */
	public function __construct(\Traversable $iterator, $grille_candidature_id)
	{
		parent::__construct($iterator);
		$this->_grille_candidature_id = (string) $grille_candidature_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthCandidatureInterface */
		$current = $this->current();
		if($current->getGrilleCandidature() !== null)
		{
			if((string) $current->getGrilleCandidature()->getId() === $this->_grille_candidature_id)
				return true;
		}
		return false;
	}
	
}
