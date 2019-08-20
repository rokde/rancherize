<?php namespace Rancherize\Blueprint\Keepalive;

use Rancherize\Blueprint\Infrastructure\Service\NetworkMode\ShareNetworkMode;
use Rancherize\Blueprint\Infrastructure\Service\Service;

/**
 * Class KeepaliveService
 * @package Rancherize\Blueprint\Keepalive
 */
class KeepaliveService extends Service
{

    /**
     * @var Service
     */
    protected $targetService;

    /**
     * @param Service $targetService
     * @return KeepaliveService
     */
    public function setTargetService(Service $targetService): KeepaliveService
    {
        $this->targetService = $targetService;
        return $this;
    }

    public function takeOver()
    {
        $this->image = 'busybox';
        $this->command = '/bin/sh';
        $this->tty = true;
        $this->keepStdin = true;

        $this->copySidekicks($this->targetService);
        $this->targetService->resetSidekicks();
        $this->copyLabels($this->targetService);
        $this->targetService->setNetworkMode( new ShareNetworkMode($this) );
    }

}