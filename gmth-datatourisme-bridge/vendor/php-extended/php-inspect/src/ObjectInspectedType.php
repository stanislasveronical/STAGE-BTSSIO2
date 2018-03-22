<?php

namespace PhpExtended\Inspect;

/**
 * ObjectInspectedType class file.
 *
 * This class represents the fact that an object was inspected.
 *
 * @author Anastaszor
 */
class ObjectInspectedType implements IInspectedType
{
	
	/**
	 * The class of the object that was inspected.
	 *
	 * @var string
	 */
	private $_classname = null;
	
	/**
	 * Builds a new ObjectInspectedType with the given object.
	 *
	 * @param object $object
	 */
	public function __construct($object)
	{
		$this->_classname = get_class($object);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof ObjectInspectedType && $this->_classname === $type->_classname;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'object('.$this->_classname.')';
	}
	
}
