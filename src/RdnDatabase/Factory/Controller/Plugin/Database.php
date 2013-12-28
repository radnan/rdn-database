<?php

namespace RdnDatabase\Factory\Controller\Plugin;

use RdnDatabase\Controller\Plugin;
use RdnFactory\AbstractFactory;

class Database extends AbstractFactory
{
	protected function create()
	{
		$adapters = $this->service('RdnDatabase\Adapter\AdapterManager');
		return new Plugin\Database($adapters);
	}
}
