<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\View\Helper;

use CustomerDomain\Config\CustomerConfig;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CountryFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        /** @var CustomerConfig $customerConfig */
        $customerConfig = $container->get(CustomerConfig::class);

        $viewHelper = new Country($customerConfig->getCountryOptions());

        return $viewHelper;
    }
}
