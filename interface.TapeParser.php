<?php
/**
*  TapeParser interface file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: interface.TapeParser.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  TapeParser interface
*
*  @package		PHPTuring
*/
interface TapeParser {

	
	/**
	*  Parse a string into a Tape
	*
	*  @access public
	*  @param string $str
	*  @return Tape
	*/
	public function parse($str);
	
}


?>