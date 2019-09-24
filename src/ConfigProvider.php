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
            'dependencies' => $this->getDependencies(),
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
            'commands' => [],
            'helpers' => [],
        ];
    }
}