<?php

namespace PhpExtended\Gmth;

class GmthFilterDemandeByTypeDemandeIterator extends \FilterIterator
{
	
	/**
	 * The id of the type demande to search for.
	 * 
	 * @var string
	 */
	private $_type_demande_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Type Demande Iterator with the given
	 * type demande id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $type_demande_id
	 */
	public function __construct(\Traversable $iterator, $type_demande_id)
	{
		parent::__construct($iterator);
		$this->_type_demande_id = (string) $type_demande_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = $this->current();
		if($current->getTypeDemande() !== null)
		{
			if((string) $current->getTypeDemande()->getId() === $this->_type_demande_id)
				return true;
		}
		return false;
	}
	
}
