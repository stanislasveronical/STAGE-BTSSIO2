<?php

namespace PhpExtended\Gmth;

class GmthQueryNumeroDemandeIterator extends \IteratorIterator
{
	
	/**
	 * 
	 * @var string[]
	 */
	private $_numeros_demandes = array();
	
	/**
	 * The actual key on the etats.
	 *
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryNumeroDemandeIterator with the given repository
	 * and query.
	 * 
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		foreach($query->getNumerosDemande() as $numeroDemande)
			$this->_numeros_demandes[] = $numeroDemande;
		
		$this->_k = 0;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::current()
	 */
	public function current()
	{
		/* @var $current \PhpExtended\Gmth\GmthApiDemandeRequest */
		$current = clone parent::current();
		if(isset($this->_numeros_demandes[$this->_k]))
			$current->setNumeroDemande($this->_numeros_demandes[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		if(count($this->_numeros_demandes) === 0)
			return parent::next();
		
		$this->_k++;
		if($this->_k >= count($this->_numeros_demandes))
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
			&& (count($this->_numeros_demandes) === 0 || $this->_k < count($this->_numeros_demandes));
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		parent::rewind();
	}
	
}
