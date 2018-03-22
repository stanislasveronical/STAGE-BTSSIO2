<?php

namespace PhpExtended\Inspect;

/**
 * ResourceInspectedType class file.
 *
 * This class represents the fact that a resource was inspected.
 *
 * @author Anastaszor
 */
class ResourceInspectedType implements IInspectedType
{
	
	/**
	 * The type of resource that was inspected.
	 *
	 * @var string
	 */
	private $_rtype = null;
	
	/**
	 * Builds a new ResourceInspectedType with the given resource.
	 *
	 * @param resource $resource
	 */
	public function __construct($resource)
	{
		$this->_rtype = get_resource_type($resource);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof ResourceInspectedType && $this->_rtype === $type->_rtype;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'resource('.$this->_rtype.')';
	}
	
}
