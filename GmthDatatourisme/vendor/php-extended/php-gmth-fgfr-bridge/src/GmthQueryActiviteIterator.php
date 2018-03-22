<?php

namespace PhpExtended\Gmth;

class GmthQueryActiviteIterator extends \IteratorIterator
{
	
	/**
	 * The list of activites on which iterate.
	 * 
	 * @var array
	 */
	private $_activites = array();
	
	/**
	 * The actual key on the etats.
	 *
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryActiviteIterator with the given repository
	 * and query.
	 *
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		foreach($query->getActivites() as $activite)
			$this->addActivite($activite);
		
		if($this->_activites === array())	// everyone if empty
		{
			foreach($repository->getActivites() as $bridgeActivite)
				/* @var $bridgeActivite \PhpExtended\Gmth\GmthBridgeActivite */
				$this->addActivite($bridgeActivite->getDataActivite());
		}
		$this->_k = 0;
	}
	
	/**
	 * Adds a GmthApiActivite to the known activites for the query.
	 * 
	 * @param GmthDataActivite $dataActivite
	 */
	protected function addActivite(GmthDataActivite $dataActivite)
	{
		// use the ids to deduplicate
		$this->_activites[$dataActivite->id] = new GmthApiActivite(array(
			'id' => $dataActivite->id,
			'nom_activite' => $dataActivite->nom,
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
		if(isset($this->_activites[$this->_k]))
			$current->addActivite($this->_activites[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		$this->_k++;
		if($this->_k >= count($this->_activites))
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
		return parent::valid() && $this->_k < count($this->_activites);
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		// resets the numbers from the ids of activites to incremental numbers
		$this->_activites = array_values($this->_activites);
		parent::rewind();
	}
	
}
