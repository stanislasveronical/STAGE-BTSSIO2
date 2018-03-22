<?php

namespace PhpExtended\Gmth;

class GmthBridgePieceJointe implements GmthPieceJointeInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The piece jointe data object.
	 * 
	 * @var GmthDataPieceJointe
	 */
	private $_piece_jointe = null;
	
	/**
	 * Builds a new GmthBridgePieceJointe with the given data repository and piece jointe.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataPieceJointe $pieceJointe
	 */
	public function __construct(GmthDataRepository $repository, GmthDataPieceJointe $pieceJointe)
	{
		$this->_repository = $repository;
		$this->_piece_jointe = $pieceJointe;
	}
	
	/**
	 * Gets the piece jointe data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataPieceJointe
	 */
	public function getDataPieceJointe()
	{
		return $this->_piece_jointe;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthPieceJointeInterface::getDemande()
	 * @return GmthDemandeInterface
	 */
	public function getDemande()
	{
		return $this->_repository->getDemandeById($this->_piece_jointe->demande_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthPieceJointeInterface::getTypePieceJointe()
	 * @return GmthTypePieceJointeInterface
	 */
	public function getTypePieceJointe()
	{
		return $this->_repository->getTypePieceJointeById($this->_piece_jointe->type_piece_jointe_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthPieceJointeInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_piece_jointe->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthPieceJointeInterface::getNom()
	 * @return string
	 */
	public function getNom()
	{
		return $this->_piece_jointe->nom;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthPieceJointeInterface::getTaille()
	 * @return string
	 */
	public function getTaille()
	{
		return $this->_piece_jointe->taille;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthPieceJointeInterface::getRawData()
	 * @return string binary raw data
	 */
	public function getRawData()
	{
		return $this->_repository->getPieceJointeRawData($this->_piece_jointe);
	}
	
}
