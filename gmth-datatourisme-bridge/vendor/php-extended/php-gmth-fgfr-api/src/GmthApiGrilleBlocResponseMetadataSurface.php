<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBlocResponseMetadataSurface extends JsonObject
{
	
	/**
	 * The criteria to check the value of this input.
	 * 
	 * @var string
	 */
	private $_criteria = null;
	
	/**
	 * The message in case the criteria fails.
	 * 
	 * @var string
	 */
	private $_msg = null;
	
	/**
	 * Whether this input is required.
	 * 
	 * @var boolean
	 */
	private $_is_required = null;
	
	/**
	 * A criteria if for the required value.
	 * 
	 * @var string
	 */
	private $_criteria_required = null;
	
	/**
	 * The message in case the required criteria fails.
	 * 
	 * @var string
	 */
	private $_msg_required = null;
	
	/**
	 * A criteria for the value to be present.
	 * 
	 * @var string
	 */
	private $_criteria_present = null;
	
	/**
	 * The message in case the present criteria fails.
	 * 
	 * @var string
	 */
	private $_msg_present = null;
	
	/**
	 * Whether the verification is required.
	 * 
	 * @var boolean
	 */
	private $_require_verified = null;
	
	/**
	 * Builds a new GmthApiGrilleBlocResponseMetadataSurface object
	 * with the given decoded json data and the given silent policy.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @throws JsonException if the object cannot be built and if not silent
	 */
	public function __construct(array $json, $silent)
	{
		foreach($json as $key => $value)
		{
			switch($key)
			{
				case 'criteria':
					$this->_criteria = $this->asString($value, $silent);
					break;
				case 'msg':
					$this->_msg = $this->asString($value, $silent);
					break;
				case 'isRequired':
					$this->_is_required = $this->asBoolean($value, $silent);
					break;
				case 'criteriaRequired':
					$this->_criteria_required = $this->asString($value, $silent);
					break;
				case 'msgRequired':
					$this->_msg_required = $this->asString($value, $silent);
					break;
				case 'criteriaPresent':
					$this->_criteria_present = $this->asString($value, $silent);
					break;
				case 'msgPresent':
					$this->_msg_present = $this->asString($value, $silent);
					break;
				case 'requireVerified':
					$this->_require_verified = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the criteria to check the value of this input.
	 * 
	 * @return string
	 */
	public function getCriteria()
	{
		return $this->_criteria;
	}
	
	/**
	 * Gets the message in case the criteria fails.
	 * 
	 * @return string
	 */
	public function getMessage()
	{
		return $this->_msg;
	}
	
	/**
	 * Gets whether this input is required.
	 * 
	 * @return boolean
	 */
	public function getIsRequired()
	{
		return $this->_is_required;
	}
	
	/**
	 * Gets the criteria if for the required value.
	 * 
	 * @return string
	 */
	public function getCriteriaRequired()
	{
		return $this->_criteria_required;
	}
	
	/**
	 * Gets the message in case the required criteria fails.
	 * 
	 * @return string
	 */
	public function getMessageRequired()
	{
		return $this->_msg_required;
	}
	
	/**
	 * Gets the criteria for the value to be present.
	 * 
	 * @return string
	 */
	public function getCriteriaPresent()
	{
		return $this->_criteria_present;
	}
	
	/**
	 * Gets the message in case the present criteria fails.
	 * 
	 * @return string
	 */
	public function getMessagePresent()
	{
		return $this->_msg_present;
	}
	
	/**
	 * Gets whether verify this response is required.
	 * 
	 * @return boolean
	 */
	public function getRequiredVerified()
	{
		return $this->_require_verified;
	}
	
}
