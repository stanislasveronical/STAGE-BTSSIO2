<?php

namespace PhpExtended\Gmth;

/**
 * GmthTypePieceJointeInterface interface file.
 * 
 * This interface represents a type piece jointe and its relations.
 * 
 * @author Anastaszor
 */
interface GmthTypePieceJointeInterface
{
	
	/**
	 * Gets the demandes this type piece jointe is asked for.
	 * 
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes();
	
	/**
	 * Gets the pieces jointes this type piece jointe is linked to.
	 * 
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPieceJointes();
	
	/**
	 * Gets the id of this type piece jointe.
	 * 
	 * @return integer
	 */
	public function getId();
	
	/**
	 * Gets the libelle of this type piece jointe.
	 * 
	 * @return string
	 */
	public function getLibelle();
	
}
