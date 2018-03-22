<?php

namespace PhpExtended\Gmth;

class GmthQueryIterator extends \IteratorIterator
{
	
	/**
	 * 
	 * @var GmthDataRepository
	 */
	protected $_repository = null;
	
	/**
	 * 
	 * @var GmthApiPrivateEndpoint
	 */
	private $_api = null;
	
	/**
	 * 
	 * @var GmthApiDemandeResponse[]
	 */
	private $_result = array();
	
	/**
	 * 
	 * @var integer
	 */
	private $_k = 0;
	
	/**
	 * Builds a new GmthQueryIterator with the given repository and query.
	 * 
	 * @param GmthDataRepository $repository
	 * @param GmthBridgeQuery $query
	 */
	public function __construct(GmthDataRepository $repository, GmthApiPrivateEndpoint $api, GmthBridgeQuery $query)
	{
		// all of those iterators return a \PhpExtended\Gmth\GmthApiDemandeRequest
		$it0 = new \ArrayIterator(array(new GmthApiDemandeRequest()));
		$it1 = new GmthQueryEmailsCandidatIterator($it0, $repository, $query);
		$it2 = new GmthQueryEtatIterator($it1, $repository, $query);
		$it3 = new GmthQueryCommuneIterator($it2, $repository, $query);
		$it4 = new GmthQueryRegionIterator($it3, $repository, $query);
		
		// categories and activites are redundant filters
		// activites are more precise and then they will not trigger the 
		// request limit but they need more queries to be iterated over
		if($query->getCategoriesCount() > 0)
			$it5 = new GmthQueryCategorieIterator($it4, $repository, $query);
		else
			$it5 = new GmthQueryActiviteIterator($it4, $repository, $query);
		$it6 = new GmthQueryNumeroDemandeIterator($it5, $repository, $query);
		parent::__construct($it6);
		
		$this->_repository = $repository;
		$this->_api = $api;
		$this->_k = 0;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::current()
	 */
	public function current()
	{
		if(!isset($this->_result[$this->_k]))
			return null;
		
		return $this->_result[$this->_k];
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::next()
	 */
	public function next()
	{
		$this->_k++;
		if($this->_k >= count($this->_result))
		{
			$this->_result = array();
			$this->_k = 0;
			do
			{
				parent::next();
				if(parent::valid())
				{
					$request = parent::current();
					$responses = $this->_api->searchDemande($request);
					foreach($responses as $response)
						$this->_result[] = $response;
				}
			}
			while(count($this->_result) === 0 && parent::valid());
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
		return parent::valid() && $this->_k < count($this->_result);
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::rewind()
	 */
	public function rewind()
	{
		$this->_result = array();
		$this->_k = 0;
		parent::rewind();
		$first = true;
		do
		{
			if(!$first)
				parent::next();
			else 
				$first = false;
			if(parent::valid())
			{
				$request = parent::current();
				$responses = $this->_api->searchDemande($request);
				foreach($responses as $response)
					$this->_result[] = $response;
			}
		}
		while(count($this->_result) === 0 && parent::valid());
	}
	
}
