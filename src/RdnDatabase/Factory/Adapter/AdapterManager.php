<?php

namespace RdnDatabase\Factory\Adapter;

use RdnDatabase\Adapter;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdapterManager implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $services)
	{
		$config = $services->get('Config');
		$config = new Config($config['rdn_db_adapters']);

		$adapters = new Adapter\AdapterManager($config);
		$adapters->setServiceLocator($services);

		return $adapters;
	}
}
