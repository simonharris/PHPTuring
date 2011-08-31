<?php
/**
*  Head class file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: Head.php,v 1.4 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  Head class
*
*  @package		PHPTuring
*/
class Head {

	
	/**
	*  @var int
	*/
	private $position = 0;
	
	/**
	*  @var Tape
	*/
	private $tape;
	
	
	/**
	*  @access public
	*/
	public function __construct()
	{
		$this->tape = new Tape();
	}
	
	
	/**
	*  Tells the Head which Tape to use
	*
	*  @access public
	*  @param Tape $tape
	*/
	public function setTape(Tape $tape)
	{
		$this->tape = $tape;
	}
	
	
	/**
	*  Shifts the head one cell left
	* 
	*  @access public
	*/
	public function shiftLeft()
	{
		$this->position--;
	}
	
	
	/**
	*  Shifts the head one cell right
	* 
	*  @access public
	*/
	public function shiftRight()
	{
		$this->position++;		
	}
	
	
	/**
	*  Returns the current symbol
	*
	*  @access public
	*  @return int
	*/
	public function read()
	{
		return $this->tape->read($this->position);
	}	
	
	
	/**
	*  Writes a new value to the current
	*  
	*  @access public
	*  @param int $value
	*/
	public function write($value)
	{
		$this->tape->write($this->position, $value);
	}
		
}


?>