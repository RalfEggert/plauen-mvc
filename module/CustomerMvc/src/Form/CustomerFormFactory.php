<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Form;

use CustomerDomain\InputFilter\CustomerInputFilter;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomerFormFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container, $requestedName, array $options = null
    ) {
        $inputFilterManager = $container->get('InputFilterManager');

        $inputFilter = $inputFilterManager->get(CustomerInputFilter::class);

        $form = new CustomerForm();
        $form->setInputFilter($inputFilter);

        return $form;
    }
}
