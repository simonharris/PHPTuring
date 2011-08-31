<?php
/**
 * SimpleTapeParser class file
 *
 * @author Simon Harris
 * @package PHPTuring
 * @subpackage Implementation.Simple
 */

/**
 * SimpleTapeParser class - an example tape parser
 *
 * Tapes are just pipe-separated strings
 *
 * @package	PHPTuring
 * @subpackage Implementation.Simple
 */
class SimpleTapeParser implements TapeParser
{

	const SEP_CELLS = '|';


	/**
	 * Parse a string into a Tape
	 *
	 * @param string $str
	 * @return Tape
	 */
	public function parse($str)
	{
		$tape = new Tape();

		$bits = explode(self::SEP_CELLS, $str);

		$head = new Head();
		$head->setTape($tape);

		foreach ($bits as $bit) {
			$head->write($bit);
			$head->shiftRight();
		}
		return $tape;
	}
	
}
