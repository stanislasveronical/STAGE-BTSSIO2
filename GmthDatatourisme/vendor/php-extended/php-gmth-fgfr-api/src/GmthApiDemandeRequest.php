<?php

namespace PhpExtended\Gmth;

class GmthApiDemandeRequest
{
	
	/**
	 * The id of the demande numbers.
	 * 
	 * @var string[]
	 */
	private $_numero_demande = null;
	
	/**
	 * The id of the allowed category.
	 * 
	 * @var string[]
	 */
	private $_categories = array();
	
	/**
	 * The id of the allowed activities.
	 * 
	 * @var string[]
	 */
	private $_activites = array();
	
	/**
	 * The id of the allowed states.
	 * 
	 * @var string[]
	 */
	private $_etats = array();
	
	/**
	 * The id of the region.
	 * 
	 * @var integer
	 */
	private $_region_id = null;
	
	/**
	 * The id of the commune.
	 * 
	 * @var integer
	 */
	private $_commune_id = null;
	
	/**
	 * The email of the candidate.
	 * 
	 * @var string
	 */
	private $_courriel_candidat = null;
	
	/**
	 * Whether the demande should have plaques. Defaults to false.
	 * 
	 * @var boolean
	 */
	private $_plaques = false;
	
	/**
	 * Whether the demande should be locked. Defaults to false.
	 * 
	 * @var boolean
	 */
	private $_locked = false;
	
	/**
	 * Sets the query to be for this specific numero demande.
	 * 
	 * @param string $numeroDemande
	 */
	public function setNumeroDemande($numeroDemande)
	{
		$this->_numero_demande = $numeroDemande;
	}
	
	/**
	 * Adds the category to the query. Multiple adds acts as an OR.
	 * 
	 * @param GmthApiCategorie $categorie
	 */
	public function addCategory(GmthApiCategorie $categorie)
	{
		$this->_categories[] = $categorie->getId();
	}
	
	/**
	 * Adds the activity to the query. Multiple adds acts as an OR.
	 * 
	 * @param GmthApiActivite $activite
	 */
	public function addActivite(GmthApiActivite $activite)
	{
		$this->_activites[] = $activite->getId();
	}
	
	/**
	 * Adds the state to the query. Multiple adds acts as an OR.
	 * 
	 * @param GmthApiEtat $etat
	 */
	public function addEtat(GmthApiEtat $etat)
	{
		$this->_etats[] = $etat->getId();
	}
	
	/**
	 * Sets the region for the scope of the query.
	 * 
	 * @param GmthApiRegion $region
	 */
	public function setRegion(GmthApiRegion $region)
	{
		$this->_region_id = $region->getId();
	}
	
	/**
	 * Sets the commune for the scope of the query.
	 * 
	 * @param GmthApiCommune $commune
	 */
	public function setCommune(GmthApiCommune $commune)
	{
		$this->_commune_id = $commune->getId();
	}
	
	/**
	 * Sets the candidate email for the scope of the query.
	 * 
	 * @param string $courrielCandidat
	 */
	public function setCourrielCandidat($courrielCandidat)
	{
		$this->_courriel_candidat = $courrielCandidat;
	}
	
	/**
	 * Enables whether the demande should have plaques.
	 */
	public function enablePlaques()
	{
		$this->_plaques = true;
	}
	
	/**
	 * Enables whether the demande should be locked.
	 */
	public function enableLocked()
	{
		$this->_locked = true;
	}
	
	/**
	 * Gets the payload that will be send as json data.
	 * 
	 * @return mixed[]
	 */
	public function asPayload()
	{
		return array(
			'numero_demande' => $this->_numero_demande,
			'categories' => $this->_categories,
			'activites' => $this->_activites,
			'etats' => $this->_etats,
			'region_id' => $this->_region_id,
			'commune_id' => $this->_commune_id,
			'courriel_candidat' => $this->_courriel_candidat,
			'plaques' => $this->_plaques,
			'locked' => $this->_locked,
		);
	}
	
}
