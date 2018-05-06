<?php

namespace core\lib;

use core\lib\config;

class route
{

    // controller默认为index
    public $controller;
    // action默认为index
    public $action;

    public function __construct()
    {
        $REQUEST_URI = $_SERVER['REQUEST_URI'];
        if (isset($REQUEST_URI) && $REQUEST_URI != '/') {
            $path_array = explode('/', trim($REQUEST_URI, '/'));
            if (isset($path_array[0])) {
                $this->controller = $path_array[0];
                unset($path_array[0]);
            }

            if (isset($path_array[1])) {
                $this->action = $path_array[1];
                unset($path_array[1]);
            } else {
                // 指定默认action为route中的action配置项
                $this->action = config::query('action', 'route');
            }

            // URL中的GET参数
            $count = count($path_array) + 2;
            $idx = 2;
            while ($idx < $count) {
                if (isset($path_array[$idx + 1])) {
                    $_GET[$path_array[$idx]] = $path_array[$idx + 1];
                }
                $idx = $idx + 2;
            }
        } else {
            // 指定默认controller为route中的controller配置项
            $this->controller = config::query('controller', 'route');
            // 指定默认action为route中的action配置项
            $this->action = config::query('action', 'route');
        }
    }

}
