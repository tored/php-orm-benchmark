<?php

  require dirname(__FILE__) . '/Doctrine21WithCacheTestSuite.php';
  $time = microtime(true);
  $memory = memory_get_usage();
  $test = new Doctrine21WithCacheTestSuite();
  $test->initialize();
  $test->run();
  echo sprintf(" %11d | %6.2f |\n", (memory_get_usage(true) - $memory), (microtime(true) - $time));
