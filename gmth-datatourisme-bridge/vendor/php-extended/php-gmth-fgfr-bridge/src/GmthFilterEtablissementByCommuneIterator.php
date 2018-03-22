<?php

namespace PhpExtended\Gmth;

class GmthFilterEtablissementByCommuneIterator extends \FilterIterator
{
	
	/**
	 * The id of the commune to search for.
	 * 
	 * @var string
	 */
	private $_commune_id = null;
	
	/**
	 * Builds a new Gmth Filter Etablissement By Commune Iterator with the 
	 * given commune id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $commune_id
	 */
	public function __construct(\Traversable $iterator, $commune_id)
	{
		parent::__construct($iterator);
		$this->_commune_id = (string) $commune_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthEtablissementInterface */
		$current = $this->current();
		if($current->getCommune() !== null)
		{
			if((string) $current->getCommune()->getId() === $this->_commune_id)
				return true;
		}
		return false;
	}
	
}
