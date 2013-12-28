<?php

namespace RdnDatabase\Controller\Plugin;

use RdnDatabase\Adapter\AdapterManager;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Fetch a database adapter from the service locator.
 */
class Database extends AbstractPlugin
{
	/**
	 * @var AdapterManager
	 */
	protected $adapters;

	public function __construct(AdapterManager $adapters)
	{
		$this->adapters = $adapters;
	}

	/**
	 * Get an adapter instance
	 *
	 * @param string $name
	 *
	 * @return Adapter
	 */
	public function __invoke($name = 'default')
	{
		return $this->adapters->get($name);
	}
}
