<?php
ini_set("memory_limit", "512M");

use Psr\Log\AbstractLogger;
use PhpExtended\Gmth\GmthApiDumpEndpoint;
use PhpExtended\Gmth\GmthBridgeQuery;
use PhpExtended\Gmth\GmthDataRepository;
use PhpExtended\Gmth\GmthApiPrivateEndpoint;
use PhpExtended\Gmth\GmthBridgeIterator;
use PhpExtended\Gmth\GmthApiEvaluation;
use PhpExtended\Gmth\GmthApiEtablissement;
use PhpExtended\Gmth\GmthBridgeEtablissement;
use PhpExtended\Gmth\GmthDataEtablissement;
use PhpExtended\Gmth\GmthBridgeEtat;
use PhpExtended\Gmth\GmthBridgeDemande;
use PhpExtended\Gmth\GmthBridgeActivite;
use PhpExtended\Json\JsonCollection;
use PhpExtended\Json\JsonException;
use PhpExtended\Json\JsonObject;
use PhpExtended\Gmth\GmthApiGrilleBloc; 
use PhpExtended\Gmth\GmthBridgeGrilleData;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/ApiReader.php';
require __DIR__.'/src/XmlWriterTest.php';
require __DIR__.'/src/XmlActivites.php';
require __DIR__.'/src/XmlCandidat.php';
require __DIR__.'/src/XmlClassements.php';
require __DIR__.'/src/XmlEtablissement.php';
require __DIR__.'/src/XmlLocalisation.php';

class BasicLogger extends AbstractLogger
{
    
    public function log($level, $message, array $context = array())
    {
        foreach($context as $key => $message) {
            echo "{$key} => {$message} ";
            $message=str_replace($context, $key, $message);   
        }
        
        $level="[".$level."]";
        
        $dt= new DateTime();
        $dtz = new DateTimeZone('Europe/Paris');
        $dt->setTimezone($dtz);
        $Fdt= "[".$dt->format("H:i:s")."]";
        
        echo $Fdt.$level.$message."\n";
    }
}
    
$proxy_host = 'http-pbind.proxyvip.alize:8080';
$proxy_user = "vstanislas-adc";
$proxy_pwd = "Vendredi13/2018";

$username = "veronical.stanislas@finances.gouv.fr";
$password = "Vendredi13/2018";

$logger = new BasicLogger();


@unlink(__DIR__.'/cookie.txt');

$r = new GmthDataRepository($e = new GmthApiPrivateEndpoint('https://demandes-gmth-recette.entreprises.gouv.fr', $logger, __DIR__.'/cookie.txt', $proxy_host, $proxy_user, $proxy_pwd));

$e->login($username, $password);

$query = new GmthBridgeQuery();
$query->addEtat($r->getEtatById("close"));





$xml = new XmlWriterTest();
$xml->OuvrirXML();

$a = new ApiReader();
$a->Read($r, $query, $e, $xml);

$xml->FermerXML();





return;

$xml = new XMLWriter();
$xml->openURI("test.xml");
$xml->startDocument("1.1","UTF-8"); 
$xml->setIndent(true);
$xml->setIndentString('    ');
$xml->startElement("Etablissements");

$iterator = $r->queryEtablissements($query);

//$i = 0;

