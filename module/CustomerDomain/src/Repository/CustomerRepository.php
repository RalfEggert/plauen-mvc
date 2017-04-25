<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

namespace CustomerDomain\Repository;

class CustomerRepository
{
    private $customers
        = [
            1  => [
                'id'         => '1',
                'first_name' => 'Sebastian',
                'last_name'  => 'Kappel',
                'country'    => 'de',
            ],
            2  => [
                'id'         => '2',
                'first_name' => 'Birgit',
                'last_name'  => 'Beike',
                'country'    => 'de',
            ],
            3  => [
                'id'         => '3',
                'first_name' => 'Robert',
                'last_name'  => 'Decker',
                'country'    => 'de',
            ],
            4  => [
                'id'         => '4',
                'first_name' => 'Christine',
                'last_name'  => 'Grunewald',
                'country'    => 'de',
            ],
            5  => [
                'id'         => '5',
                'first_name' => 'Kerstin',
                'last_name'  => 'Eisenberg',
                'country'    => 'at',
            ],
            6  => [
                'id'         => '6',
                'first_name' => 'Johanna',
                'last_name'  => 'Koertig',
                'country'    => 'at',
            ],
            7  => [
                'id'         => '7',
                'first_name' => 'Eric',
                'last_name'  => 'Daecher',
                'country'    => 'at',
            ],
            8  => [
                'id'         => '8',
                'first_name' => 'Erik',
                'last_name'  => 'Lemann',
                'country'    => 'ch',
            ],
            9  => [
                'id'         => '9',
                'first_name' => 'Andreas',
                'last_name'  => 'Dresner',
                'country'    => 'ch',
            ],
            10 => [
                'id'         => '10',
                'first_name' => 'Erik',
                'last_name'  => 'Bürger',
                'country'    => 'de',
            ],
            11 => [
                'id'         => '11',
                'first_name' => 'Marie',
                'last_name'  => 'Mehler',
                'country'    => 'de',
            ],
            12 => [
                'id'         => '12',
                'first_name' => 'Dieter',
                'last_name'  => 'Mayer',
                'country'    => 'at',
            ],
        ];

    /**
     * @return array
     */
    public function getCustomerList() : array
    {
        return $this->customers;
    }

    /**
     * @param $id
     *
     * @return array|bool
     */
    public function getCustomerById(int $id)
    {
        if (!isset($this->customers[$id])) {
            return false;
        }

        return $this->customers[$id];
    }
}
