<?php

namespace PhpExtended\Gmth;

class GmthBridgeObservation implements GmthObservationInterface
{
	
	/**
	 * The repository for all data.
	 * 
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The observation data object.
	 * 
	 * @var GmthDataObservation
	 */
	private $_observation = null;
	
	/**
	 * Builds a new GmthBridgeObservation with the given data repository and observation.
	 *
	 * @param GmthDataRepository $repository
	 * @param GmthDataObservation $observation
	 */
	public function __construct(GmthDataRepository $repository, GmthDataObservation $observation)
	{
		$this->_repository = $repository;
		$this->_observation = $observation;
	}
	
	/**
	 * Gets the observation data.
	 * 
	 * @return \PhpExtended\Gmth\GmthDataObservation
	 */
	public function getDataObservation()
	{
		return $this->_observation;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthObservationInterface::getDemande()
	 * @return GmthDemandeInterface
	 */
	public function getDemande()
	{
		return $this->_repository->getDemandeById($this->_observation->demande_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthObservationInterface::getAuteur()
	 * @return GmthUtilisateurInterface
	 */
	public function getAuteur()
	{
		return $this->_repository->getUtilisateurById($this->_observation->auteur_id);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthObservationInterface::getId()
	 * @return string
	 */
	public function getId()
	{
		return $this->_observation->id;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthObservationInterface::getDateEcriture()
	 * @return \DateTime
	 */
	public function getDateEcriture()
	{
		return $this->_observation->date;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthObservationInterface::getText()
	 * @return string
	 */
	public function getText()
	{
		return $this->_observation->text;
	}
	
}
