<?php
/**
*  phptObserver interface file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: interface.Observer.php,v 1.3 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  phptObserver interface
*
*  @package		PHPTuring
*/
interface phptObserver {
	
	
	/**
	*  Notify the Observer
	*
	*  @access public
	*/
	public function notify();
	
}


?>	