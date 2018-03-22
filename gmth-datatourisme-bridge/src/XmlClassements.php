<?php

class XmlClassements
{
    
    /**
     * 
     * @var bool
     */
    private $Auditif;
    
    /**
     *
     * @var bool
     */
    private $Mental;
    
    /**
     *
     * @var bool
     */
    private $Moteur;
    
    /**
     *
     * @var bool
     */
    private $Visuel;
    
    /**
     *
     * @var DateTime
     */
	private $DateDelivrance;
	
	/**
	 *
	 * @var DateTime
	 */
	private $DatePublication;
	
	/**
	 * 
	 * @param bool $Auditif
	 */
	public function SetAuditif($Auditif) {
	    $this->Auditif = $Auditif;
	}
	
	/**
	 * 
	 * @return boolean
	 */
	public function GetAuditif() {
	    return $this->Auditif;
	}
	
	/**
	 *
	 * @param bool $Mental
	 */
	public function SetMental($Mental) {
	    $this->Mental = $Mental;
	}
	
	/**
	 *
	 * @return boolean
	 */
	public function GetMental() {
	    return $this->Mental;
	}
	
	/**
	 *
	 * @param bool $Moteur
	 */
	public function SetMoteur($Moteur) {
	    $this->Moteur = $Moteur;
	}
	
	/**
	 *
	 * @return boolean
	 */
	public function GetMoteur() {
	    return $this->Moteur;
	}
	
	/**
	 *
	 * @param bool $Visuel
	 */
	public function SetVisuel($Visuel) {
	    $this->Visuel = $Visuel;
	}
	
	/**
	 *
	 * @return boolean
	 */
	public function GetVisuel() {
	    return $this->Visuel;
	}
	
	/**
	 *
	 * @param DateTime $DateDelivrance
	 */
	public function SetDateDelivrance(DateTime $DateDelivrance) {
	    $this->DateDelivrance = $DateDelivrance;
	}
	
	/**
	 *
	 * @return \DateTime
	 */
	public function GetDateDelivrance() {
	    return $this->DateDelivrance;
	}
	
	/**
	 *
	 * @param DateTime $DatePublication
	 */
	public function SetDatePublication(DateTime $DatePublication) {
	    $this->DatePublication = $DatePublication;
	}
	
	/**
	 *
	 * @return \DateTime
	 */
	public function GetDatePublication() {
	    return $this->DatePublication;
	}

}