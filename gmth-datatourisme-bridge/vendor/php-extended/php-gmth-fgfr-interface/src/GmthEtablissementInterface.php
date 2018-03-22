<?php

namespace PhpExtended\Gmth;

/**
 * GmthEtablissementInterface interface file.
 * 
 * This interface represents an etablissement object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthEtablissementInterface
{
	
	/**
	 * Gets the commune related to this etablissement.
	 * 
	 * @return GmthCommuneInterface
	 */
	public function getCommune();
	
	/**
	 * Gets the demande active, if any, for this etablissement.
	 * 
	 * @return GmthDemandeInterface
	 */
	public function getDemandeActive();
	
	/**
	 * Gets the demandes that are attached to this etablissement.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes();
	
	/**
	 * Gets the type classement of this etablissement.
	 * 
	 * @return GmthTypeClassementInterface
	 */
	public function getTypeClassement();
	
	/**
	 * Gets the id of this etablissement.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the nom of this etablissement.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the numero siret of this etablissement.
	 * 
	 * @return string
	 */
	public function getNumeroSiret();
	
	/**
	 * Gets the raison sociale of this etablissement.
	 * 
	 * @return string
	 */
	public function getRaisonSociale();
	
	/**
	 * Gets the date debut exploitation of this etablissement.
	 * 
	 * @return \DateTime
	 */
	public function getDateDebutExploitation();
	
	/**
	 * Gets the first line of the address of this etablissement.
	 * 
	 * @return string
	 */
	public function getAdresse1();
	
	/**
	 * Gets the second line of the address of this etablissement.
	 * 
	 * @return string
	 */
	public function getAdresse2();
	
	/**
	 * Gets the third line of the address of this etablissement.
	 * 
	 * @return string
	 */
	public function getAdresse3();
	
	/**
	 * Gets the nombre of plaques for this etablissement.
	 * 
	 * @return integer
	 */
	public function getNombrePlaques();
	
	/**
	 * Gets the classement ERP for this etablissement.
	 * 
	 * @return integer
	 */
	public function getClassementErp();
	
	/**
	 * Gets the classement IOP for this etablissement.
	 * 
	 * @return integer
	 */
	public function getClassementIop();
	
	/**
	 * Gets the date classement atout france for this etablissement.
	 * 
	 * @return \DateTime
	 */
	public function getDateClassementAtoutFrance();
	
	/**
	 * Gets the number of etoiles for this etablissement.
	 * 
	 * @return integer
	 */
	public function getNombreEtoiles();
	
	/**
	 * Gets whether the etablissement has the marque qualite tourisme.
	 * 
	 * @return boolean
	 */
	public function getMarqueQualiteTourisme();
	
	/**
	 * Gets the boite postale of the etablissement.
	 * 
	 * @return string
	 */
	public function getBoitePostale();
	
	/**
	 * Gets the email of the etablissement.
	 * 
	 * @return string
	 */
	public function getEmail();
	
	/**
	 * Gets the telephone of the etablissement.
	 * 
	 * @return string
	 */
	public function getTelephone();
	
	/**
	 * Gets the site internet of the etablissement.
	 * 
	 * @return string
	 */
	public function getSiteInternet();
	
	/**
	 * Gets the adresse proprietaire of the etablissement.
	 * 
	 * @return string
	 */
	public function getAdresseProprietaire();
	
	/**
	 * Gets the motif retrait of the etablissement.
	 * 
	 * @return string
	 */
	public function getMotifRetrait();
	
}
