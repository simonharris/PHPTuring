<?php
/**
 * SimpleCompiler class file
 *
 * @author Simon Harris
 * @package	PHPTuring
 * @subpackageImplementation.Simple
 */

/**
 * SimpleCompiler class - an example compiler
 *
 * @package PHPTuring
 * @subpackage Implementation.Simple
 */
class SimpleCompiler implements Compiler
{

	const SEP_LINES  = "\n";
	const SEP_FIELDS = '|';

	/**
	 * @var string
	 */
	private $source;


	/**
	 * Parse a string into a Program
	 *
	 * @param string $code
	 * @return Program
	 */
	public function compile($code)
	{
		$this->source = $code;

		$lines = explode(self::SEP_LINES, $this->source);

		$program = new Program();

		foreach ($lines as $line) {
			$bits = explode(self::SEP_FIELDS, $line);
			$inst = new Instruction($bits[0], $bits[1], $bits[2], $bits[3], $bits[4]);
			$program->addInstruction($inst);
		}
		return $program;
	}

}
