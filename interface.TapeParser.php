<?php
/**
 * TapeParser interface file
 *
 * @author Simon Harris
 * @package	PHPTuring
 */

/**
 * TapeParser interface
 *
 * @package	PHPTuring
 */
interface TapeParser
{

	/**
	 * Parse a string into a Tape
	 *
	 * @param string $str
	 * @return Tape
	*/
	public function parse($str);

}
