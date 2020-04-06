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

use Psr\Container\ContainerInterface;
use Streamcommon\Console\Helper\ContainerHelperSet;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Symfony\Component\Console\Helper\HelperSet;

/**
 * Class ApplicationFactory
 *
 * @package Streamcommon\Console\Factory
 */
class ApplicationFactory
{
    /**
     * Create console application
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array<mixed>|null  $options
     * @return Application
     */
    public function __invoke(ContainerInterface $container, string $requestedName, ?array $options = null): Application
    {
        /** @var ComponentOptions $componentOptions */
        $componentOptions = $container->get(ComponentOptions::class);
        $application      = new Application($componentOptions->getName(), $componentOptions->getVersion());
        $application->setCatchExceptions($componentOptions->isCatchExceptions());

        $commandLoader = $container->get(ContainerCommandLoader::class);
        if (($commandLoader instanceof ContainerCommandLoader) === true) {
            $application->setCommandLoader($commandLoader);
        }
        $helperSet = $container->get(ContainerHelperSet::class);
        if (($helperSet instanceof HelperSet)) {
            $application->setHelperSet($helperSet);
        }
        return $application;
    }
}
