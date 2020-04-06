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

namespace Streamcommon\Console\Helper;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Helper\HelperInterface;
use Symfony\Component\Console\Helper\HelperSet;

/**
 * Class ContainerHelperSet
 *
 * @package Streamcommon\Console\Helper
 */
class ContainerHelperSet extends HelperSet
{
    /** @var ContainerInterface */
    protected $container;
    /** @var array<mixed> */
    protected $helperMap = [];

    /**
     * ContainerHelperSet constructor.
     *
     * @param ContainerInterface $container
     * @param array<mixed>       $helperMap
     */
    public function __construct(ContainerInterface $container, array $helperMap)
    {
        parent::__construct();
        $this->container = $container;
        $this->helperMap = $helperMap;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $name
     * @return boolean
     */
    public function has(string $name): bool
    {
        $has = parent::has($name);
        if ($has === false) {
            $has = isset($this->helperMap[$name]) && $this->container->has($this->helperMap[$name]);
        }
        return $has;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $name
     * @return HelperInterface
     */
    public function get(string $name): HelperInterface
    {
        return parent::get($name) ?? $this->container->get($this->helperMap[$name]);
    }
}
