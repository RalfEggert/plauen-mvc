<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc;

class ConfigProvider
{
    public function __invoke(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
