<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Storage;

use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomerDbStorageFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        $dbAdapter = $container->get(Adapter::class);

        $resultSetPrototype = new ResultSet(ResultSet::TYPE_ARRAY);

        $tableGateway = new TableGateway('customer', $dbAdapter, null, $resultSetPrototype);

        $storage = new CustomerDbStorage($tableGateway);

        return $storage;
    }
}
