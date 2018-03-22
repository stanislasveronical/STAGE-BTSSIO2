<?php

require_once __DIR__.'/../src/ApiReader.php';
require_once __DIR__.'/../src/XmlClassements.php';


class ApiReaderTest extends PHPUnit\Framework\TestCase
{
    /**
     *
     * @var ApiReader
     */
    private $_api_reader = null;
    
    protected function setUp()
    {
        $this->_api_reader = new ApiReader();
    }
    
    protected function tearDown()
    {
        $this->_api_reader = null;
    }
    
    public function test_compareDate()
    {
        $lesDates = Array();

        $valeur_esperee = new DateTime("@0");
        $valeur_recue = $this->_api_reader->compareDate($lesDates);
        //var_dump($lesDates);
        
        $this->assertEquals($valeur_esperee, $valeur_recue);
    }
    
    

}