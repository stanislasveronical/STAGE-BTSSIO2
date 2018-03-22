<?php

namespace PhpExtended\Gmth;

class GmthQueryRegionIterator extends \IteratorIterator
{
	
	/**
	 * The list of regions on which iterate.
	 * 
	 * @var GmthApiRegion[]
	 */
	private $_regions = array();
	
	/**
	 * The actual key on the etats.
	 *
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryRegionIterator with the given repository
	 * and query.
	 *
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		foreach($query->getRegions() as $region)
			$this->addRegion($region);
		
		if($this->_regions === array())	// everyone if empty
		{
			foreach($repository->getRegions() as $bridgeRegion)
				/* @var $bridgeRegion \PhpExtended\Gmth\GmthBridgeRegion */
				$this->addRegion($bridgeRegion->getDataRegion());
		}
		$this->_k = 0;
	}
	
	/**
	 * Adds a GmthApiRegion to the known regions for the query.
	 * 
	 * @param GmthDataRegion $dataRegion
	 */
	protected function addRegion(GmthDataRegion $dataRegion)
	{
		// use the ids to deduplicate
		$this->_regions[$dataRegion->id] = new GmthApiRegion(array(
			'id' => $dataRegion->id,
			'nom_region' => $dataRegion->nom,
			'prenom_contact' => $dataRegion->prenom_contact,
			'nom_contact' => $dataRegion->nom_contact,
			'telephone' => $dataRegion->telephone_contact,
			'adresse' => $dataRegion->adresse_contact,
			'courriel' => $dataRegion->email_contact,
		));
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::current()
	 */
	public function current()
	{
		/* @var $current \PhpExtended\Gmth\GmthApiDemandeRequest */
		$current = clone parent::current();
		if(isset($this->_regions[$this->_k]))
			$current->setRegion($this->_regions[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		$this->_k++;
		if($this->_k >= count($this->_regions))
		{
			$this->_k = 0;
			parent::next();
		}
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::key()
	 */
	public function key()
	{
		return parent::key() + $this->_k;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::valid()
	 */
	public function valid()
	{
		return parent::valid() && $this->_k < count($this->_regions);
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		// resets the numbers from the ids of regions to incremental numbers
		$this->_regions = array_values($this->_regions);
		parent::rewind();
	}
	
}
