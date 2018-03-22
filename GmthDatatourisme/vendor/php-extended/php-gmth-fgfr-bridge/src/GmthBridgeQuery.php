<?php

namespace PhpExtended\Gmth;

class GmthBridgeQuery
{
	
	/**
	 * The numero demandes to search for.
	 * 
	 * @var string[]
	 */
	private $_numeros_demande = array();
	
	/**
	 * The categories that the etablissement must have.
	 * 
	 * @var GmthDataCategorie[]
	 */
	private $_categories = array();
	
	/**
	 * The activites that the etablissement must have.
	 * 
	 * @var GmthDataActivite[]
	 */
	private $_activites = array();
	
	/**
	 * The regions in which the etablissement should be.
	 * 
	 * @var GmthDataRegion[]
	 */
	private $_regions = array();
	
	/**
	 * The communes in which the etablissement should be.
	 * 
	 * @var GmthDataCommune[]
	 */
	private $_communes = array();
	
	/**
	 * The etats demande to search for.
	 * 
	 * @var GmthDataEtat[]
	 */
	private $_etats = array();
	
	/**
	 * The emails candidats to search for.
	 * 
	 * @var string[]
	 */
	private $_mails_candidats = array();
	
	/**
	 * Adds another numero de demande filter.
	 * 
	 * @param string $numeroDemande
	 */
	public function addNumeroDemande($numeroDemande)
	{
		$this->_numeros_demande[] = $numeroDemande;
	}
	
	/**
	 * Adds multiple numeros de demande filters (OR filters).
	 * 
	 * @param \Traversable[string] $numerosDemande
	 */
	public function addNumerosDemande(\Traversable $numerosDemande)
	{
		foreach($numerosDemande as $numeroDemande)
			$this->addNumeroDemande($numeroDemande);
	}
	
	/**
	 * Adds multiple numeros de demande filters (OR filters)
	 * 
	 * @param string[] $numerosDemande
	 */
	public function addNumerosDemandeArray(array $numerosDemande)
	{
		$this->addNumerosDemande(new \ArrayIterator($numerosDemande));
	}
	
	/**
	 * Gets the list of allowed numeros_demande.
	 * 
	 * @return \ArrayIterator[string]
	 */
	public function getNumerosDemande()
	{
		return new \ArrayIterator($this->_numeros_demande);
	}
	
	/**
	 * Gets the quantity of numeros demande in this query.
	 * 
	 * @return integer
	 */
	public function getNumerosDemandeCount()
	{
		return count($this->_numeros_demande);
	}
	
	/**
	 * Adds another categorie filter.
	 * 
	 * @param GmthBridgeCategorie $categorie
	 */
	public function addCategorie(GmthBridgeCategorie $categorie)
	{
		$this->_categories[] = $categorie->getDataCategorie();
	}
	
	/**
	 * Adds multiple categorie filters (OR filters).
	 * 
	 * @param \Traversable[GmthBridgeCategorie] $categories
	 */
	public function addCategories(\Traversable $categories)
	{
		foreach($categories as $categorie)
			$this->addCategorie($categorie);
	}
	
	/**
	 * Adds multiple categorie filters (OR filters).
	 * 
	 * @param GmthBridgeCategorie[] $categories
	 */
	public function addCategoriesArray(array $categories)
	{
		$this->addCategories(new \ArrayIterator($categories));
	}
	
	/**
	 * Gets the list of allowed categories.
	 * 
	 * @return \ArrayIterator[GmthBridgeCategorie]
	 */
	public function getCategories()
	{
		return new \ArrayIterator($this->_categories);
	}
	
	/**
	 * Gets the quantity of categories in this query.
	 * 
	 * @return integer
	 */
	public function getCategoriesCount()
	{
		return count($this->_categories);
	}
	
	/**
	 * Adds another activite filter.
	 * 
	 * @param GmthBridgeActivite $activite
	 */
	public function addActivite(GmthBridgeActivite $activite)
	{
		$this->_activites[] = $activite->getDataActivite();
	}
	
	/**
	 * Adds multiple activite filters (OR filters).
	 * 
	 * @param \Traversable[GmthBridgeActivite] $activites
	 */
	public function addActivites(\Traversable $activites)
	{
		foreach($activites as $activite)
			$this->addActivite($activite);
	}
	
	/**
	 * Adds multiple activite filters (OR filters).
	 * 
	 * @param GmthBridgeActivite[] $activites
	 */
	public function addActivitesArray(array $activites)
	{
		$this->addActivites(new \ArrayIterator($activites));
	}
	
	/**
	 * Gets the list of allowed activites.
	 * 
	 * @return \ArrayIterator[GmthBridgeActivite]
	 */
	public function getActivites()
	{
		return new \ArrayIterator($this->_activites);
	}
	
	/**
	 * Gets the quantity of activites in this query.
	 * 
	 * @return integer
	 */
	public function getActivitesCount()
	{
		return count($this->_activites);
	}
	
