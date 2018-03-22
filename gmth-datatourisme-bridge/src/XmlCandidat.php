<?php

class XmlCandidat
{
    /**
     *
     * @var string
     */
	private $Nom;
	
	/**
	 *
	 * @var string
	 */
	private $Prenom;
	
	/**
	 *
	 * @var string
	 */
	private $Civilite;
	
	/**
	 *
	 * @var string
	 */
	private $Genre;
	
	/**
	 *
	 * @var string
	 */
	private $Email;
	
	/**
	 *
	 * @var string
	 */
	private $Telephone;
	
	/**
	 *
	 * @param string $Nom
	 */
	public function SetNom($Nom) {
	    $this->Nom = $Nom;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetNom() {
	    return $this->Nom;
	}
	
	/**
	 *
	 * @param string $Prenom
	 */
	public function SetPrenom($Prenom) {
	    $this->Prenom = $Prenom;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetPrenom() {
	    return $this->Prenom;
	}
	
	/**
	 *
	 * @param string $Civilite
	 */
	public function SetCivilite($Civilite) {
	    $this->Civilite = $Civilite;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetCivilite() {
	    return $this->Civilite;
	}

	/**
	 *
	 * @param string $Genre
	 */
	public function SetGenre($Genre) {
	    $this->Genre = $Genre;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetGenre() {
	    return $this->Genre;
	}
	
	/**
	 *
	 * @param string $Email
	 */
	public function SetEmail($Email) {
	    $this->Email = $Email;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetEmail() {
	    return $this->Email;
	}
	
	/**
	 *
	 * @param string $Telephone
	 */
	public function SetTelephone($Telephone) {
	    $this->Telephone = $Telephone;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetTelephone() {
	    return $this->Telephone;
	}
	
}