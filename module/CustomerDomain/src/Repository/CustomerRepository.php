<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Repository;

use CustomerDomain\Storage\CustomerDbStorage;
use CustomerDomain\Storage\CustomerStorageInterface;

/**
 * Class CustomerRepository
 *
 * @package CustomerDomain\Repository
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var CustomerStorageInterface
     */
    private $customerStorage;

    /**
     * CustomerRepository constructor.
     *
     * @param CustomerStorageInterface $customerStorage
     */
    public function __construct(CustomerStorageInterface $customerStorage)
    {
        $this->customerStorage = $customerStorage;
    }

    /**
     * @return array
     */
    public function getCustomerList() : array
    {
        return $this->customerStorage->fetchCustomerList();
    }

    /**
     * @param $id
     *
     * @return array|bool
     */
    public function getCustomerById(int $id)
    {
        return $this->customerStorage->fetchCustomerById($id);
    }
}
