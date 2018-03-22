<?php

use PhpExtended\Gmth\GmthBridgeQuery;
use PhpExtended\Gmth\GmthDataRepository;
use PhpExtended\Gmth\GmthApiPrivateEndpoint;

class ApiReader
{
    private $_repository;
    private $_query;
    private $_e;
    
    private $_xml;
    
    public function Read(GmthDataRepository $repository, GmthBridgeQuery $query, GmthApiPrivateEndpoint $e, XmlWriterTest $xml)
    {    
        $this->_repository = $repository;
        $this->_query = $query;
        $this->_e = $e;
        
        $this->_xml = $xml;
        
        $iterator = $repository->queryEtablissements($query);
        
        $i = 0;
        
    	foreach($iterator as $etablissement) {
    	    
    	    $i++;
    	    
    	    /* @var $etablissement \PhpExtended\Gmth\GmthEtablissementInterface */
    	    
    	    $_etablissement = new XmlEtablissement();
    	    
    	    $_etablissement->SetId($etablissement->getId());
    	    echo $_etablissement->GetId() ."\n";
    	    
    	    $_etablissement->SetNom($etablissement->getNom());
    	    echo $_etablissement->GetNom()."\n";
    	    
    	    $dateDerniereMiseAJour = $e->getEtablissement($etablissement->getId(),true);
    	    $dDMaj = $dateDerniereMiseAJour->getUpdated();
    	    $_etablissement->SetDateDerniereMiseAJour($dDMaj->format("Y-m-d"));
    	    echo $_etablissement->GetDateDerniereMiseAJour()."\n";
    	    
    	    if ($etablissement->getDemandeActive() !== null){
    		if ($etablissement->getDemandeActive()->getCandidature() !== null) {
     		if ($etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature() !== null) {
		    if ($etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature()->getData() !== null) {
			if ($etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature()->getData()->getQuestionByName("Etablissement_description") !== null) {
    	        
        	    $description = $etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature()->getData()->getQuestionByName("Etablissement_description");
       	        $_etablissement->SetDescription($description->getValeurText());
       	        echo $_etablissement->GetDescription()."\n";
       	        
			} } } } }
			
			$xml->AjouterEtablissement($_etablissement);
			
		
    	    if ($etablissement->getDemandeActive()->getCandidat() !== null){
        	    $candidat = $etablissement->getDemandeActive()->getCandidat(); 
        	    /* @var $candidat \PhpExtended\Gmth\GmthCandidatInterface */
        	    
    	        $_candidat = new XmlCandidat();
    	        
        	    $_candidat->SetNom($candidat->getNom());
        	    echo $_candidat->GetNom() ."\n";
        	    
        	    $_candidat->SetPrenom($candidat->getPrenom());
        	    echo $_candidat->GetPrenom() ."\n";
        	    
        	    if ($candidat->getCivilite() !== null){
            	    $_candidat->SetCivilite($candidat->getCivilite()->getId());
            	    echo $_candidat->GetCivilite() ."\n";
        	    }
        	    $_candidat->SetEmail($candidat->getEmail());
        	    echo $_candidat->GetEmail()."\n";
        	    
        	    $_candidat->SetTelephone($candidat->getTelephone());
        	    echo $_candidat->GetTelephone()."\n";
    	    }
    	    
    	    $xml->AjouterCandidat($_candidat);
    	    
    	    
            $_localisation = new XmlLocalisation();
    	    
    	    $commune = $etablissement->getCommune();
    	    
    	    $_localisation->SetAdresse1($etablissement->getAdresse1());
    	    echo $_localisation->GetAdresse1() ."\n";
    	    
    	    $_localisation->SetAdresse2($etablissement->getAdresse2());
    	    echo $_localisation->GetAdresse2() ."\n";
    	    
    	    $_localisation->SetAdresse3($etablissement->getAdresse3());
    	    echo $_localisation->GetAdresse3() ."\n";
    	    
    	    $_localisation->SetCommune($commune->getNom());
    	    echo $_localisation->GetCommune() ."\n";
    	    
    	    $xml->AjouterLocalisation($_localisation);
    	    
    	    
    	    $_activites = new XmlActivites();
    	    
            $activites = $etablissement->getDemandeActive()->getActivites();
            /* @var $activites \PhpExtended\Gmth\GmthActiviteInterface */
            
            foreach($activites as $activite) {
                $_activites->SetActivite($activite->getNom());
                echo $_activites->GetActivite() . "\n";
            }
    	    
            $xml->AjouterActivites($_activites);
            
            
            $_classements = new XmlClassements();
            $lesDates = Array();
             
            if ($etablissement->getDemandeActive()->getDecisions() !== null){
                /* @var $decisions \PhpExtended\Gmth\GmthDecisionInterface[] */
                $decisions=$etablissement->getDemandeActive()->getDecisions();
                           
                foreach($decisions as $decision) {
                    /* @var $decision \PhpExtended\Gmth\GmthDecisionInterface */
                    $_classements->SetDateDelivrance($decision->getDateCommission());
                    $lesDates[] = $_classements->GetDateDelivrance();
                }
                
                $dateLaPlusRecente = $this->compareDate($lesDates);
                
                $laDecision = null;
  
                foreach($decisions as $decision) {
                    /* @var $decision \PhpExtended\Gmth\GmthDecisionInterface */
                    $_classements->SetDateDelivrance($decision->getDateCommission());
                    
                    if ($dateLaPlusRecente->format("Y-m-d") === $_classements->GetDateDelivrance()->format("Y-m-d")) {
                        
                        var_dump($dateLaPlusRecente);
                        var_dump($_classements);
                        
                        $laDecision = $decision;
                        //echo $laDecision;
                    }
                }
                
                if($laDecision !== null){
                    
                    $_classements->SetAuditif($laDecision->getAuditifObtenu());
                    echo $_classements->GetAuditif(). "\n";
                    $_classements->SetMental($laDecision->getMentalObtenu());
                    echo $_classements->GetMental(). "\n";
                    $_classements->SetMoteur($laDecision->getMoteurObtenu());
                    echo $_classements->GetMoteur(). "\n";
                    $_classements->SetVisuel($laDecision->getVisuelObtenu());
                    echo $_classements->GetVisuel(). "\n";
                    
                    if($laDecision->getDateNotification() !== null){
                
                        $_classements->SetDatePublication($laDecision->getDateNotification());
                        //echo $_classements->GetDatePublication() . "\n";
                    }
                }       
            }
            
            $xml->AjouterClassements($_classements);
            
    	    if($i==10) break;
    	}
 
    }
   
        function compareDate(Array $dates = Array()) : DateTime
        {
            $dRecent = new DateTime("@0");
            
            foreach($dates as $date) {
                if ($date != null){
                    if ($dRecent->getTimestamp() < $date->getTimestamp()) {
                        $dRecent = $date;
                    }
                }
            }
            return $dRecent;
        }
    
    
}