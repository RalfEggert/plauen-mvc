<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain;

use CustomerDomain\Config\CustomerConfig;
use CustomerDomain\Config\CustomerConfigFactory;
use CustomerDomain\Hydrator\CustomerHydrator;
use CustomerDomain\Repository\CustomerRepository;
use CustomerDomain\Repository\CustomerRepositoryFactory;
use CustomerDomain\Repository\CustomerRepositoryInterface;
use CustomerDomain\Storage\CustomerDbStorage;
use CustomerDomain\Storage\CustomerDbStorageFactory;
use CustomerDomain\Storage\CustomerStorageInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'customer-domain' => [],

            'service_manager' => $this->getServiceManagerConfig(),
            'hydrators'       => $this->getHydratorConfig(),
        ];
    }

    private function getServiceManagerConfig(): array
    {
        return [
            'factories' => [
                CustomerRepository::class => CustomerRepositoryFactory::class,

                CustomerConfig::class => CustomerConfigFactory::class,

                CustomerStorageInterface::class => CustomerDbStorageFactory::class,
            ],

            'aliases' => [
                CustomerRepositoryInterface::class => CustomerRepository::class,
            ],
        ];
    }

    private function getHydratorConfig() : array
    {
        return [
            'factories' => [
                CustomerHydrator::class => InvokableFactory::class,
            ],
        ];
    }
}
