<?php

namespace PhpExtended\Gmth;

class GmthFilterEtablissementByTypeClassementIterator extends \FilterIterator
{
	
	/**
	 * The id of the type classement to search for.
	 * 
	 * @var string
	 */
	private $_type_classement_id = null;
	
	/**
	 * Builds a new Gmth Filter Etablissement By Type Classement Iterator with
	 * the given type classement id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $type_classement_id
	 */
	public function __construct(\Traversable $iterator, $type_classement_id)
	{
		parent::__construct($iterator);
		$this->_type_classement_id = (string) $type_classement_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthEtablissementInterface */
		$current = $this->current();
		if($current->getTypeClassement() !== null)
		{
			if((string) $current->getTypeClassement()->getId() === $this->_type_classement_id)
				return true;
		}
		return false;
	}
	
}
