<?php

namespace PhpExtended\Inspect;

/**
 * StringInspectedType class file.
 *
 * This class represents the fact that a string was inspected.
 *
 * @author Anastaszor
 */
class StringInspectedType implements IInspectedType
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof StringInspectedType;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'string';
	}
	
}
