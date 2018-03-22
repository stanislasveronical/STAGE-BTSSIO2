<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiGrilleBlocResponse extends JsonObject
{
	
	/**
	 * The metadata for the input "choix".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_choix = null;
	
	/**
	 * The metadata for the input "valeur".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_valeur = null;
	
	/**
	 * The metadata for the input "auditif".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_auditif = null;
	
	/**
	 * The metadata for the input "mental".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_mental = null;
	
	/**
	 * The metadata for the input "moteur".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_moteur = null;
	
	/**
	 * The metadata for the input "visuel".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_visuel = null;
	
	/**
	 * The metadata for the input "comment".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_comment = null;
	
	/**
	 * The metadata for the input "nc".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_nc = null;
	
	/**
	 * The metadata for the input "upload".
	 * 
	 * @var GmthApiGrilleBlocResponseMetadata
	 */
	private $_upload = null;
	
	/**
	 * Builds a new GmthApiGrilleBlocResponse object with the given
	 * decoded json data and the given silent policy.
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
				case 'choix':
					$this->_choix = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'valeur':
					$this->_valeur = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'auditif':
					$this->_auditif = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'mental':
					$this->_mental = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'moteur':
					$this->_moteur = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'visuel':
					$this->_visuel = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'comment':
					$this->_comment = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'nc':
					$this->_nc = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				case 'upload':
					$this->_upload = new GmthApiGrilleBlocResponseMetadata($this->asArray($value, $silent), $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
	}
	
	/**
	 * Gets the metadata about the choice picto column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getChoix()
	{
		return $this->_choix;
	}
	
	/**
	 * Gets the metadata about the value picto column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getValeur()
	{
		return $this->_valeur;
	}
	
	/**
	 * Gets the metadata about the auditif picto column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getAuditif()
	{
		return $this->_auditif;
	}
	
	/**
	 * Gets the metadata about the mental picto column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getMental()
	{
		return $this->_mental;
	}
	
	/**
	 * Gets the metadata about the moteur picto column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getMoteur()
	{
		return $this->_moteur;
	}
	
	/**
	 * Gets the metadata about the visuel picto column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getVisuel()
	{
		return $this->_visuel;
	}
	
	/**
	 * Gets the metadata about the comment column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getComment()
	{
		return $this->_comment;
	}
	
	/**
	 * Gets the metadata bout the non concerned column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getNc()
	{
		return $this->_nc;
	}
	
	/**
	 * Gets the metadata about the upload column.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBlocResponseMetadata
	 */
	public function getUpload()
	{
		return $this->_upload;
	}
	
}
