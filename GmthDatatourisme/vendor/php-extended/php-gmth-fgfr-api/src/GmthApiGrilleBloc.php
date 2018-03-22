<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBloc extends JsonObject
{
	
	/**
	 * The label of the question bloc.
	 * 
	 * @var string
	 */
	private $_label = null;
	
	/**
	 * The variable name of the question bloc.
	 * 
	 * @var string
	 */
	private $_variable = null;
	
	/**
	 * The css class that represents the level of the question bloc.
	 * 
	 * @var string
	 */
	private $_class = null;
	
	/**
	 * The id of the group page the question bloc is in.
	 * 
	 * @var string
	 */
	private $_group = null;
	
	/**
	 * The help text to fill the question bloc.
	 * 
	 * @var string
	 */
	private $_help = null;
	
	/**
	 * The response parameters for this question bloc.
	 * 
	 * @var GmthApiGrilleBlocResponse
	 */
	private $_response = null;
	
	/**
	 * The criteria parameters for this question bloc.
	 * 
	 * @var GmthApiGrilleBlocCriteria
	 */
	private $_criteria = null;
	
	/**
	 * The display rules for this question bloc.
	 * 
	 * @var JsonCollection [GmthApiGrilleBlocDisplayRule]
	 */
	private $_display_rules = null;
	
	/**
	 * The display scope for this question bloc.
	 * 
	 * @var string
	 */
	private $_display_scope = null;
	
	/**
	 * The expected message when the question bloc is not filled in.
	 * 
	 * @var string
	 */
	private $_expected_msg = null;
	
	/**
	 * Builds a new GmthApiGrilleBloc object with the given decoded
	 * json data and the given silent policy.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
	 * @throws JsonException if the object cannot be built and if not silent
	 */
	public function __construct(array $json, $silent = false)
	{
		foreach($json as $key => $value)
		{
			switch($key)
			{
				case 'label':
					$this->_label = $this->asString($value, $silent);
					break;
				case 'name':
					$this->_variable = $this->asString($value, $silent);
					break;
				case 'class':
					$this->_class = $this->asString($value, $silent);
					break;
				case 'group':
					$this->_group = $this->asString($value, $silent);
					break;
				case 'help':
					$this->_help = $this->asString($value, $silent);
					break;
				case 'response':
					$this->_response = new GmthApiGrilleBlocResponse($this->asArray($value, $silent), $silent);
					break;
				case 'criteria':
					$this->_criteria = new GmthApiGrilleBlocCriteria($this->asArray($value, $silent), $silent);
					break;
				case 'displayRules':
					$this->_display_rules = new JsonCollection('\PhpExtended\Gmth\GmthApiGrilleBlocDisplayRule', $this->asArray($value, $silent), $silent);
					break;
				case 'displayScope':
					$this->_display_scope = $this->asString($value, $silent);
					break;
				case 'expectedMsg':
					$this->_expected_msg = $this->asString($value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
		
		if($this->_display_rules === null)
			$this->_display_rules = new JsonCollection('\PhpExtended\Gmth\GmthApiGrilleBlocDisplayRule', array());
	}
	
	/**
	 * Gets the label of the bloc.
	 * 
	 * @return string
	 */
	public function getLabel()
	{
		return $this->_label;
	}
	
	/**
	 * Gets the variable name of the bloc.
	 * 
	 * @return string
	 */
	public function getVariable()
	{
		return $this->_variable;
	}
	
	/**
	 * Gets the display class of this block.
	 * 
	 * @return string
	 */
	public function getClass()
	{
		return $this->_class;
	}
	
	/**
	 * Gets the group id for this block.
	 * 
	 * @return string
	 */
	public function getGroup()
	{
		return $this->_group;
	}
	
	/**
	 * Gets the help text of the block.
	 * 
	 * @return string
	 */
	public function getHelp()
	{
		return $this->_help;
	}
	
	/**
	 * Gets the response of the block.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponse
	 */
	public function getResponse()
	{
		return $this->_response;
	}
	
	/**
	 * Gets the criteria of the block.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocCriteria
	 */
	public function getCriteria()
	{
		return $this->_criteria;
	}
	
	/**
	 * Gets the rules of the block.
	 * 
	 * @return \PhpExtended\Json\JsonCollection[GmthApiGrilleBlocDisplayRule]
	 */
	public function getDisplayRules()
	{
		return $this->_display_rules;
	}
	
	/**
	 * Gets the scope of the block.
	 * 
	 * @return string
	 */
	public function getDisplayScope()
	{
		return $this->_display_scope;
	}
	
	/**
	 * Gets the expected message for the block.
	 * 
	 * @return string
	 */
	public function getExpectedMessage()
	{
		return $this->_expected_msg;
	}
	
}
