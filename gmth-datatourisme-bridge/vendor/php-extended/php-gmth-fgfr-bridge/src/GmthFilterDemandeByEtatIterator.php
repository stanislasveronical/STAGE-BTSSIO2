<?php

namespace PhpExtended\Gmth;

class GmthFilterDemandeByEtatIterator extends \FilterIterator
{
	
	/**
	 * The id of the etat to search for.
	 * 
	 * @var string
	 */
	private $_etat_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Etat Iterator with the given etat id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $etat_id
	 */
	public function __construct(\Traversable $iterator, $etat_id)
	{
		parent::__construct($iterator);
		$this->_etat_id = (string) $etat_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = $this->current();
		if($current->getEtat() !== null)
		{
			if((string) $current->getEtat() === $this->_etat_id)
				return true;
		}
		return false;
	}
	
}
