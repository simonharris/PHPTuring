<?php
/**
*  Simple addition example
*
*  @author 		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @subpackage 	Examples
*  @version		$Id: index.php,v 1.2 2005/11/15 10:30:40 pointbeing Exp $
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


?>