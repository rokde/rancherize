<?php namespace Rancherize\Commands;
use Rancherize\Blueprint\Traits\BlueprintTrait;
use Rancherize\Commands\Traits\DockerTrait;
use Rancherize\Configuration\LoadsConfiguration;
use Rancherize\Configuration\Traits\EnvironmentConfigurationTrait;
use Rancherize\Configuration\Traits\LoadsConfigurationTrait;
use Rancherize\Services\BuildService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class StartCommand
 * @package Rancherize\Commands
 *
 * Stop the given environment
 * This triggers the blueprint to build the infrastructure and uses docker to stop it
 */
class StopCommand extends Command implements LoadsConfiguration {

	use BlueprintTrait;
	use LoadsConfigurationTrait;
	use DockerTrait;
	use EnvironmentConfigurationTrait;
	/**
	 * @var BuildService
	 */
	private $buildService;

	/**
	 * StopCommand constructor.
	 * @param BuildService $buildService
	 */
	public function __construct( BuildService $buildService) {
		parent::__construct();
		$this->buildService = $buildService;
	}

	protected function configure() {
		$this->setName('stop')
			->setDescription('Stop an environment on the local machine')
			->addArgument('environment', InputArgument::REQUIRED)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$environment = $input->getArgument('environment');

		$configuration = $this->getConfiguration();
		$config = $this->environmentConfig($configuration, $environment);

		$blueprint = $this->blueprintService->byConfiguration($configuration, $input->getArguments());
		$this->buildService->build($blueprint, $configuration, $environment);

		$this->getDocker()
			->setOutput($output)
			->setProcessHelper($this->getHelper('process'));

		$this->getDocker()->stop('./.rancherize', $config->get('service-name'));

		return 0;
	}


}