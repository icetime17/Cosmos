<?php

namespace core\lib;

use core\lib\config;

class log
{

    static $class;

    static public function init()
    {
        $driver = config::query('driver', 'log');
        $class = '\core\lib\driver\log\\' . $driver;
        self::$class = new $class;
    }

    /*
     * 找到指定的log方式, 调用其中的log方法.
     * */
    static public function log($event, $file = 'log')
    {
        self::$class->log($event, $file);
    }
}
