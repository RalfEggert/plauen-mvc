<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain;

class ConfigProvider
{
    public function __invoke() : array
    {
        return [
            'customer-domain' => [],
        ];
    }
}
