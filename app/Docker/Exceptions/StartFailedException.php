<?php namespace Rancherize\Docker\Exceptions;
use Rancherize\Exceptions\Exception;

/**
 * Class StartFailedException
 * @package Rancherize\Docker\Exceptions
 */
class StartFailedException extends Exception  {

	/**
	 * StartFailedException constructor.
	 * @param $projectName
	 */
	public function __construct($projectName, int $code = 51, \Exception $e = null) {
		parent::__construct("Failed to start docker infrastructure for $projectName", $code, $e);
	}
}