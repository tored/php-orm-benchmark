<?php

require dirname(__FILE__) . '/Propel20FormatOnDemandTestSuite.php';

$time = microtime(true);
$memory = memory_get_usage(true);
$test = new Propel20FormatOnDemandTestSuite();
$test->initialize();
$test->run();
echo sprintf(" %11d | %6.2f |\n", (memory_get_usage(true) - $memory), (microtime(true) - $time));
