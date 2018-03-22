<?php

namespace PhpExtended\Gmth;

/**
 * GmthCommuneInterface interface file.
 * 
 * This interface represents a commune object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthCommuneInterface
{
	
	/**
	 * Gets the departement in which this commune is.
	 * 
	 * @return GmthDepartementInterface
	 */
	public function getDepartement();
	
	/**
	 * Gets the etablissements that are in this commune.
	 * 
	 * @return GmthEtablissementInterface[]
	 */
	public function getEtablissements();
	
	/**
	 * Gets the id of this commune.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the nom of this commune.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the code insee of this commune.
	 * 
	 * @return string
	 */
	public function getCodeInsee();
	
	/**
	 * Gets the code postal of this commune.
	 * 
	 * @return string
	 */
	public function getCodePostal();
	
}
