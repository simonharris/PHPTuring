<?php
/**
*  SimpleTapeParser class file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @subpackage	Implementation.Simple
*  @version		$Id: SimpleTapeParser.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  SimpleTapeParser class - an example tape parser
*
*  Tapes are just pipe-separated strings
*
*  @package		PHPTuring
*  @subpackage	Implementation.Simple
*/
class SimpleTapeParser implements TapeParser {

	
	const SEP_CELLS = '|';

	
	/**
	*  Parse a string into a Tape
	*
	*  @access public
	*  @param string $str
	*  @return Tape
	*/
	public function parse($str) 
	{
		$tape = new Tape();	
		
		$bits = explode(self::SEP_CELLS, $str);
		
		$head = new Head();
		$head->setTape($tape);
		
		foreach ($bits as $bit) {
			$head->write($bit);
			$head->shiftRight();	
		}
		return $tape;		
	}	
}


?>