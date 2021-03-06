<?php namespace Rancherize\Blueprint\ProjectName;

use Rancherize\Blueprint\ProjectName\ProjectNameService\ComposerProjectNameService;
use Rancherize\File\FileLoader;
use Rancherize\Plugin\Provider;
use Rancherize\Plugin\ProviderTrait;

/**
 * Class ProjectNameProvider
 * @package Rancherize\Blueprint\ProjectName
 */
class ProjectNameProvider implements Provider {

	use ProviderTrait;

	/**
	 */
	public function register() {
		$this->container['project-name-service'] = function($c) {
			return new ComposerProjectNameService($c[FileLoader::class], $c['composer-packet-name-parser']);
		};
	}

	/**
	 */
	public function boot() {
	}
}