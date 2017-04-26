<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Validator;

use Zend\Validator\AbstractValidator;

class CountryValidator extends AbstractValidator
{
    const NOT_IN_ARRAY = 'unknownCountry';

    protected $messageTemplates = [
        self::NOT_IN_ARRAY => 'The input is not known',
    ];

    /**
     * @var array
     */
    private $countryOptions = [];

    /**
     * @param array $countryOptions
     */
    public function setCountryOptions(array $countryOptions)
    {
        $this->countryOptions = $countryOptions;
    }

    public function isValid($value)
    {
        if (isset($this->countryOptions[$value])) {
            return true;
        }

        $this->error(self::NOT_IN_ARRAY);

        return false;
    }
}
