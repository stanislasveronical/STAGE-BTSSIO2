<?php

namespace PhpExtended\Gmth;

class GmthFilterDepartementByRegionIterator extends \FilterIterator
{
	
	/**
	 * The id of the region to search for.
	 * 
	 * @var string
	 */
	private $_region_id = null;
	
	/**
	 * Builds a new Gmth Filter Departement By Region Iterator with the given
	 * region id.
	 * 
	 * @param \Traversable $iterator
	 * @param string $region_id
	 */
	public function __construct(\Traversable $iterator, $region_id)
	{
		parent::__construct($iterator);
		$this->_region_id = (string) $region_id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \FilterIterator::accept()
	 */
	public function accept()
	{
		/* @var $current \PhpExtended\Gmth\GmthDepartementInterface */
		$current = $this->current();
		if($current->getRegion() !== null)
		{
			if((string) $current->getRegion()->getId() === $this->_region_id)
				return true;
		}
		return false;
	}
	
}
