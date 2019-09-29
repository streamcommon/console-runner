<?php
/**
 * This file is part of the streamcommon/console-runner package, a StreamCommon open software project.
 *
 * @copyright (c) 2019 StreamCommon Team
 * @see https://github.com/streamcommon/console-runner
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Streamcommon\Console;

use Streamcommon\Console\CommandLoader\Factory\CommandLoader as CommandLoaderFactory;
use Streamcommon\Console\Helper\ContainerHelperSet;
use Streamcommon\Console\Helper\Factory\HelperSet as HelperSetFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;

/**
 * Class ConfigProvider
 *
 * @package Streamcommon\Console
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies'   => $this->getDependencies(),
            'console-runner' => $this->getConsoleRunner(),
        ];
    }

    /**
     * Return dependencies configuration
     *
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'factories' => [
                Application::class            => ApplicationFactory::class,
                ComponentOptions::class       => ComponentOptionsFactory::class,
                ContainerCommandLoader::class => CommandLoaderFactory::class,
                ContainerHelperSet::class     => HelperSetFactory::class
            ],
        ];
    }

    /**
     * Return console runner configuration
     *
     * @return array
     */
    public function getConsoleRunner(): array
    {
        return [
            'name'             => 'UNKNOWN',
            'version'          => 'UNKNOWN',
            'commands'         => [
                //named list commands ['name' => 'name', 'class' => 'classname']
            ],
            'helpers'          => [
                // named list helpers ['name' => 'name', 'class' => 'classname']
            ],
            'catch_exceptions' => true,
        ];
    }
}
