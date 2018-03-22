<?php

namespace PhpExtended\Gmth;

class GmthBridgeIterator extends \IteratorIterator
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The class of target bridge objects.
	 * 
	 * @var string
	 */
	private $_bridge_class_name = null;
	
	/**
	 * Builds a new GmthBridgeIterator with the given inner data iterator and
	 * the target class to bridge to.
	 * 
	 * @param \Traversable $innerIterator
	 * @param GmthDataRepository $repository
	 * @param string $gmthBridgeClassname
	 * @throws \RuntimeException if the class does not exists.
	 */
	public function __construct(\Traversable $innerIterator, GmthDataRepository $repository, $gmthBridgeClassname)
	{
		parent::__construct($innerIterator);
		if(!class_exists($gmthBridgeClassname))
			throw new \RuntimeException(strtr('Failed to find class name "{class}".',
				array('{class}' => $gmthBridgeClassname)));
		
		$rclass = new \ReflectionClass($gmthBridgeClassname);
		$constructor = $rclass->getConstructor();
		if($constructor === null)
			throw new \RuntimeException(strtr('Failed to bridge to class "{class}", it should have a constructor with 2 arguments, no constructor found.',
				array('{class}' => $gmthBridgeClassname)));
		$parameters = $constructor->getParameters();
		if(count($parameters) !== 2)
			throw new \RuntimeException(strtr('Failed to bridge to class "{class}", its constructor should have 2 arguments, and {k} found.',
				array('{class}' => $gmthBridgeClassname, '{k}' => count($parameters))));
		
		/* @var $p1 \ReflectionParameter */
		$p1 = $parameters[0];
		if($p1->getClass() === null)
			throw new \RuntimeException(strtr('Failed to bridge to class "{class}", the first argument of its constructor is not declared and should type hint to "{decl}".',
				array('{class}' => $gmthBridgeClassname, '{decl}' => GmthDataRepository::class)));
		if($p1->getClass()->getName() !== GmthDataRepository::class)
			throw new \RuntimeException(strtr('Failed to bridge to class "{class}", the first argument of its constructor should type hint to "{decl}", not "{found}".',
				array('{class}' => $gmthBridgeClassname, '{decl}' => GmthDataRepository::class, '{found}' => $p1->getClass()->getName())));
		
		$this->_repository = $repository;
		$this->_bridge_class_name = $gmthBridgeClassname;
	}
	
	/**
	 * {@inheritDoc}
	 * @see IteratorIterator::current()
	 * @return object of class $gmthBridgeClassname
	 */
	public function current()
	{
		$className = $this->_bridge_class_name;
		return new $className($this->_repository, parent::current());
	}
	
}
