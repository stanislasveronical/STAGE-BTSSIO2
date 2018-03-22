<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;

class GmthApiPrivateEndpoint extends GmthApiDistantEndpoint
{
	
	/**
	 * Gets the boot information for current logged user.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return GmthApiBootInformation
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getBootInformation($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/boot';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new GmthApiBootInformation($json, $silent);
		}
		catch(JsonException $j)
		{
			throw new GmthApiException('Failed to load api boot information.', 
				GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all grilles candidature that are active.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiGrille]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getModelesGrilleCandidature($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/grille/candidatures';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiGrille', $json);
		}
		catch(JsonException $j)
		{
			throw new GmthApiException('Failed to load api modeles grille candidature.',
				GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all grilles evaluation that are active.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiGrille]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getModelesGrilleEvaluation($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/grille/evaluations';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiGrille', $json);
		}
		catch(JsonException $j)
		{
			throw new GmthApiException('Failed to load api modeles grille evaluation.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all constants.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiConstant]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getConstantes($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/constante';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiConstant', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api constantes.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all the activites.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiActivite]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getActivites($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/activite';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiActivite', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api activites.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all the categories.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiCategorie]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getCategories($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/categorie';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiCategorie', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api categories.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all the etats.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiEtat]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getEtats($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/etat';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiEtat', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api etats.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all the type classements.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiTypeClassement]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getTypeClassements($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/typeclassement';
		
		$json = $this->getJson($url);
		
		try 
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiTypeClassement', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api types classement.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all type demandes.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiTypeDemande]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getTypeDemandes($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/typedemande';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiTypeDemande', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api types demande.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all type piece jointes.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiTypePieceJointe]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getTypePieceJointes($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/typepiecejointe';
		
		$json = $this->getJson($url);
		
		try 
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiTypePieceJointe', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api types piece jointe.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all avis decisions.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiAvisDecision]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getAvisDecisions($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/avisdecision';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiAvisDecision', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api avis decision.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all regions.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiRegion]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getRegions($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/region';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiRegion', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api regions.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all departements.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiDepartement]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getDepartements($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/departement';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiDepartement', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api departements.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all civilites.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiCivilite]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getCivilites($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/civilite';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiCivilite', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api civilites.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of all communes.
	 * 
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiCommune]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getCommunes($silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/ref/commune';
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiCommune', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api communes.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets a collection of demandes according to the search request.
	 * 
	 * @param GmthApiDemandeRequest $request
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return JsonCollection [GmthApiDemandeResponse]
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function searchDemande(GmthApiDemandeRequest $request, $silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/demande/search';
		
		$json = $this->getJson($url, json_encode($request->asPayload()));
		
		try
		{
			$data = new JsonCollection('\PhpExtended\Gmth\GmthApiDemandeResponse', $json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException('Failed to load api demande responses.',
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets the demande information for the given uuid.
	 * 
	 * @param string $demandeId the uuid of the demande
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return \PhpExtended\Gmth\JsonApiDemande
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getDemande($demandeId, $silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/demande/'.$demandeId;
		
		$json = $this->getJson($url);
		
		try 
		{
			$data = new GmthApiDemande($json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException(strtr('Failed to load api demande "{id}".', 
					array('{id}' => $demandeId)),
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets the etablissement information for the given uuid.
	 * 
	 * @param string $etablissementId the uuid of the etablissement
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return \PhpExtended\Gmth\GmthApiEtablissement
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getEtablissement($etablissementId, $silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'private-pilote/'.$this->_app_version.'/etablissement/'.$etablissementId;
		
		$json = $this->getJson($url);
		
		try
		{
			$data = new GmthApiEtablissement($json);
		}
		catch(JsonException $e)
		{
			throw new GmthApiException(strtr('Failed to load api etablissement "{id}".',
					array('{id}' => $etablissementId)),
					GmthApiException::ERROR_JSON_BUILDING, $j);
		}
		
		return $this->handleDataErrorStatus($data, $silent);
	}
	
	/**
	 * Gets the binary raw data of the file contents.
	 * 
	 * @param GmthApiPieceJointe $pieceJointe
	 * @param boolean $silent whether to throw exception on error. If true, 
	 * 		this will return null on error.
	 * @return string
	 * @throws GmthApiException if the connection cannot be established,
	 * 		or if an error occurs with the authentication, or if the object
	 * 		cannot be built or is returned as an error object
	 */
	public function getFichier(GmthApiPieceJointe $pieceJointe, $silent = false)
	{
		$this->ensureLoggedIn();
		
		$url = $this->_hostname.'/private-pilote/'.$this->_app_version.'/piecejointe/getPj/'.$pieceJointe->getNomTechnique();
		
		try
		{
			return $this->download($url);
		}
		catch(GmthApiException $e)
		{
			if($silent)
				return null;
			throw $e;
		}
	}
	
}
