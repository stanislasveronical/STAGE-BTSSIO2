<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiEvaluation extends JsonObject
{
	
	/**
	 * The id of the evaluation.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The name of the grid to evaluate.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * Whether this evaluation is complete or not.
	 * 
	 * @var boolean
	 */
	private $_complete = null;
	
	/**
	 * Gets the avis of the evaluation.
	 * 
	 * @var JsonCollection[GmthApiAvis]
	 */
	private $_aviss = null;
	
	/**
	 * Gets the grille evaluation.
	 * 
	 * @var GmthApiGrille
	 */
	private $_grille_evaluation = null;
	
	/**
	 * Gets the etag of the evaluation.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * The id of the demande for this evaluation.
	 * 
	 * @var string
	 */
	private $_demande_id = null;
	
	/**
	 * Builds a new GmthApiEvaluation with the given decoded json data.
	 * 
	 * @param mixed[] $json
	 * @param string $silent
	 * @throws JsonException
	 */
	public function __construct(array $json, $silent = false)
	{
		$json = parent::__construct($json, $silent);
		foreach($json as $key => $value)
		{
			switch($key)
			{
				case 'id':
					$this->_id = $this->asString($value, $silent);
					break;
				case 'nom':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'complete':
					$this->_complete = $this->asBoolean($value, $silent);
					break;
				case 'aviss':
					$this->_aviss = new JsonCollection('\PhpExtended\Gmth\GmthApiAvis', $this->asArray($value, $silent), $silent);
					break;
				case 'grille_evaluation':
					if($this->_grille_evaluation === null)
						$this->_grille_evaluation = new GmthApiGrille($this->asArray($value, $silent), $silent);
					break;
				case 'data':
					if($this->_grille_evaluation === null)
						$this->_grille_evaluation = new GmthApiGrille(array('data' => $this->asArray($value, $silent)), $silent);
					else
					{
						$this->_grille_evaluation = new GmthApiGrille(array(
							'id' => $this->_grille_evaluation->getId(),
							'data' => $this->asArray($value, $silent)
						), $silent);
					}
					break;
				case 'etag':
					$this->_etag = $this->asInteger($value, $silent);
					break;
				case 'demande':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						switch($key2)
						{
							case 'id':
								$this->_demande_id = $this->asString($value2, $silent);
								break;
							default:
								if(!$silent)
									throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
										array('{key}' => $key2, '{class}' => get_class($this))));
						}
					}
					break;
				case '_sync':
				case '_syncAction':
					// no action
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
		
		if($this->_aviss === null)
			$this->_aviss = new JsonCollection('\PhpExtended\Gmth\GmthApiAvis', array());
	}
	
	/**
	 * Gets the id of the evaluation.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the evaluation.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Whether this evaluation is completed.
	 * 
	 * @return boolean
	 */
	public function getComplete()
	{
		return $this->_complete;
	}
	
	/**
	 * Gets the list of avis.
	 * 
	 * @return JsonCollection[GmthApiAvis]
	 */
	public function getAviss()
	{
		return $this->_aviss;
	}
	
	/**
	 * Gets the grille evaluation from which this evaluation is made.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrille
	 */
	public function getGrilleEvaluation()
	{
		return $this->_grille_evaluation;
	}
	
	/**
	 * Gets the etag of the evaluation.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
	/**
	 * Gets the id of the related demande.
	 * 
	 * @return string
	 */
	public function getDemandeId()
	{
		return $this->_demande_id;
	}
	
}
