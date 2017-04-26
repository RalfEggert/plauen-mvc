<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Validator;

use CustomerDomain\Config\CustomerConfig;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CountryValidatorFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        /** @var CustomerConfig $customerConfig */
        $customerConfig = $container->get(CustomerConfig::class);

        $validator = new CountryValidator();
        $validator->setCountryOptions($customerConfig->getCountryOptions());

        return $validator;
    }

}