	/**
	 * Adds another region filter.
	 * 
	 * @param GmthBridgeRegion $region
	 */
	public function addRegion(GmthBridgeRegion $region)
	{
		$this->_regions[] = $region->getDataRegion();
	}
	
	/**
	 * Adds multiple region filters (OR filters).
	 * 
	 * @param \Traversable[GmthBridgeRegion] $regions
	 */
	public function addRegions(\Traversable $regions)
	{
		foreach($regions as $region)
			$this->addRegion($region);
	}
	
	/**
	 * Adds multiple region filters (OR filters).
	 * 
	 * @param GmthBridgeRegion[] $regions
	 */
	public function addRegionsArray(array $regions)
	{
		$this->addRegions(new \ArrayIterator($regions));
	}
	
	/**
	 * Gets the list of allowed regions.
	 * 
	 * @return \ArrayIterator[GmthBridgeRegion]
	 */
	public function getRegions()
	{
		return new \ArrayIterator($this->_regions);
	}
	
	/**
	 * Gets the quantity of regions in this query.
	 * 
	 * @return integer
	 */
	public function getRegionsCount()
	{
		return count($this->_regions);
	}
	
	/**
	 * Adds another commune filter.
	 * 
	 * @param GmthBridgeCommune $commune
	 */
	public function addCommune(GmthBridgeCommune $commune)
	{
		$this->_communes[] = $commune->getDataCommune();
	}
	
	/**
	 * Adds multiple commune filters (OR filters).
	 * 
	 * @param \Traversable[GmthBridgeCommune] $communes
	 */
	public function addCommunes(\Traversable $communes)
	{
		foreach($communes as $commune)
			$this->addCommune($commune);
	}
	
	/**
	 * Adds multiple commune filters (OR filters).
	 * 
	 * @param GmthBridgeCommune[] $communes
	 */
	public function addCommunesArray(array $communes)
	{
		$this->addCommunes(new \ArrayIterator($communes));
	}
	
	/**
	 * Gets the list of allowed communes.
	 * 
	 * @return \ArrayIterator[GmthBridgeCommune]
	 */
	public function getCommunes()
	{
		return new \ArrayIterator($this->_communes);
	}
	
	/**
	 * Gets the quantity of communes in this query.
	 * 
	 * @return integer
	 */
	public function getCommunesCount()
	{
		return count($this->_communes);
	}
	
	/**
	 * Adds another etat filter.
	 * 
	 * @param GmthBridgeEtat $etat
	 */
	public function addEtat(GmthBridgeEtat $etat)
	{
		$this->_etats[] = $etat->getDataEtat();
	}
	
	/**
	 * Adds multiple etat filters (OR filters).
	 * 
	 * @param \Traversable[GmthBridgeEtat] $etats
	 */
	public function addEtats(\Traversable $etats)
	{
		foreach($etats as $etat)
			$this->addEtat($etat);
	}
	
	/**
	 * Adds multiple etat filters (OR filters).
	 * 
	 * @param GmthBridgeEtat[] $etats
	 */
	public function addEtatsArray(array $etats)
	{
		$this->addEtats(new \ArrayIterator($etats));
	}
	
	/**
	 * Gets the list of allowed etats.
	 * 
	 * @return \ArrayIterator[GmthBridgeEtat]
	 */
	public function getEtats()
	{
		return new \ArrayIterator($this->_etats);
	}
	
	/**
	 * Gets the quantity of etats in this query.
	 * 
	 * @return integer
	 */
	public function getEtatsCount()
	{
		return count($this->_etats);
	}
	
	/**
	 * Adds another email candidat filter.
	 * 
	 * @param string $emailCandidat
	 */
	public function addEmailCandidat($emailCandidat)
	{
		$this->_mails_candidats[] = $emailCandidat;
	}
	
	/**
	 * Adds multiple email candidat filters (OR filters).
	 * 
	 * @param \Traversable[string] $emailsCandidats
	 */
	public function addEmailsCandidats(\Traversable $emailsCandidats)
	{
		foreach($emailsCandidats as $emailCandidat)
			$this->addEmailCandidat($emailCandidat);
	}
	
	/**
	 * Adds multiple email candidat filters (OR filters).
	 * 
	 * @param string[] $emailsCandidats
	 */
	public function addEmailsCandidatsArray(array $emailsCandidats)
	{
		$this->addEmailsCandidats(new \ArrayIterator($emailsCandidats));
	}
	
	/**
	 * Gets the list of allowed emails candidats.
	 * 
	 * @return \ArrayIterator[string]
	 */
	public function getEmailsCandidats()
	{
		return new \ArrayIterator($this->_mails_candidats);
	}
	
	/**
	 * Gets the quantity of emails candidats in this query.
	 * 
	 * @return integer
	 */
	public function getEmailsCandidatsCount()
	{
		return count($this->_mails_candidats);
	}
	
}
