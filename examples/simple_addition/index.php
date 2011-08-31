<?php
/**
 * Simple addition example
 *
 * @author Simon Harris
 * @package	PHPTuring
 * @subpackage Examples
 */

error_reporting(E_ALL | E_STRICT);


/**#@+*/
require_once '../../all.php';					// pull in Turing machine lib files
require_once '../../implementation/simple.php';	// Simple implementation files
/**#@-*/

$prog = "0|1|1|R|0\n0||1|R|1\n1|1|1|R|1\n1|||L|2\n2|1|||stop";
$tape = "1|1|1|1|1|1||1|1|1|1|1|1|1|1";


$machine  = new Machine();
$compiler = new SimpleCompiler();
$parser   = new SimpleTapeParser();
$debugger = new SimpleDebugger();

$debugger->watch($machine);


echo '<pre>';
$machine->run($compiler->compile($prog), $parser->parse($tape));
echo '</pre>';
