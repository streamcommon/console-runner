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

namespace Streamcommon\Console\Helper\Factory;

use Psr\Container\ContainerInterface;
use Streamcommon\Console\ComponentOptions;
use Streamcommon\Console\Exception\ContainerException;
use Streamcommon\Console\Helper\ContainerHelperSet;

use function is_string;
use function sprintf;
use function is_object;
use function get_class;
use function gettype;

/**
 * Class HelperSet
 *
 * @package Streamcommon\Console\Helper\Factory
 */
class HelperSet
{
    /**
     * Create container HelperSet
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     * @return ContainerHelperSet
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        ?array $options = null
    ): ContainerHelperSet {
        /** @var ComponentOptions $componentOptions */
        $componentOptions = $container->get(ComponentOptions::class);
        $helperMap        = [];
        foreach ($componentOptions->getHelpers() as $helper) {
            $helperMap[$helper->getName()] = $helper->getClass();
        }
        return new ContainerHelperSet($container, $helperMap);
    }
}
