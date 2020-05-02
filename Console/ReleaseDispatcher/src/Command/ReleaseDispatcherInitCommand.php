<?php

namespace Sapar\Console\ReleaseDispatcher\Command;

use Sapar\Console\ReleaseDispatcher\Config\Configuration;
use Sapar\Console\ReleaseDispatcher\Config\ReleaseDispatcherConfiguration as Conf;
use Symfony\Component\Config\Definition\ArrayNode;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ReleaseDispatcherInitCommand
 */
class ReleaseDispatcherInitCommand extends Command
{
    protected function configure()
    {
        $this->setDescription('Create initial .release-dispatcher.yml file configuration');
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Force file writing');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $prototypeConf = [
            Conf::CONF_KEY_RELEASE_DISPATCHER => [
                Conf::CONF_KEY_DISPATCHER => [
                    Conf::CONF_KEY_FORMAT => self::getDefaultFormat(),
                    Conf::CONF_KEY_TARGET => getcwd() . DIRECTORY_SEPARATOR,
                    Conf::CONF_KEY_SOURCE => null,
                ]
            ]
        ];
        $sfStyle = new SymfonyStyle($input,$output);
        $fileconf = getcwd().DIRECTORY_SEPARATOR.Configuration::CONFIG_FILE;

        if (file_exists($fileconf) && false === $input->getOption('force')) {
            $sfStyle->note(sprintf('release configuration already exist %s', $fileconf));

            return 0;
        }

        file_put_contents($fileconf, Yaml::dump($prototypeConf, 3));

        $sfStyle->success(sprintf('Default configuration was successfully created %s', $fileconf));
    }

    /**
     * @return mixed
     */
    private function getDefaultFormat()
    {
        $conf = new Conf();
        /** @var ArrayNode $arrayNode */
        $arrayNode = $conf->getConfigTreeBuilder()->buildTree()->getChildren()[Conf::CONF_KEY_RELEASE_DISPATCHER];

        return $arrayNode->getChildren()[Conf::CONF_KEY_DISPATCHER]->getChildren()[Conf::CONF_KEY_FORMAT]->getDefaultValue();
    }

}
