<?php namespace Rancherize\Blueprint\ResourceLimit\Parser\Modes;

use Rancherize\Blueprint\ResourceLimit\ExtraInformation\ExtraInformation as ResourceLimitExtraInformation;
use Rancherize\Blueprint\ResourceLimit\Parser\CpuLimitMode;

/**
 * Class MinimalCpuMode
 * @package Rancherize\Blueprint\ResourceLimit\Parser\Modes
 */
class MinimalCpuMode implements CpuLimitMode {

	/**
	 * @param ResourceLimitExtraInformation $extraInformation
	 */
	public function setLimit( ResourceLimitExtraInformation $extraInformation ) {
		$extraInformation->setCpuPeriod(4000);
		$extraInformation->setCpuQuota(1000);
	}

	/**
	 * @param ResourceLimitExtraInformation $extraInformation
	 */
	public function setReservation( ResourceLimitExtraInformation $extraInformation ) {
		$extraInformation->setCpuReservation(250);
	}
}