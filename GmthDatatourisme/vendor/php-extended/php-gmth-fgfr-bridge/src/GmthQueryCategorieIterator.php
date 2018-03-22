<?php

namespace PhpExtended\Gmth;

class GmthQueryCategorieIterator extends \IteratorIterator
{
	
	/**
	 * The list of categories on which iterate.
	 * 
	 * @var GmthApiCategorie[]
	 */
	private $_categories = array();
	
	/**
	 * The actual key on the etats.
	 *
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryCategorieIterator with the given repository
	 * and query.
	 *
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		foreach($query->getCategories() as $categorie)
			$this->addCategorie($categorie);
		
		if($this->_categories === array())
		{
			foreach($repository->getCategories() as $bridgeCategorie)
				/* @var $bridgeCategorie \PhpExtended\Gmth\GmthBridgeCategorie */
				$this->addCategorie($bridgeCategorie->getDataCategorie());
		}
		$this->_k = 0;
	}
	
	/**
	 * Adds a GmthApiCategorie to the known regions for the query.
	 * 
	 * @param GmthDataCategorie $dataCategorie
	 */
	protected function addCategorie(GmthDataCategorie $dataCategorie)
	{
		// use the ids to deduplicate
		$this->_categories[$dataCategorie->id] = new GmthApiCategorie(array(
			'id' => $dataCategorie->id,
			'nom_categorie' => $dataCategorie->libelle,
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
		if(isset($this->_categories[$this->_k]))
			$current->addCategory($this->_categories[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		$this->_k++;
		if($this->_k >= count($this->_categories))
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
		return parent::valid() && $this->_k < count($this->_categories);
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		// resets the numbers from the ids of categories to incremental numbers
		$this->_categories = array_values($this->_categories);
		parent::rewind();
	}
	
}
