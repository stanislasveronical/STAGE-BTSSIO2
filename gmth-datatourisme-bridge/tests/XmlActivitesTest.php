<?php

require_once __DIR__.'/../src/XmlActivites.php';

class XmlActivitesTest extends PHPUnit\Framework\TestCase
{
    
    /**
     *
     * @var XmlActivites
     */
    private $_xml_activite = null;
    
    protected function setUp()
    {
        $this->_xml_activite = new XmlActivites();
    }
    
    protected function tearDown()
    {
        $this->_xml_activite = null;
    }
    
    public function test_setActivite()
    {
        $valeur_esperee = null;
        $this->_xml_activite->SetActivite($valeur_esperee);
        $valeur_recue = $this->_xml_activite->GetActivite();
        
        $this->assertEquals($valeur_esperee, $valeur_recue, 'Il faut que GetActivite() renvoie la même chose que SetActivite($Activite).');
    }
}