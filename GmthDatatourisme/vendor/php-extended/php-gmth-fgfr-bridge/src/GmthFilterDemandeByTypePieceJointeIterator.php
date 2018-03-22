<?php

namespace PhpExtended\Gmth;

class GmthFilterDemandeByTypePieceJointeIterator extends \FilterIterator
{
	
	/**
	 * The id of the type piece jointe to search for.
	 * 
	 * @var string
	 */
	private $_type_piece_jointe_id = null;
	
	/**
	 * Builds a new Gmth Filter Demande By Type Piece Jointe Iterator with the
	 * given type piece jointe id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $type_piece_jointe_id
	 */
	public function __construct(\Traversable $iterator, $type_piece_jointe_id)
	{
		parent::__construct($iterator);
		$this->_type_piece_jointe_id = (string) $type_piece_jointe_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDemandeInterface */
		$current = $this->current();
		foreach($current->getTypesPieceJointe() as $typePieceJointe)
		{
			if((string) $typePieceJointe->getId() === $this->_type_piece_jointe_id)
				return true;
		}
		return false;
	}
	
}
