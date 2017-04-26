<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Storage;

use CustomerDomain\Entity\CustomerEntity;
use CustomerDomain\Hydrator\CustomerHydrator;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomerDbStorageFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        $hydratorManager = $container->get('HydratorManager');

        $dbAdapter = $container->get(Adapter::class);

        $hydrator = $hydratorManager->get(CustomerHydrator::class);

        $resultSetPrototype = new HydratingResultSet(
            $hydrator, new CustomerEntity()
        );

        $tableGateway = new TableGateway(
            'customer', $dbAdapter, null, $resultSetPrototype
        );

        $storage = new CustomerDbStorage($tableGateway);

        return $storage;
    }
}
