<?php

namespace PhpExtended\Gmth;

class GmthFilterPieceJointeByTypePieceJointeIterator extends \FilterIterator
{
	
	/**
	 * The id of the type piece jointe to search for.
	 * 
	 * @var string
	 */
	private $_type_piece_jointe_id = null;
	
	/**
	 * Builds a new Gmth Filter Piece Jointe By Type Piece Jointe Iterator with
	 * the given type piece jointe id.
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
		/* @var $current \PhpExtended\Gmth\GmthPieceJointeInterface */
		$current = $this->current();
		if($current->getTypePieceJointe() !== null)
		{
			if((string) $current->getTypePieceJointe()->getId() === $this->_type_piece_jointe_id)
				return true;
		}
		return false;
	}
	
}
