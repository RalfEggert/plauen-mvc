<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\Form\Element;

use Zend\Form\Element\Select;

/**
 * Class CountrySelect
 *
 * @package CustomerMvc\Form\Element
 */
class CountrySelect extends Select
{
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

    public function init()
    {
        $this->setName('country');
        $this->setLabel('Land');
        $this->setAttribute('class', 'form-control');
        $this->setValueOptions($this->countryOptions);
    }
}