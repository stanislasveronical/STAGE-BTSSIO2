<?php

namespace PhpExtended\Inspect;

/**
 * BooleanInspectedType class file.
 *
 * This class represents the fact that a boolean was inspected.
 *
 * @author Anastaszor
 */
class BooleanInspectedType implements IInspectedType
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof BooleanInspectedType;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'boolean';
	}
	
}
