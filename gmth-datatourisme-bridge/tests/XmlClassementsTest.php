<?php

require_once __DIR__.'/../src/XmlClassements.php';
 
class XmlClassementsTest extends PHPUnit\Framework\TestCase
{
    
    /**
     * 
     * @var XmlClassements
     */
    private $_xml_classement = null;
    
    protected function setUp()
    {
        $this->_xml_classement = new XmlClassements();
    }
    
    protected function tearDown()
    {
        $this->_xml_classement = null;
    }
    
    public function test_setAuditif()
    {
        $valeur_esperee = true;
        $this->_xml_classement->SetAuditif($valeur_esperee);
        $valeur_recue = $this->_xml_classement->GetAuditif();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetAuditif() renvoie la même chose que SetAuditif($Auditif).');
    }
    
    public function test_setMental()
    {
        $valeur_esperee = true;
        $this->_xml_classement->SetMental($valeur_esperee);
        $valeur_recue = $this->_xml_classement->GetMental();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetMental() renvoie la même chose que SetMental($Mental).');
    }
    
    public function test_setMoteur()
    {
        $valeur_esperee = true;
        $this->_xml_classement->SetMoteur($valeur_esperee);
        $valeur_recue = $this->_xml_classement->GetMoteur();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetMoteur() renvoie la même chose que SetMoteur($Moteur).');
    }
    
    public function test_setVisuel()
    {
        $valeur_esperee = true;
        $this->_xml_classement->SetVisuel($valeur_esperee);
        $valeur_recue = $this->_xml_classement->GetVisuel();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetVisuel() renvoie la même chose que SetVisuel($Visuel).');
    }
    
    public function test_setDateDelivrance()
    {
        $valeur_esperee = new DateTime("@0");
        $this->_xml_classement->SetDateDelivrance($valeur_esperee);
        $valeur_recue = $this->_xml_classement->GetDateDelivrance();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetDateDelivrance() renvoie la même chose que SetDateDelivrance($DateDelivrance).');
    }
    
    public function test_setDatePublication()
    {
        $valeur_esperee = new DateTime("@0");
        $this->_xml_classement->SetDatePublication($valeur_esperee);
        $valeur_recue = $this->_xml_classement->GetDatePublication();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetDatePublication() renvoie la même chose que SetDatePublication($DatePublication).');
    }
}