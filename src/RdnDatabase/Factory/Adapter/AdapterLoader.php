<?php

namespace RdnDatabase\Factory\Adapter;

use PDO;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdapterLoader implements AbstractFactoryInterface
{
	public function canCreateServiceWithName(ServiceLocatorInterface $adapters, $name, $rName)
	{
		if ($adapters instanceof ServiceLocatorAwareInterface)
		{
			$services = $adapters->getServiceLocator();
		}
		else
		{
			$services = $adapters;
		}

		$config = $services->get('Config');
		return isset($config['rdn_db_adapters']['adapters'][$rName]);
	}

	public function createServiceWithName(ServiceLocatorInterface $adapters, $name, $rName)
	{
		if ($adapters instanceof ServiceLocatorAwareInterface)
		{
			$services = $adapters->getServiceLocator();
		}
		else
		{
			$services = $adapters;
		}

		$config = $services->get('Config');
		$spec = array_replace_recursive(array(
			'profiler' => true,
			'driver_options' => array(
				PDO::ATTR_TIMEOUT => 5,
			),
		), $config['rdn_db_adapters']['adapters'][$rName]);

		return new Adapter($spec);
	}
}
