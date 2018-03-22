<?php

namespace PhpExtended\Inspect;

/**
 * NullInspectedType class file.
 *
 * This class represents the fact that a null pointer was inspected.
 *
 * @author Anastaszor
 */
class NullInspectedType implements IInspectedType
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof NullInspectedType;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'null';
	}
	
}
