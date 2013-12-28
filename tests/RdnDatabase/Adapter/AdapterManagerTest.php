<?php

namespace RdnDatabase\Adapter;

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

class AdapterManagerTest extends \PHPUnit_Framework_TestCase
{
	public function testFactory()
	{
		$config = include __DIR__ .'/../../../config/module.config.php';

		$services = new ServiceManager(new Config($config['service_manager']));
		$services->setService('Config', $config);

		$adapters = $services->get('RdnDatabase\Adapter\AdapterManager');
		$this->assertInstanceOf('RdnDatabase\Adapter\AdapterManager', $adapters);
	}
}
