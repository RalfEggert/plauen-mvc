<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain;

class Module
{
    public function getConfig() : array
    {
        $configProvider = new ConfigProvider();

        return $configProvider();
    }
}
