<?php

namespace PhpExtended\Gmth;

/**
 * GmthPieceJointeInterface interface file.
 * 
 * This interface represents a piece jointe object and its relations.
 * 
 * @author Anastaszor
 */
interface GmthPieceJointeInterface
{
	
	/**
	 * Gets the demande related to this piece jointe.
	 * 
	 * @return GmthDemandeInterface
	 */
	public function getDemande();
	
	/**
	 * Gets the type piece jointe related to this piece jointe.
	 * 
	 * @return GmthTypePieceJointeInterface
	 */
	public function getTypePieceJointe();
	
	/**
	 * Gets the id of this piece jointe.
	 * 
	 * @return string
	 */
	public function getId();
	
	/**
	 * Gets the nom of this piece jointe.
	 * 
	 * @return string
	 */
	public function getNom();
	
	/**
	 * Gets the taille of this piece jointe.
	 * 
	 * @return string
	 */
	public function getTaille();
	
	/**
	 * Gets the binary raw data of the file.
	 * 
	 * @return string binary raw data
	 * @throws \RuntimeException if the document failed to load.
	 */
	public function getRawData();
	
}
