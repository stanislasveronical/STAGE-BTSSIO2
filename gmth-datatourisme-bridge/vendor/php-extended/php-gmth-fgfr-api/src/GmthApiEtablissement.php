<?php

namespace PhpExtended\Gmth;

use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;

class GmthApiEtablissement extends JsonObject
{
	
	/**
	 * The id of the etablissement.
	 * 
	 * @var string
	 */
	private $_id = null;
	
	/**
	 * The name of the etablissement.
	 * 
	 * @var string
	 */
	private $_nom = null;
	
	/**
	 * The numero siret of the etablissement.
	 * 
	 * @var string
	 */
	private $_numero_siret = null;
	
	/**
	 * The numero demande of the etablissement.
	 * 
	 * @var string
	 */
	private $_reference_mnt = null;
	
	/**
	 * The raison sociale of the etablissement.
	 * 
	 * @var string
	 */
	private $_raison_sociale = null;
	
	/**
	 * The date of debut of exploitation of the etablissement.
	 * 
	 * @var  \DateTime
	 */
	private $_date_debut_exploitation = null;
	
	/**
	 * The first part of the address.
	 * 
	 * @var string
	 */
	private $_adresse1 = null;
	
	/**
	 * The second part of the address.
	 * 
	 * @var string
	 */
	private $_adresse2 = null;
	
	/**
	 * The third part of the address.
	 * 
	 * @var string
	 */
	private $_adresse3 = null;
	
	/**
	 * Whether this etablissement has the picto auditif.
	 * 
	 * @var boolean
	 */
	private $_auditif_obtenu = null;
	
	/**
	 * Whether this etablissement has the picto mental.
	 * 
	 * @var boolean
	 */
	private $_mental_obtenu = null;
	
	/**
	 * Whether this etablissement has the picto moteur.
	 * 
	 * @var boolean
	 */
	private $_moteur_obtenu = null;
	
	/**
	 * Whether this etablissement has the picto visuel.
	 * 
	 * @var boolean
	 */
	private $_visuel_obtenu = null;
	
	/**
	 * The date at the end of the attribution.
	 * 
	 * @var \DateTime
	 */
	private $_date_fin_attribution_marque = null;
	
	/**
	 * The date of the next mail to be sent.
	 * 
	 * @var \DateTime
	 */
	private $_date_prochaine_relance = null;
	
	/**
	 * The number of plaques of the etablissement.
	 * 
	 * @var integer
	 */
	private $_nombre_plaques = null;
	
	/**
	 * The classement erp of the etablissement.
	 * 
	 * @var integer
	 */
	private $_classement_erp = null;
	
	/**
	 * The classement iop of the etablissement.
	 * 
	 * @var integer
	 */
	private $_classement_iop = null;
	
	/**
	 * The type of classement of the etablissement.
	 * 
	 * @var GmthApiTypeClassement
	 */
	private $_type_classement = null;
	
	/**
	 * The date when this etablissement was classed by atout france.
	 * 
	 * @var \DateTime
	 */
	private $_date_classement_atout_france = null;
	
	/**
	 * The number of stars this etablissement has.
	 * 
	 * @var integer
	 */
	private $_nombre_etoiles = null;
	
	/**
	 * Whether this etablissement has the marque qualite tourisme.
	 * 
	 * @var boolean
	 */
	private $_marque_etat_qualite_tourisme = null;
	
	/**
	 * The post box of the address.
	 * 
	 * @var string
	 */
	private $_boite_postale = null;
	
	/**
	 * The main mail of the etablissement.
	 * 
	 * @var string
	 */
	private $_courriel = null;
	
	/**
	 * The main phone number of the etablissement.
	 * 
	 * @var string
	 */
	private $_telephone = null;
	
	/**
	 * The website of the etablissement.
	 * 
	 * @var string
	 */
	private $_site_internet = null;
	
	/**
	 * The adress of the owner.
	 * 
	 * @var string
	 */
	private $_adresse_proprietaire = null;
	
	/**
	 * The demandes of this etablissement.
	 * 
	 * @var JsonCollection[GmthApiDemande]
	 */
	private $_demandes = null;
	
	/**
	 * The city of the etablissement.
	 * 
	 * @var GmthApiCommune
	 */
	private $_commune = null;
	
	/**
	 * When this etablissement record was created.
	 * 
	 * @var \DateTime
	 */
	private $_created = null;
	
	/**
	 * When this etablissement record was updated.
	 * 
	 * @var \DateTime
	 */
	private $_updated = null;
	
	/**
	 * Whether this etablissement is from the reprise.
	 * 
	 * @var boolean
	 */
	private $_reprise = null;
	
	/**
	 * The current active demande for this etablissement.
	 * 
	 * @var GmthApiDemande
	 */
	private $_demande_active = null;
	
	/**
	 * The motivation of the withdrawal.
	 * 
	 * @var string
	 */
	private $_motif_retrait = null;
	
	/**
	 * The etag of the etablissement.
	 * 
	 * @var integer
	 */
	private $_etag = null;
	
