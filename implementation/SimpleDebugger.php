<?php
/**
*  SimpleDebugger class file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @subpackage	Implementation.Simple
*  @version		$Id: SimpleDebugger.php,v 1.3 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  SimpleDebugger class
*
*  @package		PHPTuring
*  @subpackage	Implementation.Simple
*/
class SimpleDebugger implements phptObserver {
	

	/**
	*  @var Machine
	*/
	private $machine;
	
	/**
	*  @var int
	*/
	private $step = 0;
		
	
	/**
	* Tell the debugger which Machine to subscribe to
	*
	*  @access public
	*  @param Machine $machine
	*/
	public function watch(Machine $machine)
	{
		$this->machine = $machine;
		$this->machine->registerObserver($this);		
	}
	

	/**
	*  Notify the Observer
	*
	*  @access public
	*/
	public function notify()
	{
		$head = new Head();
		echo 'Step: '.$this->step."\n";
		echo 'State: '.$this->machine->getState()."\n";
		print_r($this->machine->getTape());
		echo "-----------------------\n";
		$this->step++;
	}
		
}


?>