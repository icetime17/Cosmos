<?php

print "Cosmos is a simple PHP web framework.";

define('COSMOS', realpath('./'));
define('CORE', COSMOS . '/core');
define('APP', COSMOS . '/app');

define('DEBUG', true);
if (DEBUG) {
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

include CORE . '/common/common.php';

include CORE . '/cosmos.php';

// 当new一个类的时候, 若该类不存在, 则触发指定方法.
spl_autoload_register('\core\cosmos::load');

\core\cosmos::run();
