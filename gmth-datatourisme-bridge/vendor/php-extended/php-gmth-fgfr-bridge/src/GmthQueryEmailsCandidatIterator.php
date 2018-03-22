<?php

namespace PhpExtended\Gmth;

class GmthQueryEmailsCandidatIterator extends \IteratorIterator
{
	
	/**
	 * All the emails candidats for the queries.
	 * 
	 * @var string[]
	 */
	private $_emails_candidats = array();
	
	/**
	 * The current key.
	 * 
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryEmailsCandidatIterator with the given repository
	 * and query.
	 *
	 * @param \Traversable $iterator
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(\Traversable $iterator, GmthDataRepository $repository, GmthBridgeQuery $query)
	{
		parent::__construct($iterator);
		
		$this->_emails_candidats = $query->getEmailsCandidats()->getArrayCopy();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Iterator::current()
	 */
	public function current ()
	{
		/* @var $current \PhpExtended\Gmth\GmthApiDemandeRequest */
		$current= parent::current();
		if(isset($this->_emails_candidats[$this->_k]))
			$current->setCourrielCandidat($this->_emails_candidats[$this->_k]);
		return $current;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Iterator::next()
	 */
	public function next()
	{
		$this->_k++;
		if($this->_k > count($this->_emails_candidats))
		{
			$this->_k = 0;
			parent::next();
		}
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Iterator::key()
	 */
	public function key()
	{
		return parent::key() + $this->_k;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Iterator::valid()
	 */
	public function valid()
	{
		return parent::valid()
			&& (count($this->_emails_candidats) === 0 || $this->_k < count($this->_emails_candidats));
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Iterator::rewind()
	 */
	public function rewind()
	{
		$this->_k = 0;
		parent::rewind();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Countable::count()
	 */
	public function count()
	{
		return count($this->_emails_candidats);
	}
	
}
