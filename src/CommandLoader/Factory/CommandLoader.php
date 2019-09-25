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

namespace Streamcommon\Console\CommandLoader\Factory;

use Psr\Container\ContainerInterface;
use Streamcommon\Console\ComponentOptions;
use Streamcommon\Console\Exception\ContainerException;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;

use function get_class;
use function is_string;
use function sprintf;
use function gettype;
use function is_object;

/**
 * Class CommandLoader
 *
 * @package Streamcommon\Console\CommandLoader\Factory
 */
class CommandLoader
{
    /**
     * Create command loader
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     * @return ContainerCommandLoader
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): ContainerCommandLoader {
        /** @var ComponentOptions $componentOptions */
        $componentOptions = $container->get(ComponentOptions::class);
        $commandMap       = [];
        foreach ($componentOptions->getCommands() as $command) {
            if (is_string($command) === false) {
                throw new ContainerException(
                    sprintf(
                        'Expected string, got %s',
                        is_object($command) ? get_class($command) : gettype($command)
                    )
                );
            }
            $commandMap[$command] = $command;
        }
        return new ContainerCommandLoader($container, $commandMap);
    }
}