foreach($iterator as $etablissement) {
    //$i++;
    
    /* @var $etablissement \PhpExtended\Gmth\GmthEtablissementInterface */
    // var_dump($etablissement);//die();
    
    $dbt=debug_backtrace();
    
    echo get_class($etablissement)."\n";
    
    $xml->startElement("Etablissement");
        $xml->writeElement("Id", $etablissement->getId());
        echo "EtablissementId : " .$etablissement->getId()."\n";
        $xml->writeElement("Nom", $etablissement->getNom());
        echo "EtablissementNom : " .$etablissement->getNom()."\n";
        
        /* @var $dateDerniereMiseAJour \PhpExtended\Gmth\GmthApiEtablissement */
        
        $dateDerniereMiseAJour = $e->getEtablissement($etablissement->getId(),true);
        $dDMaj = $dateDerniereMiseAJour->getUpdated();
        $xml->writeElement("DateDerniereMiseAJour",$dDMaj->format("Y-m-d"));
        echo "DateDerniereMiseAJour : ".$dDMaj->format("Y-m-d")."\n";
        
if ($etablissement->getDemandeActive() !== null){
    
        if ($etablissement->getDemandeActive()->getCandidature() !== null) {
            if ($etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature() !== null) {
  
                if ($etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature()->getData()->getQuestionByName("Etablissement_description") !== null) {
                    
                    $description = $etablissement->getDemandeActive()->getCandidature()->getGrilleCandidature()->getData()->getQuestionByName("Etablissement_description");
                    
                    $xml->writeElement("Description", $description->getValeurText());
                    echo "Description : ".$description->getValeurText()."\n";
                }
                
            }
        }

 
        if ($etablissement->getDemandeActive()->getCandidat() !== null){ 
        
            $candidat =$etablissement->getDemandeActive()->getCandidat();
    
    //var_dump($etablissement);
    
      
    /* @var $candidat \PhpExtended\Gmth\GmthCandidatInterface */
    //var_dump(is_null($candidat->getCivilite()->getId())); //die();
                 
    echo get_class($candidat)."\n";
    echo "CandidatNom : " .$candidat->getNom()."\n";
    echo "CandidatPrenom : " .$candidat->getPrenom()."\n";
    if ($candidat->getCivilite() !== null) {
        echo "CandidatCivilite : " .$candidat->getCivilite()->getId()."\n";
        if ($candidat->getCivilite()->getId() == "MME") {
            echo "CandidatGenre : Femme \n"; }
        else { echo "CandidatGenre : Homme \n"; }
        echo "CandidatCourriel : " .$candidat->getEmail()."\n";
        echo "CandidatTelephone : " .$candidat->getTelephone()."\n";
    }
    else{
        echo "CandidatCourriel : " .$candidat->getEmail()."\n";
        echo "CandidatTelephone : " .$candidat->getTelephone()."\n";
    }
        
    $xml->startElement("A_Ete_Cree_Par");
        $xml->writeElement("Nom", $candidat->getNom());
        $xml->writeElement("Prenom", $candidat->getPrenom());
        if ($candidat->getCivilite() !== null){
            $xml->writeElement("Civilite", $candidat->getCivilite()->getId());
            if ($candidat->getCivilite()->getId() == "MME") {
                $xml->writeElement("Genre", "Femme"); 
            }
            else { $xml->writeElement("Genre", "Homme"); }
            $xml->writeElement("Courriel", $candidat->getEmail());
            $xml->writeElement("Telephone", $candidat->getTelephone()); 
        }
        else {
        $xml->writeElement("Courriel", $candidat->getEmail());
        $xml->writeElement("Telephone", $candidat->getTelephone());  
        }
              
    $xml->endElement();     
    }
    

     $xml->startElement("Est_Localise_A");
         $commune =$etablissement->getCommune();
         
         if ($etablissement->getAdresse1() !== null) {
             echo "EtablissementAdresse1 : " .$etablissement->getAdresse1()."\n";
             $xml->writeElement("Adresse1", $etablissement->getAdresse1());
         }
         
         if ($etablissement->getAdresse2() !== null) {
             echo "EtablissementAdresse2 : " .$etablissement->getAdresse2()."\n";
             $xml->writeElement("Adresse2", $etablissement->getAdresse2());
         }
         
         if ($etablissement->getAdresse3() !== null) {
             echo "EtablissementAdresse3 : " .$etablissement->getAdresse3()."\n";
             $xml->writeElement("Adresse3", $etablissement->getAdresse3());
         }
         
         echo "Commune : " .$commune->getNom()."\n";
         $xml->writeElement("Commune", $commune->getNom());      
         
     $xml->endElement();
  
    $xml->startElement("Activites");
        $activites = $etablissement->getDemandeActive()->getActivites(); 
        foreach($activites as $activite) {
            /* @var $activite \PhpExtended\Gmth\GmthActiviteInterface */
            // var_dump($activite);//die();
    
            echo "Activite : " .$activite->getNom()."\n";
                $xml->writeElement("Activite", $activite->getNom()); 
    }
    $xml->endElement();

    
    if (!function_exists("compareDate")){
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
    
$lesDates = Array();  

//     $compareDate = compareDate($lesDates);
//     var_dump($compareDate);//die();
  
     if ($etablissement->getDemandeActive()->getDecisions() !== null){
        /* @var $decisions \PhpExtended\Gmth\GmthDecisionInterface[] */
        $decisions=$etablissement->getDemandeActive()->getDecisions();      
       
     foreach($decisions as $decision) {
        /* @var $decision \PhpExtended\Gmth\GmthDecisionInterface */
        $dateCommission = $decision->getDateCommission();
        $lesDates[] = $dateCommission;    
    }
    
    $dateLaPlusRecente = compareDate($lesDates);
    
    $laDecision = null;
    
    foreach($decisions as $decision) {
        $dateCommission = $decision->getDateCommission();
        if ($dateLaPlusRecente === $dateCommission) {
            $laDecision = $decision;
        }
    }
    
    if($laDecision !== null){
        
    $xml->startElement("Classements");
    
    $dateNotification = $decision->getDateNotification();
    

    if ($laDecision->getAuditifObtenu() !== null){
    $xml->startElement("Classement");
        if ($laDecision->getAuditifObtenu() == 1) {
            $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Auditif"); 
            echo "Marque Tourisme & Handicap - Pictogramme Auditif \n";
        
        $xml->writeElement("En_Cours","True");
        echo "Encours : True \n";
        if($dateCommission !== null){
            $xml->writeElement("Date_Delivrance",$dateCommission->format("Y-m-d"));
            echo "Date_Delivrance : ".$dateCommission->format("Y-m-d")."\n"; }
        if($dateNotification !== null){
            $xml->writeElement("Date_Publication",$dateNotification->format("Y-m-d")); 
            echo "Date_Publication : ".$dateNotification->format("Y-m-d")."\n"; }
        } 
    $xml->endElement();
    }
    
    if ($laDecision->getMentalObtenu() !== null) {
    $xml->startElement("Classement");
        if ($laDecision->getMentalObtenu() == 1) {
            $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Mental");
            echo "Marque Tourisme & Handicap - Pictogramme Mental \n";
        
        $xml->writeElement("En_Cours","True");
        echo "Encours : True \n";
        if($dateCommission !== null){
            $xml->writeElement("Date_Delivrance",$dateCommission->format("Y-m-d")); 
            echo "Date_Delivrance : ".$dateCommission->format("Y-m-d")."\n"; }
        if($dateNotification !== null){
            $xml->writeElement("Date_Publication",$dateNotification->format("Y-m-d")); 
            echo "Date_Publication : ".$dateNotification->format("Y-m-d")."\n"; }
        }
    $xml->endElement();
    }
    
    if ($laDecision->getMoteurObtenu() !== null) {
    $xml->startElement("Classement");
        if ($laDecision->getMoteurObtenu() == 1) {
            $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Moteur");
            echo "Marque Tourisme & Handicap - Pictogramme Moteur \n";
        
        $xml->writeElement("En_Cours","True");
        echo "Encours : True \n";
        if($dateCommission !== null){
            $xml->writeElement("Date_Delivrance",$dateCommission->format("Y-m-d")); 
            echo "Date_Delivrance : ".$dateCommission->format("Y-m-d")."\n"; }
        if($dateNotification !== null){
            $xml->writeElement("Date_Publication",$dateNotification->format("Y-m-d")); 
            echo "Date_Publication : ".$dateNotification->format("Y-m-d")."\n"; }
        }    
    $xml->endElement();
    }
    
    if ($laDecision->getVisuelObtenu() !== null) {
    $xml->startElement("Classement");
        if ($laDecision->getVisuelObtenu() == 1) {
            $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Visuel");
            echo "Marque Tourisme & Handicap - Pictogramme Visuel \n";
        
        $xml->writeElement("En_Cours","True");
        echo "Encours : True \n";
        if($dateCommission !== null){
            $xml->writeElement("Date_Delivrance",$dateCommission->format("Y-m-d")); 
            echo "Date_Delivrance : ".$dateCommission->format("Y-m-d")."\n";}
        if($dateNotification !== null){
            $xml->writeElement("Date_Publication",$dateNotification->format("Y-m-d")); 
            echo "Date_Publication : ".$dateNotification->format("Y-m-d")."\n"; }
        }    
    $xml->endElement();
    
    }
    $xml->endElement();
    }
    }
   
    }
    
    //if($i==20) break;
    
    $xml->endElement();
}

$xml->endElement();
$xml->endDocument();
$xml->flush();