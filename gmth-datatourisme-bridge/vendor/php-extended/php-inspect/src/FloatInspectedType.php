<?php

namespace PhpExtended\Inspect;

/**
 * FloatInspectedType class file.
 *
 * This class represents the fact that a float/double was inspected.
 *
 * @author Anastaszor
 */
class FloatInspectedType implements IInspectedType
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof FloatInspectedType;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'float';
	}
	
}
