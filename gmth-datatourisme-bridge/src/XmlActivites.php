<?php

class XmlActivites
{
    /**
     *
     * @var string
     */
	private $Activite;
	
	/**
	 *
	 * @param string $Activite
	 */
	public function SetActivite($Activite) {
	    $this->Activite = $Activite;
	}
	
	/**
	 *
	 * @return string
	 */
	public function GetActivite() {
	    return $this->Activite;
	}
	
}