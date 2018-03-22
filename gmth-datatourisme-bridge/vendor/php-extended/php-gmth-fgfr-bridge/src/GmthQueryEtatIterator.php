<?php

namespace PhpExtended\Gmth;

class GmthQueryEtatIterator extends \IteratorIterator
{
	
	/**
	 * The list of etats on which iterate.
	 * 
	 * @var GmthApiEtat[]
	 */
	private $_etats = array();
	
	/**
	 * The actual key on the etats.
	 * 
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryEtatIterator with the given repository
	 * and query.
	 *
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		foreach($query->getEtats() as $etat)
			$this->addEtat($etat);
		
		if($this->_etats === array())	// everyone if empty
		{
			foreach($repository->getEtats() as $bridgeEtat)
				/* @var $bridgeEtat \PhpExtended\Gmth\GmthBridgeEtat */
				$this->addEtat($bridgeEtat->getDataEtat());
		}
		$this->_k = 0;
	}
	
	/**
	 * Adds a GmthApiEtat to the known etats for the query.
	 * 
	 * @param GmthDataEtat $dataEtat
	 */
	protected function addEtat(GmthDataEtat $dataEtat)
	{
		// use the ids to deduplicate
		$this->_etats[$dataEtat->id] = new GmthApiEtat(array(
			'id' => $dataEtat->id,
			'nom_etat' => $dataEtat->libelle,
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
		if(isset($this->_etats[$this->_k]))
			$current->addEtat($this->_etats[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		$this->_k++;
		if($this->_k >= count($this->_etats))
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
		return parent::valid() && $this->_k < count($this->_etats);
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		// resets the numbers from the ids of etats to incremental numbers
		$this->_etats = array_values($this->_etats);
		parent::rewind();
	}
	
}
