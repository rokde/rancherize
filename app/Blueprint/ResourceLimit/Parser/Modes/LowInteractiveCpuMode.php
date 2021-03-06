<?php namespace Rancherize\Blueprint\ResourceLimit\Parser\Modes;

use Rancherize\Blueprint\ResourceLimit\ExtraInformation\ExtraInformation as ResourceLimitExtraInformation;
use Rancherize\Blueprint\ResourceLimit\Parser\CpuLimitMode;

/**
 * Class HighCpuMode
 * @package Rancherize\Blueprint\ResourceLimit\Parser\Modes
 */
class LowInteractiveCpuMode implements CpuLimitMode
{

    /**
     * @param ResourceLimitExtraInformation $extraInformation
     */
    public function setLimit(ResourceLimitExtraInformation $extraInformation)
    {
        $extraInformation->setCpuPeriod(4000);
        $extraInformation->setCpuQuota(2000);
    }

    /**
     * @param ResourceLimitExtraInformation $extraInformation
     */
    public function setReservation(ResourceLimitExtraInformation $extraInformation)
    {
        $extraInformation->setCpuReservation(500);
    }
}