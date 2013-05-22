<?php
return array(
	'contrellers' => array(
		'invokables' => array(
			'SNSnews\Controller\SNSnews' => 'SNSnews\Controller\SNSnewsController',
		),
	),
	'router' => array(
        'routes' => array(
            'SNSnews' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/news[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
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
			'SNSnews' => __DIR__ . '/../view',
		),
	),
);