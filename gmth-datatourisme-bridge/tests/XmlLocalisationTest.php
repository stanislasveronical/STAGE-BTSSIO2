<?php

require_once __DIR__.'/../src/XmlLocalisation.php';

class XmlLocalisationTest extends PHPUnit\Framework\TestCase
{
    /**
     *
     * @var XmlLocalisation
     */
    private $_xml_localisation = null;
    
    protected function setUp()
    {
        $this->_xml_localisation = new XmlLocalisation();
    }
    
    protected function tearDown()
    {
        $this->_xml_localisation = null;
    }
    
    public function test_setAdresse1()
    {
        $valeur_esperee = null;
        $this->_xml_localisation->SetAdresse1($valeur_esperee);
        $valeur_recue = $this->_xml_localisation->GetAdresse1();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetAdresse1() renvoie la même chose que SetAdresse1($Adresse1).');
    }
    
    public function test_setAdresse2()
    {
        $valeur_esperee = null;
        $this->_xml_localisation->SetAdresse2($valeur_esperee);
        $valeur_recue = $this->_xml_localisation->GetAdresse2();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetAdresse2() renvoie la même chose que SetAdresse2($Adresse2).');
    }
    
    public function test_setAdresse3()
    {
        $valeur_esperee = null;
        $this->_xml_localisation->SetAdresse3($valeur_esperee);
        $valeur_recue = $this->_xml_localisation->GetAdresse3();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetAdresse3() renvoie la même chose que SetAdresse3($Adresse3).');
    }
    
    public function test_setCommune()
    {
        $valeur_esperee = null;
        $this->_xml_localisation->SetCommune($valeur_esperee);
        $valeur_recue = $this->_xml_localisation->GetCommune();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetCommune() renvoie la même chose que SetCommune($Commune).');
    }
    
    
}