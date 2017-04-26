<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\InputFilter;

use CustomerDomain\Validator\CountryValidator;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class CustomerInputFilter extends InputFilter
{
    public function init()
    {
        $firstName = $this->factory->createInput(['name' => 'first_name']);
        $firstName->getFilterChain()->attachByName(StringTrim::class);
        $firstName->getFilterChain()->attachByName(StripTags::class);
        $firstName->getValidatorChain()->attachByName(
            StringLength::class,
            [
                'min'     => 2,
                'max'     => '32',
                'message' => 'Vorname zwischen 2 und 32 Zeichen!',
            ]
        );

        $lastName = $this->factory->createInput(['name' => 'last_name']);
        $lastName->getFilterChain()->attachByName(StringTrim::class);
        $lastName->getFilterChain()->attachByName(StripTags::class);
        $lastName->getValidatorChain()->attachByName(
            StringLength::class,
            [
                'min'     => 2,
                'max'     => '32',
                'message' => 'Nachname zwischen 2 und 32 Zeichen!',
            ]
        );

        $country = $this->factory->createInput(['name' => 'country']);
        $country->getValidatorChain()->attachByName(CountryValidator::class);

        $this->add($firstName);
        $this->add($lastName);
        $this->add($country);
    }
}
