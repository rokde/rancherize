<?php namespace Rancherize\Push\ModeFactory;

use Rancherize\Configuration\Configuration;
use Rancherize\Push\Modes\PushMode;

/**
 * Interface ModeFactory
 * @package Rancherize\Push\ModeFactory
 */
interface ModeFactory {

	/**
	 * @param PushModeParser $pushModeParser
	 * @param PushMode $mode
	 */
	function register( PushModeParser $pushModeParser, PushMode $mode );

	/**
	 * @param Configuration $configuration
	 * @return PushMode
	 */
	function make(Configuration $configuration);

}