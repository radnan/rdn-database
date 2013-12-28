<?php

namespace RdnDatabase\Adapter;

use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

/**
 * Service locator for database adapters.
 */
class AdapterManager extends AbstractPluginManager
{
	public function validatePlugin($plugin)
	{
		if ($plugin instanceof AdapterInterface)
		{
			return true;
		}

        throw new Exception\RuntimeException(sprintf(
            'Adapter of type %s is invalid; must implement %\AdapterInterface'
			, is_object($plugin) ? get_class($plugin) : gettype($plugin)
			, 'Zend\Db\Adapter'
        ));
	}
}
