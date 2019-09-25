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

/**
 * Class ComponentOptionsFactory
 *
 * @package Streamcommon\Console
 */
class ComponentOptionsFactory
{
    /**
     * Create component options
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     * @return ComponentOptions
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): ComponentOptions {
        $config = $container->get('config');
        return new ComponentOptions($config['console_runner'] ?? []);
    }
}
