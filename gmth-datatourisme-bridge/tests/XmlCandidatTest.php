<?php

require_once __DIR__.'/../src/XmlCandidat.php';

class XmlCandidatTest extends PHPUnit\Framework\TestCase
{
    
    /**
     *
     * @var XmlCandidat
     */
    private $_xml_candidat = null;
    
    protected function setUp()
    {
        $this->_xml_candidat = new XmlCandidat();
    }
    
    protected function tearDown()
    {
        $this->_xml_candidat = null;
    }
    
    public function test_setNom()
    {
        $valeur_esperee = null;
        $this->_xml_candidat->SetNom($valeur_esperee);
        $valeur_recue = $this->_xml_candidat->GetNom();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetNom() renvoie la même chose que SetNom($Nom).');
    }
    
    public function test_setPrenom()
    {
        $valeur_esperee = null;
        $this->_xml_candidat->SetPrenom($valeur_esperee);
        $valeur_recue = $this->_xml_candidat->GetPrenom();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetPrenom() renvoie la même chose que SetPrenom($Prenom).');
    }
    
    public function test_setCivilite()
    {
        $valeur_esperee = null;
        $this->_xml_candidat->SetCivilite($valeur_esperee);
        $valeur_recue = $this->_xml_candidat->GetCivilite();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetCivilite() renvoie la même chose que SetCivilite($Civilite).');
    }
    
    public function test_setGenre()
    {
        $valeur_esperee = null;
        $this->_xml_candidat->SetGenre($valeur_esperee);
        $valeur_recue = $this->_xml_candidat->GetGenre();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetGenre() renvoie la même chose que SetGenre($Genre).');
    }
    
    public function test_setEmail()
    {
        $valeur_esperee = null;
        $this->_xml_candidat->SetEmail($valeur_esperee);
        $valeur_recue = $this->_xml_candidat->GetEmail();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetEmail() renvoie la même chose que SetEmail($Email).');
    }
    
    public function test_setTelephone()
    {
        $valeur_esperee = null;
        $this->_xml_candidat->SetTelephone($valeur_esperee);
        $valeur_recue = $this->_xml_candidat->GetTelephone();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetTelephone() renvoie la même chose que SetTelephone($Telephone).');
    }
}