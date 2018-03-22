<?php

namespace PhpExtended\Gmth;

/**
 * GmthDepartementInterface interface file.
 * 
 * This interface represents a departement object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthDepartementInterface
{
	
	/**
	 * Gets the communes that are inside this departement.
	 * 
	 * @return GmthCommuneInterface[]
	 */
	public function getCommunes();
	
	/**
	 * Gets the region in which this departement is.
	 * 
	 * @return GmthRegionInterface
	 */
	public function getRegion();
	
	/**
	 * Gets the id of the departement.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the nom of the departement.
	 * 
	 * @return string
	 */
	public function getNom();
	
}
