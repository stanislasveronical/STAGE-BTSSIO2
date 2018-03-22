<?php

namespace PhpExtended\Inspect;

/**
 * Inspector class file.
 *
 * This class makes statements about what is some variable. If you want to
 * inspect a variable, then do :
 *
 * ```php
 * 	// suppose $myUnknownVariable is instance of class Myclass
 * 	$inspector = new \PhpExtended\Inspect\Inspector($myUnknownVariable);
 *
 * 	echo $inspector; 	// will trigger __toString()
 * 						// and show something like "object(Myclass)"
 * ```
 *
 * @author Anastaszor
 */
class Inspector implements IInspectedType
{
	
	/**
	 * Builds a new inspector
	 *
	 * @param mixed $something
	 */
	public static function inspect($something)
	{
		return new Inspector($something);
	}
	
	/**
	 *
	 * @var mixed the variable to inspect.
	 */
	private $_variable = null;
	
	/**
	 * The type of the variable once it has been inspected.
	 *
	 * @var IInspectedType
	 */
	private $_type = null;
	
	/**
	 * Builds a new Inspector with the given variable.
	 *
	 * @param mixed $something
	 */
	protected function __construct($something)
	{
		$this->_variable = $something;
	}
	
	/**
	 * Effectively does the inspection.
	 *
	 */
	protected function doInspect()
	{
		if($this->_type !== null)
			return;
		
		$known = array();
		$this->_type = $this->doInspectRecursive($this->_variable, $known);
	}
	
	/**
	 * Effectively does the inspection of one-level recursivity. Recursivity
	 * is used only on arrays.
	 *
	 * @param mixed $variable
	 * @param array $known
	 * @return IInspectedType
	 */
	protected function doInspectRecursive($variable, array &$known)
	{
		switch(gettype($variable))
		{
			case "boolean":
				return new BooleanInspectedType();
				
			case "integer":
				return new IntegerInspectedType();
				
			case "double":
				return new FloatInspectedType();
				
			case "string":
				return new StringInspectedType();
				
			case "array":
				$known[] = $variable;
				$types = array();
				foreach($variable as $children)
				{
					$already_known = false;
					foreach($known as $known_object)
					{
						if($children === $known_object)
						{
							$already_known = true;
							break;
						}
					}
					if($already_known) continue;
					
					$type = $this->doInspectRecursive($children, $known);
					$already_found = false;
					foreach($types as $known_types)
					{
						if($type->equals($known_types))
						{
							$already_found = true;
							break;
						}
					}
					if($already_found) continue;
					
					$types[] = $type;
				}
				return new ArrayInspectedType($types);
				
			case "object":
				return new ObjectInspectedType($variable);
				
			case "resource":
				return new ResourceInspectedType($variable);
				
			case "NULL":
				return new NullInspectedType();
				
			default:
				return new UnknownInspectedType();
		}
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Inspect\IInspectedType::equals()
	 */
	public function equals(IInspectedType $type)
	{
		return false;
	}
	
	/**
	 * Public function a string description of the inspected variable.
	 *
	 * @return string
	 */
	public function __toString()
	{
		$this->doInspect();
		return $this->_type->__toString();
	}
	
}
