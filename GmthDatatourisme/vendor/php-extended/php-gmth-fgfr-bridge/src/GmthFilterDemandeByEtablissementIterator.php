<?php

namespace PhpExtended\Gmth;

class GmthFilterDemandeByEtablissementIterator extends \FilterIterator
{
	
	/**
	 * The id of the etablissement to search for.
	 * 
	 * @var string
	 */
	private $_etablissement_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Etablissement Iterator with the given
	 * etablissement id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $etablissement_id
	 */
	public function __construct(\Traversable $iterator, $etablissement_id)
	{
		parent::__construct($iterator);
		$this->_etablissement_id = (string) $etablissement_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = $this->current();
		if($current->getEtablissement() !== null)
		{
			if((string) $current->getEtablissement()->getId() === $this->_etablissement_id)
				return true;
		}
		return false;
	}
	
}
