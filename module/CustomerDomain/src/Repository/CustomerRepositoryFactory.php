<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Repository;

use CustomerDomain\Storage\CustomerStorageInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomerRepositoryFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        $storage = $container->get(CustomerStorageInterface::class);

        $repository = new CustomerRepository($storage);

        return $repository;
    }
}
