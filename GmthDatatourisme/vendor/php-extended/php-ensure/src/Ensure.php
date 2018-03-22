<?php

namespace PhpExtended\Ensure;

use PhpExtended\Inspect\Inspector;

/**
 * Ensure class file.
 *
 * This class is a helper to convert data from ay source to ensure they have
 * the right type at the end. Every method has a silent parameter that can
 * make silent conversions based on the knowledge of the structure of the value.
 * 
 * The default behavior is to throw exceptions when the expected type is not
 * matched, as the "throw early, catch late" pattern suggests.
 *
 * @author Anastaszor
 */
abstract class Ensure
{
	
	/**
	 * Try to converts given value as boolean. This returns true if the value
	 * is true. If silent, this returns true also if the value is a scalar
	 * which converts to true, or is an non-empty array, or is a non-empty
	 * countable object. This returns false in all the other cases except for
	 * null. If not silent, for all values which are not null or boolean, this
	 * method throws an exception.
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return boolean|null
	 * @throws \RuntimeException
	 */
	public static function isBoolean($value, $silent = false)
	{
		if($value === null)
			return null;
		if($value === true)
			return true;
		if($value === false)
			return false;
		if($silent && is_scalar($value))
			return (boolean) $value;
		if($silent && is_array($value))
			return count($value) > 0;
		if($silent && is_object($value) && $value instanceof \Countable)
			return count($value) > 0;
		if($silent)
			return false;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to boolean.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as boolean not null. This returns true if
	 * the value is true or convertible to true, and false else. If not silent,
	 * for all values which are not null or boolean, this method throws an 
	 * exception.
	 * 
	 * @param mixed $value
	 * @param boolean $silent
	 * @return boolean
	 * @throws \RuntimeException
	 */
	public static function isBooleanNotNull($value, $silent = false)
	{
		$newval = static::isBoolean($value, $silent);
		if($newval !== null)
			return $newval;
		if($silent)
			return false;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to boolean not null.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as integer. If silent, returns null if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to integer (i.e. is not scalar, or overflows).
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return integer|null
	 * @throws \RuntimeException
	 */
	public static function isInteger($value, $silent = false)
	{
		if($value === null)
			return null;
		if($value === true)
			return 1;
		if($value === false)
			return 0;
		if(is_scalar($value))
			return (int) $value;
		if(is_array($value))
		{
			if($silent && count($value) === 1)
			{
				$new = reset($value);
				return static::isInteger($new, $silent);
			}
		}
		if($silent)
			return null;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to integer.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as integer. If silent, returns zero if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to integer (i.e. is not scalar, or overflows).
	 * 
	 * @param mixed $value
	 * @param boolean $silent
	 * @return integer
	 * @throws \RuntimeException
	 */
	public static function isIntegerNotNull($value, $silent = false)
	{
		$newval = static::isInteger($value, $silent);
		if($newval !== null)
			return $newval;
		if($silent)
			return 0;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to integer not null.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as float. If silent, returns null if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to float (i.e. is not scalar, or overflows).
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return float|null
	 * @throws \RuntimeException
	 */
	public static function isFloat($value, $silent = false)
	{
		if($value === null)
			return null;
		if($value === true)
			return 1.0;
		if($value === false)
			return 0.0;
		if(is_scalar($value))
			return (float) $value;
		if(is_array($value))
		{
			if($silent && count($value) === 1)
			{
				$new = reset($value);
				return static::isFloat($new, $silent);
			}
		}
		if($silent)
			return null;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to float.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as float not null. If silent, returns 0.0 if
	 * the conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to float (i.e. is not scalar, or overflows).
	 * 
	 * @param mixed $value
	 * @param boolean $silent
	 * @return float
	 * @throws \RuntimeException
	 */
	public static function isFloatNotNull($value, $silent = false)
	{
		$newval = static::isFloat($value, $silent);
		if($newval !== null)
			return $newval;
		if($silent)
			return 0.0;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to float not null.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as string. If silent, returns null if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to string (i.e. is not a scalar).
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return string|null
	 * @throws \RuntimeException
	 */
	public static function isString($value, $silent = false)
	{
		if($value === null)
			return null;
		if($value === true)
			return "true";
		if($value === false)
			return "false";
		if(is_scalar($value))
			return "$value";
		if(is_array($value))
		{
			if($silent && count($value) === 1)
			{
				$new = reset($value);
				return static::isString($new, $silent);
			}
		}
		if(is_object($value) && method_exists($value, '__toString'))
			return $value->__toString();
		if($silent)
			return null;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to string.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	public static function isStringNotNull($value, $silent = false)
	{
		$newval = static::isString($value, $silent);
		if($newval !== null)
			return $newval;
		if($silent)
			return '';
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to string not null.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as array. If silent, returns an empty array
	 * if the conversion cannot be done. If not silent, throws an exception if
	 * the value cannot be converted to an array. A single scalar value will
	 * be included into an array as a single element-array.
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return mixed[]
	 * @throws \RuntimeException
	 */
	public static function isArray($value, $silent = false)
	{
		if($value === null)
			return array();
		if($value === true)
			return array(1);
		if($value === false)
			return array();
		if(is_scalar($value))
			return array($value);
		if(is_array($value))
			return $value;
		if(is_object($value) && $value instanceof \Traversable)
		{
			$values = array();
			foreach($value as $v)
				$values[] = $v;
			return $values;
		}
		if($silent)
			return array();
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to array.',
			array('{thing}' => Inspector::inspect($value))));
	}
	
	/**
	 * Try to converts given value as \Datetime with the given format. If
	 * silent, returns null if the conversion cannot be done. if not silent,
	 * throws an exception if the value cannot be parsed as datetime.
	 *
	 * @param mixed $value
	 * @param string $format
	 * @param boolean $silent
	 * @return \DateTime
	 * @throws \RuntimeException
	 * @see https://secure.php.net/manual/en/function.date.php
	 */
	public static function isDatetime($value, $format, $silent = false)
	{
		if($value === null)
			return null;
		$value = static::isString($value, $silent);
		if($silent && $value === null)
			return null;
		$dt = \DateTime::createFromFormat($format, $value);
		if($dt !== false)
			return $dt;
		if($silent)
			return null;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to \DateTime with given format "{format}".',
			array('{thing}' => Inspector::inspect($value), '{format}' => $format)));
	}
	
	/**
	 * Try to converts given value as \Datetime with given format. If silent 
	 * returns a new datetime object with the zero timestamp. If not silent,
	 * throws an exception if the value cannot be parsed as datetime.
	 * 
	 * @param mixed $value
	 * @param string $format
	 * @param boolean $silent
	 * @return \DateTime
	 * @throws \RuntimeException
	 * @see https://secure.php.net/manual/en/function.date.php
	 */
	public static function isDatetimeNotNull($value, $format, $silent = false)
	{
		$newval = static::isDatetime($value, $format, $silent);
		if($newval !== null)
			return $newval;
		if($silent)
			return new \DateTime('@0');
		throw new \RuntimeException(strtr('Impossible to transform value "{thing} to \DateTime not null with given format "{format}".',
			array('{thing}' => Inspector::inspect($value), '{format}' => $format)));
	}
	
	/**
	 * Try to converts given value as \Datetime with multiple format tries. If
	 * silent, returns null if all the format conversion failed to parse the
	 * value. If not silent, throws an exception if the value failed to be
	 * parsed by all the formats.
	 *
	 * @param mixed $value
	 * @param string[] $formats
	 * @param boolean $silent
	 * @return \DateTime
	 * @throws \RuntimeException
	 * @see https://secure.php.net/manual/en/function.date.php
	 */
	public static function isDatetime2($value, array $formats, $silent = false)
	{
		if($value === null)
			return null;
		foreach($formats as $format)
		{
			$test = static::isDatetime($value, $format, true);
			if($test !== null)
				return $test;
		}
		if($silent)
			return null;
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to \Datetime with given formats : "{list}".',
			array('{thing}' => Inspector::inspect($value), '{list}' => implode('", "', $formats))));
	}
	
	/**
	 * Try to converts given value as \Datetime with multiple format tries. If
	 * silent, returns a datetime object with zero timestamp. If not silent, 
	 * throws an exception if the value failed to be parsed by all the formats.
	 * 
	 * @param mixed $value
	 * @param string[] $formats
	 * @param boolean $silent
	 * @return \DateTime
	 * @throws \RuntimeException
	 * @see https://secure.php.net/manual/en/function.date.php
	 */
	public static function isDatetime2NotNull($value, array $formats, $silent = false)
	{
		$newval = static::isDatetime2($value, $formats, $silent);
		if($newval !== null)
			return $newval;
		if($silent)
			return new \DateTime('@0');
		throw new \RuntimeException(strtr('Impossible to transform value "{thing}" to \Datetime with given formats : "{list}".',
			array('{thing}' => Inspector::inspect($value), '{list}' => implode('", "', $formats))));
	}
	
}
