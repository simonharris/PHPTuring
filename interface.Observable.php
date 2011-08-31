<?php
/**
 * Observable interface file
 *
 * @author Simon Harris
 * @package	PHPTuring
 */


/**
 * Observable interface
 *
 * @package PHPTuring
 */
interface phptObservable
{

	/**
	 * Register an Observer
	 *
	 * @param Observer $obs
	 */
	public function registerObserver($obs);

}
