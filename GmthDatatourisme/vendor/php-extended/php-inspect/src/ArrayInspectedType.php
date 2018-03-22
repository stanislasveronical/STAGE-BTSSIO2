<?php

namespace PhpExtended\Inspect;

/**
 * ArrayInspectedType class file.
 *
 * This class represents the fact that an array was inspected.
 *
 * @author Anastaszor
 */
class ArrayInspectedType implements IInspectedType
{
	
	/**
	 * All the inner types of this array.
	 *
	 * @var IInspectedType[]
	 */
	private $_inner_types = array();
	
	/**
	 * Builds a new ArrayInspectedType with the given inner types.
	 *
	 * @param IInspectedType[] $innertypes
	 */
	public function __construct(array $innertypes)
	{
		$this->_inner_types = $innertypes;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		if(!($type instanceof ArrayInspectedType))
			return false;
		
		if(count($this->_inner_types) !== count($type->_inner_types))
			return false;
		
		foreach($this->_inner_types as $own_inner_type)
		{
			$this_is_known = false;
			foreach($type->_inner_types as $other_inner_type)
			{
				if($own_inner_type->equals($other_inner_type))
				{
					$this_is_known = true;
					break;
				}
			}
			if(!$this_is_known)
				return false;
		}
		
		return true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::__toString()
	 */
	public function __toString()
	{
		$res = array();
		foreach($this->_inner_types as $innertype)
			$res[] = $innertype->__toString();
		return 'array('.implode(',', $res).')';
	}
	
}
