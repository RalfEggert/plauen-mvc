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
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

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
                        'type'        => Segment::class,
                        'options'     => [
                            'route' => '/:action[/:id]',
                            'constraints' => [
                                'action' => '(show|update|create|delete)',
                                'id'     => '[0-9]*',
                            ],
                        ],
                    ],
                    'page' => [
                        'type'        => Segment::class,
                        'options'     => [
                            'route' => '/:page',
                            'constraints' => [
                                'page'     => '[0-9]*',
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

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
