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

use Streamcommon\Excess\Configuration\ClassName\NamedValue;
use Zend\Stdlib\AbstractOptions;

/**
 * Class ComponentOptions
 *
 * @package Streamcommon\Console
 */
class ComponentOptions extends AbstractOptions
{
    /** @var string */
    protected $name = 'UNKNOWN';
    /** @var string */
    protected $version = 'UNKNOWN';
    /** @var NamedValue[] */
    protected $commands = [];
    /** @var NamedValue[] */
    protected $helpers = [];
    /** @var bool */
    protected $catchExceptions = true;

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ComponentOptions
     */
    public function setName(string $name): ComponentOptions
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return ComponentOptions
     */
    public function setVersion(string $version): ComponentOptions
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Get commands
     *
     * @return NamedValue[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /**
     * Set commands
     *
     * @param array $commands
     * @return ComponentOptions
     */
    public function setCommands(array $commands): ComponentOptions
    {
        $this->commands = array_map(function ($item) {
            return (($item instanceof NamedValue) == true) ? $item : new NamedValue($item);
        }, $commands);
        return $this;
    }

    /**
     * Get helpers
     *
     * @return NamedValue[]
     */
    public function getHelpers(): array
    {
        return $this->helpers;
    }

    /**
     * Set helpers
     *
     * @param array $helpers
     * @return ComponentOptions
     */
    public function setHelpers(array $helpers): ComponentOptions
    {
        $this->helpers = array_map(function ($item) {
            return (($item instanceof NamedValue) == true) ? $item : new NamedValue($item);
        }, $helpers);
        return $this;
    }

    /**
     * Get catchExceptions
     *
     * @return boolean
     */
    public function isCatchExceptions(): bool
    {
        return $this->catchExceptions;
    }

    /**
     * Set catchExceptions
     *
     * @param boolean $catchExceptions
     * @return ComponentOptions
     */
    public function setCatchExceptions(bool $catchExceptions): ComponentOptions
    {
        $this->catchExceptions = $catchExceptions;
        return $this;
    }
}
