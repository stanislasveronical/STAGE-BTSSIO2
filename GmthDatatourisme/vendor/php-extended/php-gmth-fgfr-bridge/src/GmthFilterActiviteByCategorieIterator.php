<?php

namespace PhpExtended\Gmth;

class GmthFilterActiviteByCategorieIterator extends \FilterIterator
{
	
	/**
	 * The id of the categorie to search for.
	 * 
	 * @var string
	 */
	private $_categorie_id = null;
	
	/**
	 * Builds a new Gmth Filter Activite By Categorie Iterator with the given
	 * categorie id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $categorie_id
	 */
	public function __construct(\Traversable $iterator, $categorie_id)
	{
		parent::__construct($iterator);
		$this->_categorie_id = (string) $categorie_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthActiviteInterface */
		$current = $this->current();
		if($current->getCategorie() !== null)
		{
			if((string) $current->getCategorie()->getId() === $this->_categorie_id)
				return true;
		}
		return false;
	}
	
}
