<?php

namespace PhpExtended\Gmth;

class GmthFilterUniqueEtablissementIterator extends \FilterIterator
{
	
	/**
	 * The id of already processed etablissements.
	 *
	 * @var string[]
	 */
	private $_known_etablissements = array();
	
	/**
	 * {@inheritDoc}
	 * @see FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthEtablissementInterface */
		$current = self::current();
		$id = $current->getId();
		if(isset($this->_known_etablissements[$id]))
			return false;
		$this->_known_etablissements[$id] = 1;
		return true;
	}
	
}
