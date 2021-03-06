<?php

/*
 * This file is part of the Panda Config Package.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Panda\Config\Parsers;

/**
 * Interface ConfigurationParser
 * @package Panda\Config\Parsers
 */
interface ConfigurationParser
{
    /**
     * Parse the configuration file and get the configuration array.
     *
     * @return array
     */
    public function parse();
}
