<?php
/**
 * Machine class file
 *
 * @author Simon Harris
 * @package	PHPTuring
 */


/**
 * Machine class
 *
 * @package	PHPTuring
 */
class Machine implements phptObservable
{

	/**
	 * @var string
 	 */
	private $state;

	/**
	 * @var Tape
	 */
	private $tape;

	/**
	 * @var Head
	 */
	private $head;

	/**
	 * @var array
	 */
	private $observers = array();


	/**
	 * @param string $state The initial state of the Machine, default 0
	 */
	public function __construct($state='0')
	{
		$this->state = $state;
		$this->head  = new Head();
	}


	/**
	 * Returns the current state of the Machine
	 *
	 * @return string
	 */
	public function getState()
	{
		return $this->state;
	}


	/**
	 * Loads the Machine with a Program and runs it
	 *
	 * @param Program $program
	 * @param Tape $tape
 	 */
	public function run(Program $program, $tape=NULL)
	{
		if ($tape) {
			$this->_setTape($tape);
		}

		while ($inst = $program->getInstruction($this->getState(), $this->head->read())) {
			$this->_runInstruction($inst);
		}
	}


	/**
	 * Runs an Instruction
	 *
	 * @param Instruction $inst
	 */
	private function _runInstruction(Instruction $inst)
	{
		$this->head->write($inst->getSymbolToWrite());
		$this->_move($inst->getNextMove());
		$this->state = $inst->getNextState();
		$this->_sendNotify();
	}


	/**
	 * May move the head
	 *
	 * @param string $move
	 */
	private function _move($move)
	{
		if ($move == Instruction::MOVE_R) {
			$this->head->shiftRight();
		} elseif ($move == Instruction::MOVE_L) {
			$this->head->shiftLeft();
		}
	}


	/**
	 * Sets the tape into the Machine
	 *
	 * @param Tape $tape
	 */
	private function _setTape(Tape $tape)
	{
		$this->tape = $tape;
		$this->head->setTape($tape);
	}


	/**
	 * Return the Tape (typically for debugging purposes)
	 *
	 * @return Tape
	 */
	public function getTape()
	{
		return $this->tape;
	}


	/**
	 * Register an Observer
	 *
	 * @param Observer $obs
	 */
	public function registerObserver($obs)
	{
		$this->observers[] = $obs;
	}


	/**
	 * Send notification to all Observers
	 */
	private function _sendNotify()
	{
		foreach ($this->observers as $observer) {
			$observer->notify();
		}
	}

}
