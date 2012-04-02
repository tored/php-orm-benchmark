<?php

require_once dirname(__FILE__) . '/DoctrineMTestSuite.php';

class DoctrineMWithCacheTestSuite extends DoctrineMTestSuite
{
    private $cache = null;

	function initialize()
	{
		parent::initialize();
		$this->cache = new Doctrine\Common\Cache\ArrayCache();
		$this->em->getConfiguration()->setMetadataCacheImpl($this->cache);
        $this->em->getConfiguration()->setQueryCacheImpl($this->cache);
        $this->em->getConfiguration()->setResultCacheImpl($this->cache);
	}

}