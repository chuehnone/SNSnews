<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'SNSnews\Controller\SNSnews' => 'SNSnews\Controller\SNSnewsController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'snsnews' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/snsnews/',
                    /*'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),*/
                    'defaults' => array(
                        'controller' => 'SNSnews\Controller\SNSnews',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'snsnews' => __DIR__ . '/../view',
        ),
    ),
);