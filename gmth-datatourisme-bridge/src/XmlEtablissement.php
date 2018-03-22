<?php

class XmlEtablissement
{
    /**
     *
     * @var string
     */
	private $Id;
	
	/**
	 *
	 * @var string
	 */
	private $Nom;
	
	/**
	 *
	 * @var DateTime
	 */
	private $DateDerniereMiseAJour;
	
	/**
	 *
	 * @var string
	 */
	private $Description;
	
	/**
	 *
	 * @param string $Id
	 */
	public function SetId($Id) {
	    $this->Id = $Id;
	}

	/**
	 *
	 * @return string
	 */
	public function GetId() {
	    return $this->Id;
	}

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
	 * @param DateTime $DateDerniereMiseAJour
	 */
	public function SetDateDerniereMiseAJour($DateDerniereMiseAJour) {
	    $this->DateDerniereMiseAJour = $DateDerniereMiseAJour;
	}
	
	/**
	 *
	 * @return \DateTime
	 */
	public function GetDateDerniereMiseAJour() {
	    return $this->DateDerniereMiseAJour;
	}
	
	/**
	 *
	 * @param string $Description
	 */
	public function SetDescription($Description) {
	    $this->Description = $Description;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetDescription() {
	    return $this->Description;
	}

}