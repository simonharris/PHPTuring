<?php
/**
 * Compiler interface file
 *
 * @author Simon Harris
 * @package PHPTuring
 */


/**
 * Compiler interface
 *
 * @package	PHPTuring
 */
interface Compiler
{

	/**
	 * Parse a string into a Program
	 *
	 * @param string $code
	 * @return Program
	 */
	public function compile($code);

}
