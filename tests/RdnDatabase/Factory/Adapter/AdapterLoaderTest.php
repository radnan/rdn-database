<?php

namespace RdnDatabase\Factory\Adapter;

use RdnDatabase\Adapter;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

class AdapterLoaderTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Adapter\AdapterManager
	 */
	private $adapters;

	public function setUp()
	{
		$config = include __DIR__ .'/../../../../config/module.config.php';

		$config['rdn_db_adapters']['adapters']['foo'] = array(
			'driver' => 'pdo_sqlite',
			'database' => '/tmp/foo.sqlite',
		);

		$services = new ServiceManager(new Config($config['service_manager']));
		$services->setService('Config', $config);

		$this->adapters = $services->get('RdnDatabase\Adapter\AdapterManager');
	}

	public function testCanCreateFromConfig()
	{
		/** @var \Zend\Db\Adapter\Adapter $adapter */
		$adapter = $this->adapters->get('foo');
		$this->assertInstanceOf('Zend\Db\Adapter\Adapter', $adapter);
	}
}
