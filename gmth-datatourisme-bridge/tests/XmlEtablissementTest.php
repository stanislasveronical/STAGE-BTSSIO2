<?php

require_once __DIR__.'/../src/XmlEtablissement.php';

class XmlEtablissementTest extends PHPUnit\Framework\TestCase
{
    
    /**
     *
     * @var XmlEtablissement
     */
    private $_xml_etablissement = null;
    
    protected function setUp()
    {
        $this->_xml_etablissement = new XmlEtablissement();
    }
    
    protected function tearDown()
    {
        $this->_xml_etablissement = null;
    }
    
    public function test_setId()
    {
        $valeur_esperee = null;
        $this->_xml_etablissement->SetId($valeur_esperee);
        $valeur_recue = $this->_xml_etablissement->GetId();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetId() renvoie la même chose que SetId($Id).');
    }
    
    public function test_setNom()
    {
        $valeur_esperee = null;
        $this->_xml_etablissement->SetNom($valeur_esperee);
        $valeur_recue = $this->_xml_etablissement->GetNom();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetNom() renvoie la même chose que SetNom($Nom).');
    }
    
    public function test_setDateDerniereMiseAJour()
    {
        $valeur_esperee = null ;
        $this->_xml_etablissement->SetDateDerniereMiseAJour($valeur_esperee);
        $valeur_recue = $this->_xml_etablissement->GetDateDerniereMiseAJour();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetDateDerniereMiseAJour() renvoie la même chose que SetDateDerniereMiseAJour($DateDerniereMiseAJour).');    
    }
    
    public function test_setDescription()
    {
        $valeur_esperee = null;
        $this->_xml_etablissement->SetDescription($valeur_esperee);
        $valeur_recue = $this->_xml_etablissement->GetDescription();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetDescription() renvoie la même chose que SetDescription($DateDescription).');
    }
}