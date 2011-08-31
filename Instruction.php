<?php
/**
 * Instruction class file
 *
 * @author Simon Harris
 * @package PHPTuring
 */

/**
 * Instruction class
 *
 * @package PHPTuring
 */
class Instruction
{

	const MOVE_R  = 'R';
	const MOVE_L  = 'L';

	private $initial_state;
	private $prereq_symbol;
	private $print;
	private $move;
	private $next;


	/**
	 * @param string $initial_state The name of the Instruction
	 * @param int $prereq_symbol The prerequisite read symbol
	 * @param char $print The symbol to print next
	 * @param char $move The action to perform
	 * @param string $next The name of the next Instruction to run
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
	 * Returns the Instruction's name
	 *
	 * @return string
	 */
	public function getInitialState()
	{
		return $this->initial_state;
	}


	/**
	 * Returns the Instruction's prerequisite
	 *
	 * @return char
 	 */
	public function getPrerequisite()
	{
		return $this->prereq_symbol;
	}


	/**
	 * Return the next symbol to print
 	 *
	 * @return char
	 */
	public function getSymbolToWrite()
	{
		return $this->print;
	}


	/**
	 * Return the next required Head move
	 *
	 * @return char
	 */
	public function getNextMove()
	{
		return $this->move;
	}


	/**
	 * Return the next State name
	 *
	 * @return string
	 */
	public function getNextState()
	{
		return $this->next;
	}

}
