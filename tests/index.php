<?php
/**
*  PHPTuring test file
*
*  @author 		Simon Harris - pointbeing  at users.sourceforge.net
*  @package		PHPTuring
*  @subpackage 	Tests
*  @version		$Id: index.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
*  @todo		Unbundle test cases into seperate files
*/

error_reporting(E_ALL);

/**#@+*/
require_once('/usr/local/simpletest/unit_tester.php');
require_once('/usr/local/simpletest/mock_objects.php');
require_once('/usr/local/simpletest/reporter.php');

#require_once('/etc/simpletest/unit_tester.php');
#require_once('/etc/simpletest/mock_objects.php');
#require_once('/etc/simpletest/reporter.php');

require_once '../all.php';
require_once '../implementation/simple.php';
/**#@-*/


/**
*  TapeTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class TapeTestCase extends UnitTestCase {

	public function testTapeStoresCellValuesCorrectly()
	{
		$tape = new Tape();
		$tape->write(3, 'House');
		$this->assertIdentical($tape->read(3), 'House');
		$tape->write(-1, 'Car');
		$this->assertIdentical($tape->read(-1), 'Car');
		$tape->write(400, 456);
		$this->assertIdentical($tape->read(400), 456);		
	}
	
	public function testTapeReturnsBlankForUnsetCells()
	{
		$tape = new Tape();	
		$this->assertIdentical($tape->read(400), '');		
		$this->assertIdentical($tape->read(-345), '');		
	}	
}


/**
*  HeadTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class HeadTestCase extends UnitTestCase {

	public function testReadandWriteWithBlankTape()
	{
		$head = new Head();
		$head->shiftLeft();	
		$this->assertIdentical($head->read(), '');
		$head->shiftLeft();	
		$head->shiftLeft();	
		$head->shiftLeft();	
		$head->shiftLeft();	
		$head->shiftLeft();	
		$head->shiftLeft();	
		$this->assertIdentical($head->read(), '');

		$tape = new Tape();
		$head->shiftRight();	
		$this->assertIdentical($head->read(), '');
		$head->shiftRight();	
		$head->shiftRight();	
		$head->shiftRight();	
		$head->shiftRight();	
		$head->shiftRight();	
		$head->shiftRight();	
		$this->assertIdentical($head->read(), '');
				
		$head->write('car');
		$this->assertIdentical($head->read(), 'car');
		$head->shiftRight();	
		$head->shiftRight();	
		$head->shiftLeft();	
		$head->shiftLeft();	
		$this->assertIdentical($head->read(), 'car');
	}

	public function testReadWithPredefinedTape()
	{
		$head = new Head();
		$tape = new Tape();
		$tape->write(1, 'Hi');
		$tape->write(-1, 'Bellows');
		$tape->write(-10, '*');
		$head->setTape($tape);
		$head->shiftRight();
		$this->assertIdentical($head->read(), 'Hi');
		$head->shiftLeft();
		$head->shiftLeft();
		$this->assertIdentical($head->read(), 'Bellows');
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$head->shiftLeft();
		$this->assertIdentical($head->read(), '*');		
	}
}


/**
*  InstructionTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class InstructionTestCase extends UnitTestCase {

	public function testInstructionValuesInitialisedCorrectly()
	{
		$inst = new Instruction('Inst1', 0, 1, Instruction::MOVE_R, 'Inst2');
		$this->assertIdentical($inst->getInitialState(), 'Inst1');
		$this->assertIdentical($inst->getPrerequisite(), 0);
		$this->assertIdentical($inst->getSymbolToWrite(), 1);
		$this->assertIdentical($inst->getNextMove(), Instruction::MOVE_R);
		$this->assertIdentical($inst->getNextState(), 'Inst2');		

		$inst = new Instruction('Spongebob', 1, 0, Instruction::MOVE_L, 'Turtles');
		$this->assertIdentical($inst->getInitialState(), 'Spongebob');
		$this->assertIdentical($inst->getPrerequisite(), 1);
		$this->assertIdentical($inst->getSymbolToWrite(), 0);
		$this->assertIdentical($inst->getNextMove(), Instruction::MOVE_L);
		$this->assertIdentical($inst->getNextState(), 'Turtles');
	}
}


/**
*  ProgramTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class ProgramTestCase extends UnitTestCase {

	public function testFindingInstructionsByStateandCurrentCellValue()
	{
		$program = new Program();

		$cmd = new Instruction('S1', 1, 1, Instruction::MOVE_R, 'S2');
		$program->addInstruction($cmd);
		$cmd2 = new Instruction('S2', 0, 'B', Instruction::MOVE_L, 'S1');
		$program->addInstruction($cmd2);
		
		$inst = $program->getInstruction('S1', 1);
		$this->assertIdentical($inst->getSymbolToWrite(), 1);
		$this->assertIdentical($inst->getNextMove(), Instruction::MOVE_R);
		$this->assertIdentical($inst->getNextState(), 'S2');
		
		$inst = $program->getInstruction('S2', 0);
		$this->assertIsA($inst, 'Instruction');
		$this->assertIdentical($inst->getSymbolToWrite(), 'B');
		$this->assertIdentical($inst->getNextMove(), Instruction::MOVE_L);
		$this->assertIdentical($inst->getNextState(), 'S1');
		
		$this->assertFalse($program->getInstruction('s13', 4));
	}	
}


/**
*  CompilerTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class CompilerTestCase extends UnitTestCase {

	public function testCompilingOneLineIntoProgram()
	{
		$compiler  = new SimpleCompiler();
		$program = $compiler->compile("a|B|0|R|b");
		$this->assertIsA($program, 'Program');
		$inst = $program->getInstruction('a', 'B');
		$this->assertIsA($inst, 'Instruction');
		$this->assertIdentical($inst->getSymbolToWrite(), '0');
		$this->assertIdentical($inst->getNextMove(), Instruction::MOVE_R);
		$this->assertIdentical($inst->getNextState(), 'b');
	}

	public function testCompilingSeveralLinesIntoProgram()
	{
		$compiler  = new SimpleCompiler();
		$program = $compiler->compile("a|0|0|R|b\nb|0|0|R|c\nc|0|1|L|d\nd|0|0|R|a");
		$this->assertIsA($program, 'Program');
		$inst = $program->getInstruction('c', '0');
		$this->assertIsA($inst, 'Instruction');
		$this->assertIdentical($inst->getSymbolToWrite(), '1');
		$this->assertIdentical($inst->getNextMove(), Instruction::MOVE_L);
		$this->assertIdentical($inst->getNextState(), 'd');
	}
}


/**
*  MachineTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class MachineTestCase extends UnitTestCase {

	public function testDefaultInitialStateisZero()
	{
		$machine = new Machine();
		$this->assertIdentical($machine->getState(), '0');
	}
	
	public function testInitialStateCanBeOverriden()
	{
		$machine = new Machine('s0');
		$this->assertIdentical($machine->getState(), 's0');
	}	
	
	public function testRunningMachine()
	{
		$machine = new Machine('a');
		$compiler = new SimpleCompiler();
		
		$machine->run($compiler->compile("a||0|R|b"));
		$this->assertIdentical($machine->getState(), 'b');		

		$machine = new Machine('s0');
		$machine->run($compiler->compile("s0||1||s0"));
		$this->assertIdentical($machine->getState(), 's0');		

		$machine = new Machine('s0');
		$machine->run($compiler->compile("s0||1|R|s1\ns1||1|L|s2\ns2|1|||s3"));
		$this->assertIdentical($machine->getState(), 's3');	
		
		// would be nice to add a couple more examples here	
	}	
}


/**
*  TapeParserTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class TapeParserTestCase extends UnitTestCase {

	public function testMyExampleStringisParsedCorrectly()
	{
		$tp = new SimpleTapeParser();
		$tape = $tp->parse('|Foo|||1|0||1|0|0');
		$this->assertIsA($tape, 'Tape');
		
		$head = new Head();
		$head->setTape($tape);
		$this->assertIdentical($head->read(), '');
		$head->shiftRight();
		$this->assertIdentical($head->read(), 'Foo');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '1');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '0');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '1');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '0');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '0');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '');
		$head->shiftRight();
		$this->assertIdentical($head->read(), '');		
	}
}


/**
*  ObservationTestCase class
*
*  @package		PHPTuring
*  @subpackage	Tests
*/
class ObservationTestCase extends UnitTestCase {
	
