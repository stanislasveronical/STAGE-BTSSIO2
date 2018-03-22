<?php

namespace PhpExtended\Gmth;

class GmthFilterDemandeByActiviteIterator extends \FilterIterator
{
	
	/**
	 * The id of the activite to search for.
	 * 
	 * @var string
	 */
	private $_activite_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Activite Iterator with the given 
	 * activite id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $activite_id
	 */
	public function __construct(\Traversable $iterator, $activite_id)
	{
		parent::__construct($iterator);
		$this->_activite_id = (string) $activite_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = $this->current();
		foreach($current->getActivites() as $activite)
		{
			if((string) $activite->getId() === $this->_activite_id)
				return true;
		}
		return false;
	}
	
}
