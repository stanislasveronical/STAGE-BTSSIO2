<?php

namespace PhpExtended\Inspect;

/**
 * IntegerInspectedType class file.
 *
 * This class represents the fact that an integer was inspected.
 *
 * @author Anastaszor
 */
class IntegerInspectedType implements IInspectedType
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof IntegerInspectedType;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'integer';
	}
	
}
