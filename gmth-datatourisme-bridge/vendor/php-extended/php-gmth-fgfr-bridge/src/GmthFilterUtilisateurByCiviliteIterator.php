<?php

namespace PhpExtended\Gmth;

class GmthFilterUtilisateurByCiviliteIterator extends \FilterIterator
{
	
	/**
	 * The id of the civilite to search for.
	 *
	 * @var string
	 */
	private $_civilite_id = null;
	
	/**
	 * Builds a new Gmth Filter Utilisateur By Civilite Iterator with the given
	 * civilite id.
	 *
	 * @param \Traversable $iterator
	 * @param string $civilite_id
	 */
	public function __construct(\Traversable $iterator, $civilite_id)
	{
		parent::__construct($iterator);
		$this->_civilite_id = (string) $civilite_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthUtilisateurInterface */
		$current = $this->current();
		if($current->getCivilite() !== null)
		{
			if((string) $current->getCivilite()->getId() === $this->_civilite_id)
				return true;
		}
		return false;
	}
	
}
