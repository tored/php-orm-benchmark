<?php

require dirname(__FILE__) . '/Propel15WithCacheTestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Propel15WithCacheTestSuite();
$test->initialize();
$test->run();
echo sprintf(" %11d | %6.2f |\n", (memory_get_usage(true) - $memory), (microtime(true) - $time));
