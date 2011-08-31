<?php
/**
*  Program class file
*
*  @author 		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: Program.php,v 1.3 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  Program class
*
*  @package		PHPTuring
*/
class Program {
	

	/**
	*  @var array
	*/
	private $instructions = array();
	
	
	/**
	*  Adds an Instruction to the Program
	*
	*  @access public
	*  @param Instruction $inst
	*/
	public function addInstruction(Instruction $inst)
	{
		$this->instructions[] = $inst;
	}

	
	/**
	*  Returns the Instruction to follow given state and read value
	*
	*  @access public
	*  @param string $state
	*  @param char $read_val
	*  @return Instruction
	*/
	public function getInstruction($state, $read_val)
	{
		foreach ($this->instructions as $inst) {
			if ( ($inst->getInitialState() == $state) && ($inst->getPrerequisite() == $read_val) ) {
				return $inst;	
			}
		}	
		return FALSE;
	}	
	
}


?>