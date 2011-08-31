<?php
/**
 * Tape class file
 *
 * @author Simon Harris
 * @package PHPTuring
 */


/**
 * Tape class
 *
 * @package PHPTuring
 */
class Tape
{

	/**
	 * @var array
	 */
	private $cells = array();


	/**
	 * Writes a value to a given cell
	 *
	 * @param int $key
	 * @param mixed $value
	 */
	public function write($key, $value)
	{
		$this->cells[$key] = $value;
	}


	/**
	 * Reads the value for a given cell
	 *
	 * @param int $key
	 * @return mixed
	 */
	public function read($key)
	{
		return (isset($this->cells[$key])) ? $this->cells[$key] : '';
	}

}
