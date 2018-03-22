<?php

namespace PhpExtended\Json;

use PhpExtended\Inspect\Inspector;
use PhpExtended\Ensure\Ensure;

/**
 * JsonObject class file.
 *
 * This class is a helper to convert data from the raw json decoded values
 * in order to assert than the right values with the right formats are given
 * from the original json string.
 *
 * @author Anastaszor
 */
abstract class JsonObject
{
	
	/**
	 * An integer representing the status code of the flux (regardless of errors).
	 * 
	 * @var integer
	 */
	protected $_status = null;
	
	/**
	 * A string representing an error message. Empty if no errors.
	 * 
	 * @var string
	 */
	protected $_message = null;
	
	/**
	 * Builds a new json object with the given decoded json data. This call
	 * intercepts all values that look like status codes and error messages
	 * and removes them from the generic object array which is returned.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @return mixed[]
	 */
	public function __construct(array $json, $silent = false)
	{
		$data = array();
		foreach($json as $key => $value)
		{
			if($this->_status === null && in_array($key, array(
				'status',
				'code',
				'error_status',
				'error_code',
				'status_code',
			))) {
				try
				{
					$this->_status = $this->asInteger($value, $silent);
				}
				catch(JsonException $e)
				{
					// put back the value in the data
					$data[$key] = $value;
				}
			}
			elseif($this->_message === null && in_array($key, array(
				'error',
				'message',
				'error_message',
			))) {
				try
				{
					$this->_message = $this->asString($value, $silent);
				}
				catch(JsonException $e)
				{
					// put back the value in the data
					$data[$key] = $value;
				}
			}
			else
				$data[$key] = $value;
		}
		return $data;
	}
	
	/**
	 * Try to converts given value as boolean. This returns true if the value
	 * is true. If silent, this returns true also if the value is a scalar
	 * which converts to true, or is an non-empty array, or is a non-empty
	 * countable object. This returns false in all the other cases. If not
	 * silent, for all values which are not null or boolean, this method throws
	 * an exception.
	 *
	 * @param mixed $value
	 * @param string $silent
	 * @return boolean
	 * @throws JsonException
	 */
	protected function asBoolean($value, $silent = false)
	{
		try
		{
			return Ensure::isBoolean($value, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Failed to transform value "{thing}" to boolean.',
				array('{thing}' => Inspector::inspect($value))), null, $r);
		}
	}
	
	/**
	 * Try to converts given value as string. If silent, returns null if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to string (i.e. is not a scalar).
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return string|null
	 * @throws JsonException
	 */
	protected function asString($value, $silent = false)
	{
		try
		{
			return Ensure::isString($value, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Failed to transform value "{thing}" to string.',
				array('{thing}' => Inspector::inspect($value))), null, $r);
		}
	}
	
	/**
	 * Try to converts given value as integer. If silent, returns null if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to integer (i.e. is not scalar, or overflows).
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return integer|null
	 * @throws JsonException
	 */
	protected function asInteger($value, $silent = false)
	{
		try
		{
			return Ensure::isInteger($value, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Failed to transform value "{thing}" to integer.',
				array('{thing}' => Inspector::inspect($value))), null, $r);
		}
	}
	
	/**
	 * Try to converts given value as float. If silent, returns null if the
	 * conversion cannot be done. If not silent, throws an exception if the
	 * value cannot be converted to float (i.e. is not scalar, or overflows).
	 *
	 * @param mixed $value
	 * @param boolean $silent
	 * @return float|null
	 * @throws JsonException
	 */
	protected function asFloat($value, $silent = false)
	{
		try
		{
			return Ensure::isFloat($value, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Failed to transform value "{thing}" to float.',
				array('{thing}' => Inspector::inspect($value))), null, $r);
		}
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
	 * @throws JsonException
	 */
	protected function asArray($value, $silent = false)
	{
		try
		{
			return Ensure::isArray($value, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Failed to transform value "{thing}" to array.',
				array('{thing}' => Inspector::inspect($value))), null, $r);
		}
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
	 * @throws JsonException
	 * @see https://secure.php.net/manual/en/function.date.php
	 */
	protected function asDatetime($value, $format, $silent = false)
	{
		try
		{
			return Ensure::isDatetime($value, $format, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Failed to transform value "{thing}" to \DateTime with given format "{format}".',
				array('{thing}' => Inspector::inspect($value), '{format}' => $format)), null, $r);
		}
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
	 * @throws JsonException
	 * @see https://secure.php.net/manual/en/function.date.php
	 */
	protected function asDatetime2($value, array $formats, $silent = false)
	{
		try
		{
			return Ensure::isDatetime2($value, $formats, $silent);
		}
		catch(\RuntimeException $r)
		{
			throw new JsonException(strtr('Impossible to transform value "{thing}" to \Datetime with given formats : "{list}".',
				array('{thing}' => Inspector::inspect($value), '{list}' => implode('", "', $formats))), null, $r);
		}
	}
	
	/**
	 * Gets the status of this object.
	 * 
	 * @return integer
	 */
	public function getStatus()
	{
		return $this->_status;
	}
	
	/**
	 * Gets the error message for this object.
	 * 
	 * @return string
	 */
	public function getMessage()
	{
		return $this->_message;
	}
	
}
