<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Controller;

use CustomerDomain\Repository\CustomerRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        $repository = $container->get(CustomerRepositoryInterface::class);

        $controller = new IndexController();
        $controller->setCustomerRepository($repository);

        return $controller;
    }
}
