<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Storage;


/**
 * Class CustomerDbStorage
 *
 * @package CustomerDomain\Storage
 */
interface CustomerStorageInterface
{
    public function fetchCustomerList();

    public function fetchCustomerById(int $id);
}