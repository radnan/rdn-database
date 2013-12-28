<?php

namespace RdnDatabase\Factory\Plugin;

use RdnFactory\Plugin\AbstractPlugin;
use Zend\Db\Adapter\Adapter;

class Database extends AbstractPlugin
{
	/**
	 * Get a database adapter with the given name.
	 *
	 * @param string $name
	 *
	 * @return Adapter
	 */
	public function __invoke($name = 'default')
	{
		$adapters = $this->factory->service('RdnDatabase\Adapter\AdapterManager');
		return $adapters->get($name);
	}
}
