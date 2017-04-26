<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Storage;

use CustomerDomain\Entity\CustomerEntity;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class CustomerDbStorage
 *
 * @package CustomerDomain\Storage
 */
class CustomerDbStorage implements CustomerStorageInterface
{
    /**
     * @var TableGateway
     */
    private $tableGateway;

    /**
     * CustomerDbStorage constructor.
     *
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchCustomerList()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order(['last_name' => 'ASC']);

        $resultSet = $this->tableGateway->selectWith($select);

        $customerList = [];

        /** @var CustomerEntity $customer */
        foreach ($resultSet as $customer) {
            $customerList[$customer->getId()] = $customer;
        }

        return $customerList;
    }

    public function fetchCustomerById(int $id)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where->equalTo('id', $id);

        /** @var ResultSet $resultSet */
        $resultSet = $this->tableGateway->selectWith($select);

        return $resultSet->current();
    }
}