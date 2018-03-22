<?php

namespace PhpExtended\Gmth;

class GmthFilterUniqueDemandeIterator extends \FilterIterator
{
	
	/**
	 * The id of already processed demandes.
	 * 
	 * @var string[]
	 */
	private $_known_demandes = array();
	
	/**
	 * {@inheritDoc}
	 * @see FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = self::current();
		$id = $current->getId();
		if(isset($this->_known_demandes[$id]))
			return false;
		$this->_known_demandes[$id] = 1;
		return true;
	}
	
}
