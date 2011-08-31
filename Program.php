<?php
/**
 * Program class file
 *
 * @author Simon Harris
 * @package PHPTuring
 */


/**
 * Program class
 *
 * @package	PHPTuring
 */
class Program
{

	/**
	 * @var array
	 */
	private $instructions = array();


	/**
	 * Adds an Instruction to the Program
	 *
	 * @param Instruction $inst
	 */
	public function addInstruction(Instruction $inst)
	{
		$this->instructions[] = $inst;
	}


	/**
	 * Returns the Instruction to follow given state and read value
	 *
	 * @param string $state
	 * @param char $read_val
	 * @return Instruction
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
