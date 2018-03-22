<?php

namespace PhpExtended\Gmth;

class GmthFilterCommuneByDepartementIterator extends \FilterIterator
{
	
	/**
	 * The id of the departement to search for.
	 * 
	 * @var string
	 */
	private $_departement_id = null;
	
	/**
	 * Builds a new Gmth Filter Commune By Departement Iterator with the given
	 * departement id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $departement_id
	 */
	public function __construct(\Traversable $iterator, $departement_id)
	{
		parent::__construct($iterator);
		$this->_departement_id = (string) $departement_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthCommuneInterface */
		$current = $this->current();
		if($current->getDepartement() !== null)
		{
			if((string) $current->getDepartement()->getId() === $this->_departement_id)
				return true;
		}
		return false;
	}
	
}
