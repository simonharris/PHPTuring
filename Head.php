<?php
/**
 * Head class file
 *
 * @author Simon Harris
 * @package	PHPTuring
 */


/**
 * Head class
 *
 * @package	PHPTuring
 */
class Head
{

	/**
	 * @var int
	 */
	private $position = 0;

	/**
	 * @var Tape
	 */
	private $tape;


	public function __construct()
	{
		$this->tape = new Tape();
	}


	/**
	 * Tells the Head which Tape to use
	 *
	 * @param Tape $tape
	 */
	public function setTape(Tape $tape)
	{
		$this->tape = $tape;
	}


	/**
 	 * Shifts the head one cell left
	 */
	public function shiftLeft()
	{
		$this->position--;
	}


	/**
	 * Shifts the head one cell right
	 */
	public function shiftRight()
	{
		$this->position++;
	}


	/**
	 * Returns the current symbol
	 *
	 * @return int
	 */
	public function read()
	{
		return $this->tape->read($this->position);
	}


	/**
	 * Writes a new value to the current
	 *
	 * @param int $value
	 */
	public function write($value)
	{
		$this->tape->write($this->position, $value);
	}

}
