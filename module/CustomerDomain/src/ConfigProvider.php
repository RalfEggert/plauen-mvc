<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain;

use CustomerDomain\Repository\CustomerRepository;
use CustomerDomain\Repository\CustomerRepositoryInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'customer-domain' => [],

            'service_manager' => $this->getServiceManagerConfig(),
        ];
    }

    private function getServiceManagerConfig(): array
    {
        return [
            'factories' => [
                CustomerRepository::class => InvokableFactory::class,
            ],

            'aliases' => [
                CustomerRepositoryInterface::class => CustomerRepository::class,
            ],
        ];
    }
}
