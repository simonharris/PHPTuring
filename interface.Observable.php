<?php
/**
*  Observable interface file
*
*  @author		Simon Harris - pointbeing at users.sourceforge.net
*  @package		PHPTuring
*  @version		$Id: interface.Observable.php,v 1.3 2005/11/15 10:30:40 pointbeing Exp $
*/

/**
*  Observable interface
*
*  @package		PHPTuring
*/
interface phptObservable {
	
	
	/**
	*  Register an Observer
	*
	*  @access public
	*  @param Observer $obs
	*/
	public function registerObserver($obs);
	
}


?>