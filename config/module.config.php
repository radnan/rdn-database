<?php

return array(
	'controller_plugins' => array(
		'aliases' => array(
			'Database' => 'RdnDatabase:Database',
		),

		'factories' => array(
			'RdnDatabase:Database' => 'RdnDatabase\Factory\Controller\Plugin\Database',
		),
	),

	'rdn_db_adapters' => array(
		'abstract_factories' => array(
			'AdapterLoader' => 'RdnDatabase\Factory\Adapter\AdapterLoader',
		),
	),

	'rdn_factory_plugins' => array(
		'aliases' => array(
			'Database' => 'RdnDatabase:Database',
		),

		'invokables' => array(
			'RdnDatabase:Database' => 'RdnDatabase\Factory\Plugin\Database',
		),
	),

	'service_manager' => array(
		'factories' => array(
			'RdnDatabase\Adapter\AdapterManager' => 'RdnDatabase\Factory\Adapter\AdapterManager',
		),
	),
);
