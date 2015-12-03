<?php
echo "| Library                          | Insert | findPk | complex| hydrate|  with  | memory usage |  time  |\n";
echo "| --------------------------------:| ------:| ------:| ------:| ------:| ------:| ------------:| ------:|\n";

passthru(PHP_BINARY . ' raw_pdo/TestRunner.php');
passthru(PHP_BINARY . ' lessql/TestRunner.php');
passthru(PHP_BINARY . ' propel_16/TestRunner.php');
passthru(PHP_BINARY . ' propel_16_with_cache/TestRunner.php');
passthru(PHP_BINARY . ' propel_17/TestRunner.php');
passthru(PHP_BINARY . ' propel_17_with_cache/TestRunner.php');
passthru(PHP_BINARY . ' propel_20/TestRunner.php');
passthru(PHP_BINARY . ' propel_20_with_cache/TestRunner.php');
passthru(PHP_BINARY . ' doctrine_24/TestRunner.php');
