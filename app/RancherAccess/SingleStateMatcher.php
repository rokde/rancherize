<?php namespace Rancherize\RancherAccess;

/**
 * Class SingleStateMatcher
 * @package Rancherize\RancherAccess
 */
class SingleStateMatcher implements StateMatcher {
	/**
	 * @var string
	 */
	private $expectedState;

	/**
	 * SingleStateMatcher constructor.
	 * @param string $expectedState
	 */
	public function __construct(string $expectedState) {
		$this->expectedState = strtolower($expectedState);
	}

	/**
	 * @param $service
	 * @return bool
	 */
	public function match($service) {
		return (strtolower($service['state']) === $this->expectedState);
	}
}