	/**
	 * Builds a new GmthApiEtablissement with the given decoded json data.
	 * 
	 * @param mixed[] $json
	 * @param boolean $silent
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
				case 'nom_etablissement':
					$this->_nom = $this->asString($value, $silent);
					break;
				case 'numero_siret':
					$this->_numero_siret = $this->asString($value, $silent);
					break;
				case 'reference_mnt':
					$this->_reference_mnt = $this->asString($value, $silent);
					break;
				case 'raison_sociale':
					$this->_raison_sociale = $this->asString($value, $silent);
					break;
				case 'date_debut_exploitation':
					$this->_date_debut_exploitation = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'adresse1':
					$this->_adresse1 = $this->asString($value, $silent);
					break;
				case 'adresse2':
					$this->_adresse2 = $this->asString($value, $silent);
					break;
				case 'adresse3':
					$this->_adresse3 = $this->asString($value, $silent);
					break;
				case 'auditif_obtenu':
					$this->_auditif_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'mental_obtenu':
					$this->_mental_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'moteur_obtenu':
					$this->_moteur_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'visuel_obtenu':
					$this->_visuel_obtenu = $this->asBoolean($value, $silent);
					break;
				case 'date_fin_attribution_marque':
					$this->_date_fin_attribution_marque = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'date_prochaine_relance':
					$this->_date_prochaine_relance = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'nombre_plaques':
					$this->_nombre_plaques = $this->asInteger($value, $silent);
					break;
				case 'classement_e_r_p':
					$this->_classement_erp = $this->asInteger($value, $silent);
					break;
				case 'classement_i_o_p':
					$this->_classement_iop = $this->asInteger($value, $silent);
					break;
				case 'type_classement':
					$this->_type_classement = new GmthApiTypeClassement($this->asArray($value, $silent), $silent);
					break;
				case 'date_classement_atout_france':
					$this->_date_classement_atout_france = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'nombre_etoiles':
					$this->_nombre_etoiles = $this->asInteger($value, $silent);
					break;
				case 'marque_etat_qualite_tourisme':
					$this->_marque_etat_qualite_tourisme = $this->asBoolean($value, $silent);
					break;
				case 'boite_postale':
					$this->_boite_postale = $this->asString($value, $silent);
					break;
				case 'courriel':
					$this->_courriel = $this->asString($value, $silent);
					break;
				case 'telephone':
					$this->_telephone = $this->asString($value, $silent);
					break;
				case 'site_internet':
					$this->_site_internet = $this->asString($value, $silent);
					break;
				case 'adresse_proprietaire':
					$this->_adresse_proprietaire = $this->asString($value, $silent);
					break;
				case 'demandes':
					$this->_demandes = new JsonCollection('\PhpExtended\Gmth\GmthApiDemande', $this->asArray($value, $silent), $silent);
					break;
				case 'commune':
					$this->_commune = new GmthApiCommune($this->asArray($value, $silent), $silent);
					break;
				case 'created':
					$this->_created = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'updated':
					$this->_updated = $this->asDatetime($value, \DateTime::ATOM, $silent);
					break;
				case 'reprise':
					$this->_reprise = $this->asBoolean($value, $silent);
					break;
				case 'demande_active':
					$this->_demande_active = new GmthApiDemande($this->asArray($value, $silent), $silent);
					break;
				case 'motif_retrait':
					$this->_motif_retrait = $this->asString($value, $silent);
					break;
				case 'etag':
					$this->_etag = $this->asInteger($value, $silent);
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
		
		if($this->_demandes === null)
			$this->_demandes = new JsonCollection('\PhpExtended\Gmth\GmthApiDemande', array());
	}
	
	/**
	 * Gets the id of the etablissement.
	 * 
	 * @return string
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Gets the name of the etablissement.
	 * 
	 * @return string
	 */
	public function getNom()
	{
		return $this->_nom;
	}
	
	/**
	 * Gets the numero siret of the etablissement.
	 * 
	 * @return string
	 */
	public function getNumeroSiret()
	{
		return $this->_numero_siret;
	}
	
	/**
	 * Gets the reference mnt.
	 * 
	 * @return string
	 */
	public function getReferenceMnt()
	{
		return $this->_reference_mnt;
	}
	
	/**
	 * Gets the raison sociale of the etablissement.
	 * 
	 * @return string
	 */
	public function getRaisonSociale()
	{
		return $this->_raison_sociale;
	}
	
	/**
	 * Gets the date of the start of exploitation.
	 * 
	 * @return \DateTime
	 */
	public function getDateDebutExploitation()
	{
		return $this->_date_debut_exploitation;
	}
	
	/**
	 * Gets the first part of the adresse.
	 * 
	 * @return string
	 */
	public function getAdresse1()
	{
		return $this->_adresse1;
	}
	
	/**
	 * Gets the second part of the adresse.
	 * 
	 * @return string
	 */
	public function getAdresse2()
	{
		return $this->_adresse2;
	}
	
