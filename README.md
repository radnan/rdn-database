RdnDatabase
===========

The **RdnDatabase** ZF2 module provides a service locator for database adapters.

## How to install

1. Use `composer` to require the `radnan/rdn-database` package:

   ~~~bash
   $ composer require radnan/rdn-database:1.*
   ~~~

2. Activate the module by including it in your `application.config.php` file:

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

You can use the **adapters** key to dynamically create adapters using simple configuration:

~~~php
<?php

return array(
	'rdn_db_adapters' => array(
		'adapters' => array(
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

### Factories

The module depends on the [RdnFactory](https://github.com/radnan/rdn-factory) module and provides a `database()` plugin you can use when creating factory classes.

~~~php
namespace App\Factory\Controller;

use App\Controller;
use RdnFactory\AbstractFactory;

class Index extends AbstractFactory
{
	protected function create()
	{
		$adapter = $this->database('default');
		return new Controller\Index($adapter);
	}
}
~~~
