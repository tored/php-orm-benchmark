<?php

require dirname(__FILE__) . '/Propel14TestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Propel14TestSuite();
$test->initialize();
$test->run();
echo sprintf(" %11d | %6.2f |\n", (memory_get_usage(true) - $memory), (microtime(true) - $time));
