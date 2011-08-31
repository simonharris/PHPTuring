<?php
/**
*  Compiler interface file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: interface.Compiler.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  Compiler interface
*
*  @package		PHPTuring
*/
interface Compiler {
	
	
	/**
	*  Parse a string into a Program
	*
	*  @access public
	*  @param string $code
	*  @return Program
	*/	
	public function compile($code);	
	
}


?>