	/**
	 * Gets the third part of the adresse.
	 * 
	 * @return string
	 */
	public function getAdresse3()
	{
		return $this->_adresse3;
	}
	
	/**
	 * Gets whether the etablissement has the picto auditif.
	 * 
	 * @return boolean
	 */
	public function getAuditifObtenu()
	{
		return $this->_auditif_obtenu;
	}
	
	/**
	 * Gets whether the etablissement has the picto mental.
	 * 
	 * @return boolean
	 */
	public function getMentalObtenu()
	{
		return $this->_mental_obtenu;
	}
	
	/**
	 * Gets whether the etablissement has the picto moteur.
	 * 
	 * @return boolean
	 */
	public function getMoteurObtenu()
	{
		return $this->_moteur_obtenu;
	}
	
	/**
	 * Gets whether the etablissement has the picto visuel.
	 * 
	 * @return boolean
	 */
	public function getVisuelObtenu()
	{
		return $this->_visuel_obtenu;
	}
	
	/**
	 * Gets the date when the attribution ends.
	 * 
	 * @return \DateTime
	 */
	public function getDateFinAttributionMarque()
	{
		return $this->_date_fin_attribution_marque;
	}
	
	/**
	 * Gets the date of the next email to be sent.
	 * 
	 * @return \DateTime
	 */
	public function getDateProchaineRelance()
	{
		return $this->_date_prochaine_relance;
	}
	
	/**
	 * Gets the number of plaques.
	 * 
	 * @return integer
	 */
	public function getNombrePlaques()
	{
		return $this->_nombre_plaques;
	}
	
	/**
	 * Gets the classement erp of the etablissement.
	 * 
	 * @return integer
	 */
	public function getClassementErp()
	{
		return $this->_classement_erp;
	}
	
	/**
	 * Gets the classement iop of the etablissement.
	 * 
	 * @return integer
	 */
	public function getClassementIop()
	{
		return $this->_classement_iop;
	}
	
	/**
	 * Gets the type of classement of the etablissement.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiTypeClassement
	 */
	public function getTypeClassement()
	{
		return $this->_type_classement;
	}
	
	/**
	 * Gets when this etablissement was classified by atout france.
	 * 
	 * @return \DateTime
	 */
	public function getDateClassementAtoutFrance()
	{
		return $this->_date_classement_atout_france;
	}
	
	/**
	 * Gets the number of stars.
	 * 
	 * @return number
	 */
	public function getNombreEtoiles()
	{
		return $this->_nombre_etoiles;
	}
	
	/**
	 * Gets whether this etablissement has the marque qualite tourisme.
	 * 
	 * @return boolean
	 */
	public function getMarqueEtatQualiteTourisme()
	{
		return $this->_marque_etat_qualite_tourisme;
	}
	
	/**
	 * Gets the post box of the etablissement.
	 * 
	 * @return string
	 */
	public function getBoitePostale()
	{
		return $this->_boite_postale;
	}
	
	/**
	 * Gets the main mail of the etablissement.
	 * 
	 * @return string
	 */
	public function getCourriel()
	{
		return $this->_courriel;
	}
	
	/**
	 * Gets the main phone number of the etablissement.
	 * 
	 * @return string
	 */
	public function getTelephone()
	{
		return $this->_telephone;
	}
	
	/**
	 * Gets the main website of the etablissement.
	 * 
	 * @return string
	 */
	public function getSiteInternet()
	{
		return $this->_site_internet;
	}
	
	/**
	 * Gets the owner's address.
	 * 
	 * @return string
	 */
	public function getAdresseProprietaire()
	{
		return $this->_adresse_proprietaire;
	}
	
	/**
	 * Gets all the demandes of the etablissement.
	 * 
	 * @return \PhpExtended\Gmth\JsonCollection[GmthApiDemande]
	 */
	public function getDemandes()
	{
		return $this->_demandes;
	}
	
	/**
	 * Gets the city the etablissement is in.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiCommune
	 */
	public function getCommune()
	{
		return $this->_commune;
	}
	
	/**
	 * Gets the creation date.
	 * 
	 * @return \DateTime
	 */
	public function getCreated()
	{
		return $this->_created;
	}
	
	/**
	 * Gets the last updated date.
	 * 
	 * @return \DateTime
	 */
	public function getUpdated()
	{
		return $this->_updated;
	}
	
	/**
	 * Gets whether this etablissement is from the reprise.
	 * 
	 * @return boolean
	 */
	public function getReprise()
	{
		return $this->_reprise;
	}
	
	/**
	 * Gets the active demande.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiDemande
	 */
	public function getDemandeActive()
	{
		return $this->_demande_active;
	}
	
	/**
	 * Gets the motif of withdrawal of the etablissement.
	 * 
	 * @return string
	 */
	public function getMotifRetrait()
	{
		return $this->_motif_retrait;
	}
	
	/**
	 * Gets the etag of the etablissement.
	 * 
	 * @return integer
	 */
	public function getEtag()
	{
		return $this->_etag;
	}
	
}
