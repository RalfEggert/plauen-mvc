<?php
/**
 * plauen-mvc
 *
 * @package    MODULENAME
 * @copyright  Copyright (c) 2014 ralf
 * @license    All rights reserved
 */

use CustomerMvc\Controller\IndexController;
use CustomerMvc\Controller\IndexControllerFactory;
use CustomerMvc\Form\CustomerForm;
use CustomerMvc\Form\Element\CountrySelect;
use CustomerMvc\Form\Element\CountrySelectFactory;
use CustomerMvc\View\Helper\Country;
use CustomerMvc\View\Helper\CountryFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'customer-mvc' => [],

    'router' => [
        'routes' => [
            'customer' => [
                'type'          => Literal::class,
                'options'       => [
                    'route'    => '/customer',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'action' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'       => '/:action[/:id]',
                            'constraints' => [
                                'action' => '(show|update|create|delete)',
                                'id'     => '[0-9]*',
                            ],
                        ],
                    ],
                    'page'   => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'       => '/:page',
                            'constraints' => [
                                'page' => '[0-9]*',
                            ],
                        ],
                    ],
                ]
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            IndexController::class => IndexControllerFactory::class,
        ],
    ],

    'view_helpers' => [
        'factories' => [
            Country::class => CountryFactory::class,
        ],

        'aliases' => [
            'customerCountry' => Country::class,
        ],
    ],

    'form_elements' => [
        'factories' => [
            CustomerForm::class  => InvokableFactory::class,
            CountrySelect::class => CountrySelectFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
