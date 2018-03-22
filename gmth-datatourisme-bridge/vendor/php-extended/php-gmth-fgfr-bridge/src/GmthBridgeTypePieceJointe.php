<?php

namespace PhpExtended\Gmth;

class GmthBridgeTypePieceJointe implements GmthTypePieceJointeInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The type piece jointe data object.
	 * 
	 * @var GmthDataTypePieceJointe
	 */
	private $_type_piece_jointe = null;
	
	/**
	 * Builds a new GmthBridgeTypePieceJointe with the given data repository and
	 * type piece jointe.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataTypePieceJointe $typePieceJointe
	 */
	public function __construct(GmthDataRepository $repository, GmthDataTypePieceJointe $typePieceJointe)
	{
		$this->_repository = $repository;
		$this->_type_piece_jointe = $typePieceJointe;
	}
	
	/**
	 * Gets the type piece jointe data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataTypePieceJointe
	 */
	public function getDataTypePieceJointe()
	{
		return $this->_type_piece_jointe;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypePieceJointeInterface::getDemandes()
	 * @return GmthDemandeInterface[]
	 */
	public function getDemandes()
	{
		return $this->_repository->getDemandesByTypePieceJointeId($this->_type_piece_jointe->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypePieceJointeInterface::getPieceJointes()
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPieceJointes()
	{
		return $this->_repository->getPiecesJointesByTypePieceJointeId($this->_type_piece_jointe->id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypePieceJointeInterface::getId()
	 * @return integer
	 */
	public function getId()
	{
		return $this->_type_piece_jointe->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthTypePieceJointeInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_type_piece_jointe->libelle;
	}
	
}
