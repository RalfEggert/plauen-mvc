<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Form\Element;

use CustomerDomain\Config\CustomerConfig;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CountrySelectFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        /** @var CustomerConfig $customerConfig */
        $customerConfig = $container->get(CustomerConfig::class);

        $select = new CountrySelect();
        $select->setCountryOptions($customerConfig->getCountryOptions());

        return $select;
    }
}