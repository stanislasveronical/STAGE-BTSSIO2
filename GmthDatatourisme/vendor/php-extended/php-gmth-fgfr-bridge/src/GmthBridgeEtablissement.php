<?php

namespace PhpExtended\Gmth;

class GmthBridgeEtablissement implements GmthEtablissementInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The etablissement data object.
	 * 
	 * @var GmthDataEtablissement
	 */
	private $_etablissement = null;
	
	/**
	 * Builds a new GmthBridgeEtablissement with the given data repository and etablissement.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataEtablissement $etablissement
	 */
	public function __construct(GmthDataRepository $repository, GmthDataEtablissement $etablissement)
	{
		$this->_repository = $repository;
		$this->_etablissement = $etablissement;
	}
	
	/**
	 * Gets the etablissement data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataEtablissement
	 */
	public function getDataEtablissement()
	{
		return $this->_etablissement;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getCommune()
	 * @return GmthCommuneInterface
	 */
	public function getCommune()
	{
		return $this->_repository->getCommuneById($this->_etablissement->commune_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getDemandeActive()
	 * @return GmthDemandeInterface
	 */
	public function getDemandeActive()
	{
		return $this->_repository->getDemandeById($this->_etablissement->demande_active_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getDemandes()
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes()
	{
		return $this->_repository->getDemandesByEtablissementId($this->_etablissement->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getTypeClassement()
	 * @return GmthTypeClassementInterface
	 */
	public function getTypeClassement()
	{
		return $this->_repository->getTypeClassementById($this->_etablissement->type_classement_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_etablissement->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_etablissement->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getNumeroSiret()
	 * @return string
	 */
	public function getNumeroSiret()
	{
		return $this->_etablissement->numero_siret;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getRaisonSociale()
	 * @return string
	 */
	public function getRaisonSociale()
	{
		return $this->_etablissement->raison_sociale;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getDateDebutExploitation()
	 * @return \DateTime
	 */
	public function getDateDebutExploitation()
	{
		return $this->_etablissement->date_debut_exploitation;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getAdresse1()
	 * @return string
	 */
	public function getAdresse1()
	{
		return $this->_etablissement->adresse1;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getAdresse2()
	 * @return string
	 */
	public function getAdresse2()
	{
		return $this->_etablissement->adresse2;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getAdresse3()
	 * @return string
	 */
	public function getAdresse3()
	{
		return $this->_etablissement->adresse3;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getNombrePlaques()
	 * @return integer
	 */
	public function getNombrePlaques()
	{
		return (integer) $this->_etablissement->nombre_plaques;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getClassementErp()
	 * @return integer
	 */
	public function getClassementErp()
	{
		return $this->_etablissement->classement_erp;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getClassementIop()
	 * @return integer
	 */
	public function getClassementIop()
	{
		return $this->_etablissement->classement_iop;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getDateClassementAtoutFrance()
	 * @return \DateTime
	 */
	public function getDateClassementAtoutFrance()
	{
		return $this->_etablissement->date_classement_atout_france;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getNombreEtoiles()
	 * @return integer
	 */
	public function getNombreEtoiles()
	{
		return (integer) $this->_etablissement->nombre_etoiles;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getMarqueQualiteTourisme()
	 * @return boolean
	 */
	public function getMarqueQualiteTourisme()
	{
		return (boolean) $this->_etablissement->marque_qualite_tourisme;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getBoitePostale()
	 * @return string
	 */
	public function getBoitePostale()
	{
		return $this->_etablissement->boite_postale;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getEmail()
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_etablissement->email;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getTelephone()
	 * @return string
	 */
	public function getTelephone()
	{
		return $this->_etablissement->telephone;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getSiteInternet()
	 * @return string
	 */
	public function getSiteInternet()
	{
		return $this->_etablissement->site_internet;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getAdresseProprietaire()
	 * @return string
	 */
	public function getAdresseProprietaire()
	{
		return $this->_etablissement->adresse_proprio;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthEtablissementInterface::getMotifRetrait()
	 * @return string
	 */
	public function getMotifRetrait()
	{
		return $this->_etablissement->motif_retrait;
	}
	
}
