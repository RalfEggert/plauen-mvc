<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Config;

class CustomerConfig
{
    private $config = [];

    /**
     * CustomerConfig constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getCountryOptions(): array
    {
        return $this->config['country_options'];
    }
}
