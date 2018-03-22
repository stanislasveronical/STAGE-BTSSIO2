<?php

namespace PhpExtended\Inspect;

/**
 * IInspectedType interface file.
 *
 * An inspected type is the result of an ongoing investigation on a specific
 * variable.
 *
 * @author Anastaszor
 */
interface IInspectedType
{
	
	/**
	 * Gets whether the two inspected types are equals.
	 *
	 * @param IInspectedType $type
	 * @return boolean
	 */
	public function equals(IInspectedType $type);
	
	/**
	 * Gets a string representation of this type.
	 *
	 * @return string
	 */
	public function __toString();
	
}
