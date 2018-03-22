<?php

namespace PhpExtended\Gmth;

class GmthBridgeGrilleData implements GmthGrilleDataInterface
{
	
	const BLOC_CLASS_CHAPTER  = 'grid-row-h1';
	const BLOC_CLASS_SECTION  = 'grid-row-h2';
	const BLOC_CLASS_QUESLIST = 'grid-row-h3';
	const BLOC_CLASS_HEADER   = 'grid-row-eval';
	const BLOC_CLASS_QUESTION = 'grid-row-question';
	const BLOC_CLASS_DUPLICAT = 'grid-row-button';
	
	/**
	 * The repository for all data.
	 *
	 * @var GmthDataRepository
	 */
	private $_repository = null;
	
	/**
	 * The etat data object.
	 *
	 * @var GmthApiGrilleData
	 */
	private $_data = null;
	
	/**
	 * Builds a new GmthBridgeGrilleData with the given repository class
	 * and the effective data.
	 * 
	 * @param GmthDataRepository $repository
	 * @param GmthApiGrilleData $data
	 */
	public function __construct(GmthDataRepository $repository, GmthApiGrilleData $data)
	{
		$this->_repository = $repository;
		$this->_data = $data;
	}
	
	/**
	 * Gets the grille data.
	 * 
	 * @return \PhpExtended\Gmth\GmthApiGrilleData
	 */
	public function getDataGrilleData()
	{
		return $this->_data;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleDataInterface::getQuestion()
	 * @return GmthQuestionInterface
	 */
	public function getQuestion($variableId)
	{
		foreach($this->_data->getBlocs() as $block)
		{
			/* @var $block \PhpExtended\Gmth\GmthApiGrilleBloc */
			if($block->getLabel() === $variableId)
			{
				if($block->getClass() === self::BLOC_CLASS_QUESTION)
				{
					return new GmthBridgeQuestion($this->_repository, $block);
				}
				return null;
			}
		}
		return null;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \PhpExtended\Gmth\GmthGrilleDataInterface::getQuestions()
	 * @return \Iterator[GmthQuestionInterface]
	 */
	public function getQuestions()
	{
		return new GmthBridgeIterator($this->_data->getBlocs(),
			$this->_repository, '\PhpExtended\Gmth\GmthBridgeQuestion');
	}
	
}
