<?php
/**
*  SimpleCompiler class file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @subpackage	Implementation.Simple
*  @version		$Id: SimpleCompiler.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  SimpleCompiler class - an example compiler
*
*  @package		PHPTuring
*  @subpackage	Implementation.Simple
*/
class SimpleCompiler implements Compiler {
	
	
	const SEP_LINES  = "\n";
	const SEP_FIELDS = '|';
	
	/**
	*  @var string
	*/
	private $source;
	
	
	/**
	*  Parse a string into a Program
	*
	*  @access public
	*  @param string $code
	*  @return Program
	*/	
	public function compile($code)
	{
		$this->source = $code;
				
		$lines = explode(self::SEP_LINES, $this->source);

		$program = new Program();
		
		foreach ($lines as $line) {
			$bits = explode(self::SEP_FIELDS, $line);
			$inst = new Instruction($bits[0], $bits[1], $bits[2], $bits[3], $bits[4]);
			$program->addInstruction($inst);
		}	
		return $program;
	}
	
}


?>