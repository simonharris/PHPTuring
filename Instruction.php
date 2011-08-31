<?php
/**
*  Instruction class file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: Instruction.php,v 1.3 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  Instruction class
*
*  @package		PHPTuring
*/
class Instruction {
	
	
	const MOVE_R  = 'R';
	const MOVE_L  = 'L';

	private $initial_state;
	private $prereq_symbol;
	private $print;
	private $move;
	private $next;

	
	/**
	*  @access public
	*  @param string $initial_state The name of the Instruction
	*  @param int $prereq_symbol The prerequisite read symbol
	*  @param char $print The symbol to print next
	*  @param char $move The action to perform
	*  @param string $next The name of the next Instruction to run
	*/
	public function __construct($initial_state, $prereq_symbol, $print, $move, $next)
	{
		$this->initial_state = $initial_state;
		$this->prereq_symbol = $prereq_symbol;
		$this->print         = $print;
		$this->move          = $move;
		$this->next          = $next;
	}

	
	/**
	*  Returns the Instruction's name
	*
	*  @access public
	*  @return string
	*/
	public function getInitialState()
	{
		return $this->initial_state;
	}
		
	
	/**
	*  Returns the Instruction's prerequisite
	*
	*  @access public
	*  @return char
	*/
	public function getPrerequisite()
	{
		return $this->prereq_symbol;	
	}

		
	/** 
	*  Return the next symbol to print
	*
	*  @access public
	*  @return char
	*/
	public function getSymbolToWrite()
	{
		return $this->print;
	}

	
	/**
	*  Return the next required Head move
	* 
	*  @access public
	*  @return char
	*/
	public function getNextMove()
	{
		return $this->move;	
	}

	
	/**
	*  Return the next State name
	* 
	*  @access public
	*  @return string
	*/
	public function getNextState()
	{
		return $this->next;	
	}
	
}


?>