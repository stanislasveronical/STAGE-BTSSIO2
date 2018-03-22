<?php

namespace PhpExtended\Gmth;

/**
 * GmthTypeClassementInterface interface file.
 * 
 * This interface represents a type classement object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthTypeClassementInterface
{
	
	/**
	 * Gets the etablissement that have this type classement.
	 * 
	 * @return GmthEtablissementInterface[]
	 */
	public function getEtablissements();
	
	/**
	 * Gets the id of this type classement.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this type classement.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
