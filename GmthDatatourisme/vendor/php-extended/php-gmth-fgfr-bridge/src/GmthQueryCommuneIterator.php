<?php

namespace PhpExtended\Gmth;

class GmthQueryCommuneIterator extends \IteratorIterator
{
	
	/**
	 * The list of communes on which iterate.
	 * 
	 * @var GmthApiCommune[]
	 */
	private $_communes = array();
	
	/**
	 * The actual key on the communes.
	 * 
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryCommuneIterator with the given repository
	 * and query.
	 *
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		foreach($query->getCommunes() as $commune)
			$this->addCommune($commune);
		
		$this->_k = 0;
	}
	
	/**
	 * Adds a GmthApiCommune to the known communes for the query.
	 * 
	 * @param GmthDataCommune $dataCommune
	 */
	protected function addCommune(GmthDataCommune $dataCommune)
	{
		// use the ids to deduplicate
		$this->_communes[$dataCommune->id] = new GmthApiCommune(array(
			'id' => $dataCommune->id,
			'nom_commune' => $dataCommune->nom,
			'code_postal' => $dataCommune->code_postal,
			'code_i_n_s_e_e' => $dataCommune->code_insee,
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
		if(isset($this->_communes[$this->_k]))
			$current->setCommune($this->_communes[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		if(count($this->_communes) === 0)
			return parent::next();
		
		$this->_k++;
		if($this->_k >= count($this->_communes))
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
		return parent::valid() 
			&& (count($this->_communes) === 0 || $this->_k < count($this->_communes));
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		// resets the numbers from the ids of communes to incremental numbers
		$this->_communes = array_values($this->_communes);
		parent::rewind();
	}
	
}
