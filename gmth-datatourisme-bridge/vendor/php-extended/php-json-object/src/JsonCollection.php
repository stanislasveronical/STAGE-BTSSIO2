<?php

namespace PhpExtended\Json;

use PhpExtended\Inspect\Inspector;

/**
 * JsonCollection class file.
 *
 * This class is a helper to handle collections into the json object hierarchy.
 * The JsonCollection object uses internally another class which is instanciated
 * and whose build signature should be :
 * 
 * <pre>
 * public __construct(array $json, $silent = false);
 * </pre>
 *
 * @author Anastaszor
 */
class JsonCollection extends JsonObject implements \IteratorAggregate, \Countable
{
	
	/**
	 * The name of the class of objects inside this collection.
	 * 
	 * @var string
	 */
	protected $_inner_object_class = null;
	
	/**
	 * The objects inside this collection.
	 * 
	 * @var self::_inner_object_class[]
	 */
	protected $_objects = array();
	
	/**
	 * Builds a new JsonCollection object with the given class name of objects
	 * to create internally, the given decoded json data and the given silent
	 * policy.
	 * 
	 * @param string $inner_object_class the class of objects to create, should
	 * 		be loadable.
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @throws \RuntimeException if the inner class name is not loadable.
	 * @throws JsonException if the inner objects cannot be built.
	 */
	public function __construct($inner_object_class, array $json, $silent = false)
	{
		$this->_inner_object_class = $inner_object_class;
		if(!class_exists($this->_inner_object_class))
			throw new \RuntimeException(strtr('Impossible to find class "{name}" and it couldnot be loaded.',
				array('{name}' => $this->_inner_object_class)));
		
		$data = parent::__construct($json, $silent);
		foreach($data as $key => $value)
		{
			if(is_integer($key))
			{
				$classname = $this->_inner_object_class;
				$this->_objects[] = new $classname($this->asArray($value, $silent), $silent);
				unset($data[$key]);
			}
			elseif(!$silent)
				throw new JsonException(strtr('Forbidden key "{key}" in object "{class}" for value "{value}".',
					array('{key}' => $key, '{class}' => get_class($this), '{value}' => Inspector::inspect($value))));
		}
		return $data;
	}
	
	/**
	 * Gets the name of the class of the objects allowed in this collection.
	 * 
	 * @return string
	 */
	public function getInnerObjectClass()
	{
		return $this->_inner_object_class;
	}
	
	/**
	 * Gets the status code of the collection, if provided.
	 * 
	 * @return integer
	 */
	public function getStatus()
	{
		return $this->_status;
	}
	
	/**
	 * Gets the error message. Empty if no errors.
	 * 
	 * @return string
	 */
	public function getError()
	{
		return $this->_error;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \IteratorAggregate::getIterator()
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->_objects);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Countable::count()
	 */
	public function count()
	{
		return count($this->_objects);
	}
	
}
