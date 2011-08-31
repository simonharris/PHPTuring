<?php
/**
*  Loads all PHPTuring class files
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: all.php,v 1.3 2005/11/15 10:30:40 pointbeing Exp $
*/

/**#@+*/
require_once dirname(__FILE__) . '/interface.Observable.php';
require_once dirname(__FILE__) . '/interface.Observer.php';
require_once dirname(__FILE__) . '/Tape.php';
require_once dirname(__FILE__) . '/Head.php';
require_once dirname(__FILE__) . '/Instruction.php';
require_once dirname(__FILE__) . '/interface.Compiler.php';
require_once dirname(__FILE__) . '/interface.TapeParser.php';
require_once dirname(__FILE__) . '/Program.php';
require_once dirname(__FILE__) . '/Machine.php';
/**#@-*/

?>