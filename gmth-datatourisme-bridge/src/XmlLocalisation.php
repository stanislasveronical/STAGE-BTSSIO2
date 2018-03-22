<?php

class XmlLocalisation
{
    /**
     *
     * @var string
     */
	private $Adresse1;
	
	/**
	 *
	 * @var string
	 */
	private $Adresse2;
	
	/**
	 *
	 * @var string
	 */
	private $Adresse3;
	
	/**
	 *
	 * @var string
	 */
	private $Commune;
	
	/**
	 *
	 * @param string $Adresse1
	 */
	public function SetAdresse1($Adresse1) {
	    $this->Adresse1 = $Adresse1;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetAdresse1() {
	    return $this->Adresse1;
	}

	/**
	 *
	 * @param string $Adresse2
	 */
	public function SetAdresse2($Adresse2) {
	    $this->Adresse2 = $Adresse2;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetAdresse2() {
	    return $this->Adresse2;
	}
	
	/**
	 *
	 * @param string $Adresse3
	 */
	public function SetAdresse3($Adresse3) {
	    $this->Adresse3 = $Adresse3;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetAdresse3() {
	    return $this->Adresse3;
	}
	
	/**
	 *
	 * @param string $Commune
	 */
	public function SetCommune($Commune) {
	    $this->Commune = $Commune;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetCommune() {
	    return $this->Commune;
	}

}