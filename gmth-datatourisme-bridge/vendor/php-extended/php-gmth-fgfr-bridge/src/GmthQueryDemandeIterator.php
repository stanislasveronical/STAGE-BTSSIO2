<?php

namespace PhpExtended\Gmth;

class GmthQueryDemandeIterator extends GmthQueryIterator
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQueryIterator::current()
	 */
	public function current()
	{
		/* @var $current \PhpExtended\Gmth\GmthApiDemandeResponse */
		$current = parent::current();
		if($current === null)
			return null;
		return $this->_repository->getDemandeById($current->getId());
	}
	
}
