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
		$this->_repository;
		$this->_bloc;
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
		return $this->_bloc->getResponse()->getValeur()->getInput();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getCommentaire()
	 * @return string
	 */
	public function getCommentaire()
	{
		return $this->_bloc->getResponse()->getComment()->getInput();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::getPieceJointes()
	 * @return GmthPieceJointeInterface[]
	 */
	public function getPieceJointes()
	{
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
		return $this->_bloc->getResponse()->getAuditif()->getUse();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoMental()
	 * @return boolean
	 */
	public function isForPictoMental()
	{
		return $this->_bloc->getResponse()->getMental()->getUse();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoMoteur()
	 * @return boolean
	 */
	public function isForPictoMoteur()
	{
		return $this->_bloc->getResponse()->getMoteur()->getUse();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthQuestionInterface::isForPictoVisuel()
	 * @return boolean
	 */
	public function isForPictoVisuel()
	{
		return $this->_bloc->getResponse()->getVisuel()->getUse();
	}
	
}
