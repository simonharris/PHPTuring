<?php
/**
 * SimpleDebugger class file
 *
 * @author Simon Harris
 * @package PHPTuring
 * @subpackage Implementation.Simple
 */


/**
 * SimpleDebugger class
 *
 * @package PHPTuring
 * @subpackage Implementation.Simple
 */
class SimpleDebugger implements phptObserver
{

	/**
	 * @var Machine
	 */
	private $machine;

	/**
	 * @var int
	 */
	private $step = 0;


	/**
	 * Tell the debugger which Machine to subscribe to
	 *
	 * @param Machine $machine
	 */
	public function watch(Machine $machine)
	{
		$this->machine = $machine;
		$this->machine->registerObserver($this);
	}


	/**
	 * Notify the Observer
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
