<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiDump extends JsonObject
{
	
	/**
	 * The available metadatas.
	 * 
	 * @var JsonCollection[GmthApiDumpMetadata]
	 */
	private $_metadatas = null;
	
	/**
	 * The available constantes.
	 * 
	 * @var JsonCollection[GmthApiConstant]
	 */
	private $_constantes = null;
	
	/**
	 * The available candidatures.
	 * 
	 * @var JsonCollection[GmthApiCandidature]
	 */
	private $_candidatures = null;
	
	/**
	 * The available demandes.
	 * 
	 * @var JsonCollection[GmthApiDemande]
	 */
	private $_demandes = null;
	
	/**
	 * The available etablissements.
	 * 
	 * @var JsonCollection[GmthApiEtablissement]
	 */
	private $_etablissements = null;
	
	/**
	 * The available evaluations.
	 * 
	 * @var JsonCollection[GmthApiEvaluation]
	 */
	private $_evaluations = null;
	
	/**
	 * The available grilles candidature.
	 * 
	 * @var JsonCollection[GmthApiGrilleCandidature]
	 */
	private $_grilles_candidature = null;
	
	/**
	 * The available grilles evaluation.
	 * 
	 * @var JsonCollection[GmthApiGrilleEvaluation]
	 */
	private $_grilles_evaluation = null;
	
	/**
	 * The available activites.
	 * 
	 * @var JsonCollection[GmthApiActivite]
	 */
	private $_ref_activites = null;
	
	/**
	 * The available decisions.
	 * 
	 * @var JsonCollection[GmthApiAvisDecision]
	 */
	private $_ref_avis_decision = null;
	
	/**
	 * The available categories.
	 * 
	 * @var JsonCollection[GmthApiCategorie]
	 */
	private $_ref_categories = null;
	
	/**
	 * The available communes.
	 * 
	 * @var JsonCollection[GmthApiCommune]
	 */
	private $_ref_communes = null;
	
	/**
	 * The available civilites.
	 * 
	 * @var JsonCollection[GmthApiCivilite]
	 */
	private $_ref_civilites = null;
	
	/**
	 * The available departements.
	 * 
	 * @var JsonCollection[GmthApiDepartement]
	 */
	private $_ref_departements = null;
	
	/**
	 * The available etats.
	 * 
	 * @var JsonCollection[GmthApiEtat]
	 */
	private $_ref_etats = null;
	
	/**
	 * The available types classement.
	 * 
	 * @var JsonCollection[GmthApiTypeClassement]
	 */
	private $_ref_types_classement = null;
	
	/**
	 * The available types demande.
	 * 
	 * @var JsonCollection[GmthApiTypeDemande]
	 */
	private $_ref_types_demande = null;
	
	/**
	 * The available types piece jointe.
	 * 
	 * @var JsonCollection[GmthApiTypePieceJointe]
	 */
	private $_ref_types_piece_jointe = null;
	
	/**
	 * The available regions.
	 * 
	 * @var JsonCollection[GmthApiRegion]
	 */
	private $_ref_region = null;
	
	/**
	 * Builds a new GmthApiDump with the given decoded json data.
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
				case 'candidature':
					$this->_candidatures = new JsonCollection('PhpExtended\Gmth\GmthApiGrille', $value, $silent);
					break;
				case 'demande':
					$this->_demandes = new JsonCollection('PhpExtended\Gmth\GmthApiDemande', $value, $silent);
					break;
				case 'etablissement':
					$this->_etablissements = new JsonCollection('PhpExtended\Gmth\GmthApiEtablissement', $value, $silent);
					break;
				case 'evaluation':
					$this->_evaluations = new JsonCollection('PhpExtended\Gmth\GmthApiEvaluation', $value, $silent);
					break;
				case 'refCommune':
					foreach($this->asArray($value, $silent) as $key2 => $value2)
					{
						switch($key2)
						{
							case 'id':
							case '_sync':
							case '_syncAction':
								// no action
								break;
							case 'data':
								$this->_ref_communes = new JsonCollection('PhpExtended\Gmth\GmthApiCommune', $value, $silent);
								break;
							if(!$silent)
								throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
									array('{key}' => $key2, '{class}' => get_class($this))));
						}
					}
					break;
				case 'grilleCandidature':
					$this->_grilles_candidature = new JsonCollection('PhpExtended\Gmth\GmthApiGrille', $value, $silent);
					break;
				case 'refCivilite':
					$this->_ref_civilites = new JsonCollection('PhpExtended\Gmth\GmthApiCivilite', $value, $silent);
					break;
				case 'refAvisDecision':
					$this->_ref_avis_decision = new JsonCollection('PhpExtended\Gmth\GmthApiAvisDecision', $value, $silent);
					break;
				case 'refTypeDemande':
					$this->_ref_types_demande = new JsonCollection('PhpExtended\Gmth\GmthApiDemande', $value, $silent);
					break;
				case 'refCategorie':
					$this->_ref_categories = new JsonCollection('PhpExtended\Gmth\GmthApiCategorie', $value, $silent);
					break;
				case 'refTypeClassement':
					$this->_ref_types_classement = new JsonCollection('PhpExtended\Gmth\GmthApiTypeClassement', $value, $silent);
					break;
				case 'refEtat':
					$this->_ref_etats = new JsonCollection('PhpExtended\Gmth\GmthApiEtat', $value, $silent);
					break;
				case 'constantes':
					$this->_constantes = new JsonCollection('PhpExtended\Gmth\GmthApiConstant', $value, $silent);
					break;
				case 'refTypePieceJointe':
					$this->_ref_types_piece_jointe = new JsonCollection('PhpExtended\Gmth\GmthApiTypePieceJointe', $value, $silent);
					break;
				case 'metadata':
					$this->_metadatas = new JsonCollection('PhpExtended\Gmth\GmthApiDumpMetadata', $value, $silent);
					break;
				case 'refRegion':
					$this->_ref_region = new JsonCollection('PhpExtended\Gmth\GmthApiRegion', $value, $silent);
					break;
				case 'grilleEvaluation':
					$this->_grilles_evaluation = new JsonCollection('PhpExtended\Gmth\GmthApiGrille', $value, $silent);
					break;
				case 'refActivite':
					$this->_ref_activites = new JsonCollection('PhpExtended\Gmth\GmthApiActivite', $value, $silent);
					break;
				case 'refDepartement':
					$this->_ref_departements = new JsonCollection('PhpExtended\Gmth\GmthApiDepartement', $value, $silent);
					break;
				default:
					if(!$silent)
						throw new JsonException(strtr('Forbidden key "{key}" in object "{class}".',
							array('{key}' => $key, '{class}' => get_class($this))));
			}
		}
		
		if($this->_metadatas === null)
			$this->_metadatas = new JsonCollection('PhpExtended\Gmth\GmthApiDumpMetadata', array());
		if($this->_constantes === null)
			$this->_constantes = new JsonCollection('PhpExtended\Gmth\GmthApiConstant', array());
		if($this->_candidatures === null)
			$this->_candidatures = new JsonCollection('PhpExtended\Gmth\GmthApiGrille', array());
		if($this->_demandes === null)
			$this->_demandes = new JsonCollection('PhpExtended\Gmth\GmthApiDemande', array());
		if($this->_etablissements === null)
			$this->_etablissements = new JsonCollection('PhpExtended\Gmth\GmthApiEtablissement', array());
		if($this->_evaluations === null)
			$this->_evaluations = new JsonCollection('PhpExtended\Gmth\GmthApiEvaluation', array());
		if($this->_grilles_candidature === null)
			$this->_grilles_candidature = new JsonCollection('PhpExtended\Gmth\GmthApiGrille', array());
		if($this->_grilles_evaluation === null)
			$this->_grilles_evaluation = new JsonCollection('PhpExtended\Gmth\GmthApiGrille', array());
		if($this->_ref_activites === null)
			$this->_ref_activites = new JsonCollection('PhpExtended\Gmth\GmthApiActivite', array());
		if($this->_ref_avis_decision === null)
			$this->_ref_avis_decision = new JsonCollection('PhpExtended\Gmth\GmthApiAvisDecision', array());
		if($this->_ref_categories === null)
			$this->_ref_categories = new JsonCollection('PhpExtended\Gmth\GmthApiCategorie', array());
		if($this->_ref_civilites === null)
			$this->_ref_civilites = new JsonCollection('PhpExtended\Gmth\GmthApiCivilite', array());
		if($this->_ref_communes === null)
			$this->_ref_communes = new JsonCollection('PhpExtended\Gmth\GmthApiCommune', array());
		if($this->_ref_departements === null)
			$this->_ref_departements = new JsonCollection('PhpExtended\Gmth\GmthApiDepartement', array());
		if($this->_ref_etats === null)
			$this->_ref_etats = new JsonCollection('PhpExtended\Gmth\GmthApiEtat', array());
		if($this->_ref_region === null)
			$this->_ref_region = new JsonCollection('PhpExtended\Gmth\GmthApiRegion', array());
		if($this->_ref_types_classement === null)
			$this->_ref_types_classement = new JsonCollection('PhpExtended\Gmth\GmthApiTypeClassement', array());
		if($this->_ref_types_demande === null)
			$this->_ref_types_demande = new JsonCollection('PhpExtended\Gmth\GmthApiRefDemande', array());
		if($this->_ref_types_piece_jointe === null)
			$this->_ref_types_piece_jointe = new JsonCollection('PhpExtended\Gmth\GmthApiTypePieceJointe', array());
	}
	
	/**
	 * Gets the list of available metadatas.
	 * 
	 * @return JsonCollection[GmthApiDumpMetadata]
	 */
	public function getMetadatas()
	{
		return $this->_metadatas;
	}
	
	/**
	 * Gets the list of available constants.
	 * 
	 * @return JsonCollection[GmthApiConstant]
	 */
	public function getConstantes()
	{
		return $this->_constantes;
	}
	
	/**
	 * Gets the list of available candidatures.
	 * 
	 * @return JsonCollection[GmthApiGrille]
	 */
	public function getCandidatures()
	{
		return $this->_candidatures;
	}
	
	/**
	 * Gets the list of available demandes.
	 * 
	 * @return JsonCollection[GmthApiDemande]
	 */
	public function getDemandes()
	{
		return $this->_demandes;
	}
	
	/**
	 * Gets the list of available etablissements.
	 * 
	 * @return JsonCollection[GmthApiEtablissement]
	 */
	public function getEtablissements()
	{
		return $this->_etablissements;
	}
	
	/**
	 * Gets the list of available evaluations.
	 * 
	 * @return JsonCollection[GmthApiEvaluation]
	 */
	public function getEvaluations()
	{
		return $this->_evaluations;
	}
	
	/**
	 * Gets the list of available grilles candidature.
	 * 
	 * @return JsonCollection[GmthApiGrille]
	 */
	public function getGrillesCandidatures()
	{
		return $this->_grilles_candidature;
	}
	
	/**
	 * Gets the list of available grilles evaluation.
	 * 
	 * @return JsonCollection[GmthApiGrille]
	 */
	public function getGrillesEvaluation()
	{
		return $this->_grilles_evaluation;
	}
	
	/**
	 * Gets the list of available activites.
	 * 
	 * @return JsonCollection[GmthApiActivite]
	 */
	public function getRefActivites()
	{
		return $this->_ref_activites;
	}
	
	/**
	 * Gets the list of available avis decision.
	 * 
	 * @return JsonCollection[GmthApiAvisDecision]
	 */
	public function getRefAvisDecision()
	{
		return $this->_ref_avis_decision;
	}
	
	/**
	 * Gets the list of available categories.
	 * 
	 * @return JsonCollection[GmthApiCategorie]
	 */
	public function getRefCategories()
	{
		return $this->_ref_categories;
	}
	
	/**
	 * Gets the list of available communes.
	 * 
	 * @return JsonCollection[GmthApiCommune]
	 */
	public function getRefCommunes()
	{
		return $this->_ref_communes;
	}
	
	/**
	 * Gets the list of available civilites.
	 * 
	 * @return JsonCollection[GmthApiCivilite]
	 */
	public function getRefCivilites()
	{
		return $this->_ref_civilites;
	}
	
	/**
	 * Gets the list of available departements.
	 * 
	 * @return JsonCollection[GmthApiDepartement]
	 */
	public function getRefDepartements()
	{
		return $this->_ref_departements;
	}
	
	/**
	 * Gets the list of available etats.
	 * 
	 * @return JsonCollection[GmthApiEtat]
	 */
	public function getRefEtats()
	{
		return $this->_ref_etats;
	}
	
	/**
	 * Gets the list of available types classement.
	 * 
	 * @return JsonCollection[GmthApiTypeClassement]
	 */
	public function getRefTypesClassement()
	{
		return $this->_ref_types_classement;
	}
	
	/**
	 * Gets the list of available types demande.
	 * 
	 * @return JsonCollection[GmthApiTypeDemande]
	 */
	public function getRefTypesDemande()
	{
		return $this->_ref_types_demande;
	}
	
	/**
	 * Gets the list of available types piece jointe.
	 * 
	 * @return JsonCollection[GmthApiTypePieceJointe]
	 */
	public function getRefTypePieceJointe()
	{
		return $this->_ref_types_piece_jointe;
	}
	
	/**
	 * Gets the list of available regions.
	 * 
	 * @return JsonCollection[GmthApiRegion]
	 */
	public function getRefRegion()
	{
		return $this->_ref_region;
	}
	
}
