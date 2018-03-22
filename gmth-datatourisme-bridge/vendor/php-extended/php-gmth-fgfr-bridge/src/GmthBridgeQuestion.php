<?php

namespace PhpExtended\Gmth;

class GmthBridgeQuestion implements GmthQuestionInterface
{
	
	/**
	 * The repository for all data.
	 *
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The etat data object.
	 *
	 * @var GmthApiGrilleBloc
	 */
	private $_bloc = null;
	
	/**
	 * Builds a new GmthBridgeQuestion with the given bloc.
	 * 
	 * @param GmthDataRepository $repository
	 * @param GmthApiGrilleBloc $bloc
	 */
	public function __construct(GmthDataRepository $repository, GmthApiGrilleBloc $bloc)
	{
		$this->_repository = $repository;
		$this->_bloc = $bloc;
	}
	
	/**
	 * Gets the bloc question data.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleBloc
	 */
	public function getDataGrilleBloc()
	{
		return $this->_bloc;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getVariable()
	 * @return string
	 */
	public function getVariable()
	{
		return $this->_bloc->getVariable();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getLibelle()
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->_bloc->getLabel();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getHelptext()
	 * @return string
	 */
	public function getHelptext()
	{
		return $this->_bloc->getHelp();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getValeurNc()
	 * @return boolean
	 */
	public function getValeurNc()
	{
		if($this->_bloc->getResponse() === null)
			return false;
		if($this->_bloc->getResponse()->getNc() === null)
			return false;
		return $this->_bloc->getResponse()->getNc()->getUse()
			&& $this->_bloc->getResponse()->getNc()->getInput() === 'checked';
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getValeurChoix()
	 * @return boolean
	 */
	public function getValeurChoix()
	{
		if($this->_bloc->getResponse() === null)
			return false;
		if($this->_bloc->getResponse()->getChoix() === null)
			return false;
		return $this->_bloc->getResponse()->getChoix()->getUse()
			&& ((
				$this->_bloc->getResponse()->getChoix()->getType() === 'evaluation_choix_oui'
				&& $this->_bloc->getResponse()->getChoix()->getInput() === 'Oui'
				)
			|| (
				$this->_bloc->getResponse()->getChoix()->getType() === 'evaluation_choix_non'
				&& $this->_bloc->getResponse()->getChoix()->getInput() === 'Non'
				)
			|| (
				$this->_bloc->getResponse()->getChoix()->getType() === 'evaluation_choix'
			));
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getValeurText()
	 * @return string
	 */
	public function getValeurText()
	{
		if($this->_bloc->getResponse() === null)
			return null;
		if($this->_bloc->getResponse()->getValeur() === null)
			return null;
		return $this->_bloc->getResponse()->getValeur()->getInput();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getCommentaire()
	 * @return string
	 */
	public function getCommentaire()
	{
		if($this->_bloc->getResponse() === null)
			return null;
		if($this->_bloc->getResponse()->getComment() === null)
			return null;
		return $this->_bloc->getResponse()->getComment()->getInput();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getPieceJointes()
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPieceJointes()
	{
		if($this->_bloc->getResponse() === null)
			return array();
		if($this->_bloc->getResponse()->getUpload() === null)
			return array();
		$piecesJointe = array();
		foreach($this->_bloc->getResponse()->getUpload()->getInput() as $pjid)
		{
			$piecesJointe[] = $this->_repository->getPieceJointeById($pjid);
		}
		return $piecesJointe;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoAuditif()
	 * @return boolean
	 */
	public function isForPictoAuditif()
	{
		if($this->_bloc->getResponse() === null)
			return false;
		if($this->_bloc->getResponse()->getAuditif() === null)
			return false;
		return $this->_bloc->getResponse()->getAuditif()->getUse();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoMental()
	 * @return boolean
	 */
	public function isForPictoMental()
	{
		if($this->_bloc->getResponse() === null)
			return false;
		if($this->_bloc->getResponse()->getMental() === null)
			return false;
		return $this->_bloc->getResponse()->getMental()->getUse();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoMoteur()
	 * @return boolean
	 */
	public function isForPictoMoteur()
	{
		if($this->_bloc->getResponse() === null)
			return false;
		if($this->_bloc->getResponse()->getMoteur() === null)
			return false;
		return $this->_bloc->getResponse()->getMoteur()->getUse();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoVisuel()
	 * @return boolean
	 */
	public function isForPictoVisuel()
	{
		if($this->_bloc->getResponse() === null)
			return false;
		if($this->_bloc->getResponse()->getVisuel() === null)
			return false;
		return $this->_bloc->getResponse()->getVisuel()->getUse();
	}
	
}
