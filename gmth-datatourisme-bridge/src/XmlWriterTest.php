<?php

class XmlWriterTest
{
    
    private $_xml;
    private $_xmlEtablissement;
    
    public function OuvrirXML()
    {
        $xml = new XMLWriter();
        $xml->openURI("test.xml");
		$xml->startDocument("1.1","UTF-8"); 
		$xml->setIndent(true);
		$xml->setIndentString('    ');
		$xml->startElement("Etablissements");
		$this->_xml = $xml;
    }
    
    public function FermerXML()
    {
        $xml= $this->_xml;
        $xml->endElement();
        $xml->endDocument();
        $xml->flush();
    }
    
	public function AjouterEtablissement(XmlEtablissement $xmlEtablissement)
    {
        $xml= $this->_xml;
        $xml->startElement("Etablissement");
            $xml->writeElement("Id", $xmlEtablissement->GetId()); 
			$xml->writeElement("Nom", $xmlEtablissement->GetNom());
			$xml->writeElement("DateDerniereMiseAJour",$xmlEtablissement->GetDateDerniereMiseAJour());
			$xml->writeElement("Description", $xmlEtablissement->GetDescription());
		
	}
	
	public function AjouterCandidat(XmlCandidat $xmlCandidat)
	{
	    $xml= $this->_xml;
	    $xml->startElement("A_Ete_Cree_Par");
    	    $xml->writeElement("Nom", $xmlCandidat->GetNom());
    	    $xml->writeElement("Prenom", $xmlCandidat->GetPrenom());
    	    if ($xmlCandidat->GetCivilite() !== null){
    	        $xml->writeElement("Civilite", $xmlCandidat->GetCivilite());
    	        if ($xmlCandidat->GetCivilite() == "MME") {
    	            $xml->writeElement("Genre", "Femme");
    	        }
    	        else { $xml->writeElement("Genre", "Homme"); }
    	        $xml->writeElement("Courriel", $xmlCandidat->GetEmail());
    	        $xml->writeElement("Telephone", $xmlCandidat->GetTelephone());
    	    }
    	    else {
    	        $xml->writeElement("Courriel", $xmlCandidat->GetEmail());
    	        $xml->writeElement("Telephone", $xmlCandidat->GetTelephone());
    	    }
	    $xml->endElement();   
	}
	
	public function AjouterLocalisation(XmlLocalisation $xmlLocalisation)
	{
	    $xml= $this->_xml;
	    $xml->startElement("Est_Localise_A");
	    
	        if ($xmlLocalisation->GetAdresse1() !== null) {
    	        $xml->writeElement("Adresse1", $xmlLocalisation->GetAdresse1());
    	    }
    	    
    	    if ($xmlLocalisation->GetAdresse2() !== null) {
    	        $xml->writeElement("Adresse2", $xmlLocalisation->GetAdresse2());
    	    }
    	    
    	    if ($xmlLocalisation->GetAdresse3() !== null) {
    	        $xml->writeElement("Adresse3", $xmlLocalisation->GetAdresse3());
    	    }
    	    $xml->writeElement("Commune", $xmlLocalisation->GetCommune());
	    
	    $xml->endElement();
	    
	}
	
	public function AjouterActivites(XmlActivites $xmlActivites)
	{
	    $xml= $this->_xml;
	    $xml->startElement("Activites");
	    
	       $xml->writeElement("Activite", $xmlActivites->GetActivite());

	    $xml->endElement();
	    
	}
	
	public function AjouterClassements(XmlClassements $xmlClassements)
	{
	    $xml= $this->_xml;
	    $xml->startElement("Classements");
       
	    if ($xmlClassements->GetAuditif() !== null){
	       $xml->startElement("Classement");
	      if ($xmlClassements->GetAuditif() == 1) {
	           $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Auditif");
	               
	               
	               $xml->writeElement("En_Cours","True");
	              
	               if($xmlClassements->GetDateDelivrance() !== null){
	                   $xml->writeElement("Date_Delivrance",$xmlClassements->GetDateDelivrance()->format("Y-m-d"));
	               }
	               if($xmlClassements->GetDatePublication() !== null){
	                   $xml->writeElement("Date_Publication",$xmlClassements->GetDatePublication()->format("Y-m-d"));
	               }
	           }
	           $xml->endElement();
	       }
	       
	       if ($xmlClassements->GetMental() !== null) {
	           $xml->startElement("Classement");
	           if ($xmlClassements->GetMental() == 1) {
	               $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Mental");
	               
	               
	               $xml->writeElement("En_Cours","True");
	               
	               if($xmlClassements->GetDateDelivrance() !== null){
	                   $xml->writeElement("Date_Delivrance",$xmlClassements->GetDateDelivrance()->format("Y-m-d"));
	                    }
	                    if($xmlClassements->GetDatePublication() !== null){
	                        $xml->writeElement("Date_Publication",$xmlClassements->GetDatePublication()->format("Y-m-d"));
	                        }
	           }
	           $xml->endElement();
	       }
	       
	       if ($xmlClassements->GetMoteur() !== null) {
	           $xml->startElement("Classement");
	           if ($xmlClassements->GetMoteur() == 1) {
	               $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Moteur");
	               
	               
	               $xml->writeElement("En_Cours","True");
	               
	               if($xmlClassements->GetDateDelivrance() !== null){
	                   $xml->writeElement("Date_Delivrance",$xmlClassements->GetDateDelivrance()->format("Y-m-d"));
	                    }
	                    if($xmlClassements->GetDatePublication() !== null){
	                        $xml->writeElement("Date_Publication",$xmlClassements->GetDatePublication()->format("Y-m-d"));
	                        }
	           }
	           $xml->endElement();
	       }
	       
	       if ($xmlClassements->GetVisuel() !== null) {
	           $xml->startElement("Classement");
	           if ($xmlClassements->GetVisuel() == 1) {
	               $xml->writeElement("Label","Marque Tourisme & Handicap - Pictogramme Visuel");
	               
	               
	               $xml->writeElement("En_Cours","True");
	               
	               if($xmlClassements->GetDateDelivrance() !== null){
	                   $xml->writeElement("Date_Delivrance",$xmlClassements->GetDateDelivrance()->format("Y-m-d"));
	                   }
	                   if($xmlClassements->GetDatePublication() !== null){
	                       $xml->writeElement("Date_Publication",$xmlClassements->GetDatePublication()->format("Y-m-d"));
	                       }
	           }
	           $xml->endElement();
	           
	       }

	    $xml->endElement();
	    
	    $xml->endElement();
	    
	}
	
}