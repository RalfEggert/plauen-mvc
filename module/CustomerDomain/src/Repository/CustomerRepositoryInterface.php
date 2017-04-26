<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Repository;

/**
 * Interface CustomerRepositoryInterface
 *
 * @package CustomerDomain\Repository
 */
interface CustomerRepositoryInterface
{
    /**
     * @return array
     */
    public function getCustomerList(): array;

    /**
     * @param $id
     *
     * @return array|bool
     */
    public function getCustomerById(int $id);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function saveCustomer(array $data);
}