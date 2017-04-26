<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerMvc\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Country extends AbstractHelper
{
    private $countryList
        = [
            'de' => 'Deutschland',
            'at' => 'Österreich',
            'ch' => 'Schweiz',
        ];

    public function __invoke($country)
    {
        if (!isset($this->countryList[$country])) {
            return $country;
        }

        return $this->countryList[$country];
    }
}
