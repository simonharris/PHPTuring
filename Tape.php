<?php
/**
*  Tape class file
*
*  @author 		Simon Harris - pointbeing at users.sourceforge.net
*  @package 	PHPTuring
*  @version		$Id: Tape.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  Tape class
*
*  @package 	PHPTuring
*/
class Tape {
	
	
	/**
	*  @var array
	*/	
	private $cells = array();

	
	/**
	*  Writes a value to a given cell
	*
	*  @access public
	*  @param int $key
	*  @param mixed $value
	*/
	public function write($key, $value)
	{
		$this->cells[$key] = $value;
	}
	
	
	/**
	*  Reads the value for a given cell
	*
	*  @access public
	*  @param int $key
	*  @return mixed
	*/
	public function read($key)
	{
		return (isset($this->cells[$key])) ? $this->cells[$key] : '';
	}

}


?>