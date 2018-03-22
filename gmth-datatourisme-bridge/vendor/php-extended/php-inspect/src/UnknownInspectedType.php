<?php

namespace PhpExtended\Inspect;

/**
 * UnknownInspectedType class file.
 *
 * This class represents the fact that an unknown variable was inspected.
 * If this class is used, something really strange happened.
 *
 * @author Anastaszor
 */
class UnknownInspectedType implements IInspectedType
{
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return $type instanceof UnknownInspectedType;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		return 'unknown';
	}
	
}
