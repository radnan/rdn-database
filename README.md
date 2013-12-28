RdnDatabase
===========

Zend Framework 2 module that provides a service locator for database adapters.

Most application use more than one database adapter at a time. This module helps creating new database adapters a breeze.

## How to install

Use `composer` to require the `radnan/rdn-database` package:

~~~bash
$ composer require radnan/rdn-database:1.*
~~~

Activate the module by including it in your `application.config.php` file:

~~~php
<?php

return array(
	'modules' => array(
		'RdnDatabase',
		// ...
	),
);
~~~

## How to use

Simply configure your database adapters with the `RdnDatabase\Adapter\AdapterManager` service locator using the `rdn_db_adapters` configuration option. Adapters are instances of the `Zend\Db\Adapter\Adapter` class.

~~~php
<?php

return array(
	'rdn_db_adapters' => array(
		'invokables' => array(),
		'factories' => array(),
	),
);
~~~

You can use the `adapters` key to dynamically create adapters using simple configuration:

~~~php
<?php

return array(
	'rdn_db_adapters' => array(
		'adapters => array(
			'default' => array(
				'driver'   => 'pdo_mysql',
				'hostname' => null,
				'port'     => null,
				'username' => null,
				'password' => null,
				'database' => null,
			),
		),
	),
);
~~~

The configuration options are used to create a `Zend\Db\Adapter\Adapter` object.

### Controller Plugin

The module comes with the `database()` controller plugin that you can use to fetch database adapters from within a controller:

~~~php
class FooController
{
	public function indexAction()
	{
		/** @var \Zend\Db\Adapter\Adapter $adapter */
		$adapter = $this->database('default');
	}
}
~~~