	public function testObserverIsNotifiedCorrectly_OneStep()
	{
		$prog = "0||1||0";

		$machine = new Machine();
	
		Mock::generate('SimpleDebugger');
		$observer = new MockSimpleDebugger($this);
		$observer2 = new MockSimpleDebugger($this);
			
		$machine->registerObserver($observer);
		$machine->registerObserver($observer2);

		$compiler = new SimpleCompiler();
		$parser = new SimpleTapeParser();
				
		$observer->expectOnce('notify');
		$observer2->expectOnce('notify');
		$machine->run($compiler->compile($prog));
		$observer->tally();
		$observer2->tally();
	}

	public function testObserverIsNotifiedCorrectly_ThreeSteps()
	{
		$prog = "0||1||0\n0|1|0||1\n1|0|1||stop";

		$machine = new Machine();
	
		Mock::generate('SimpleDebugger');
		$observer = new MockSimpleDebugger($this);
		$observer2 = new MockSimpleDebugger($this);
			
		$machine->registerObserver($observer);
		$machine->registerObserver($observer2);

		$compiler = new SimpleCompiler();
				
		$observer->expectCallCount('notify', 3);
		$observer2->expectCallCount('notify', 3);
		$machine->run($compiler->compile($prog));
		$observer->tally();
		$observer2->tally();
	}

	// this is pretty partial, rather than become brittle
	public function testDebugger()
	{
		$debugger = new SimpleDebugger();
		
		$prog = "0||1||0\n0|1|0||1\n1|0|1||stop";
		
		$machine = new Machine();
		
		$compiler = new SimpleCompiler();
		$debugger->watch($machine);	
	}
}



$test = new GroupTest('All Tests');
$test->addTestClass(new TapeTestCase());
$test->addTestClass(new HeadTestCase());
$test->addTestClass(new InstructionTestCase());
$test->addTestClass(new ProgramTestCase());
$test->addTestClass(new CompilerTestCase());
$test->addTestClass(new MachineTestCase());
$test->addTestClass(new TapeParserTestCase());
$test->addTestClass(new ObservationTestCase());
$test->run(new HtmlReporter());


?>