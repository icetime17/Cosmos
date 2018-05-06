<?php

namespace core;

class cosmos
{

    // 已加载的类, 防止重复加载
    static $classMap = array();
    public $params;

    // 启动框架
    static public function run()
    {
        \core\lib\log::init();
        \core\lib\log::log('Cosmos is running now...', 'cosmos');
        \core\lib\log::log($_SERVER, 'cosmos');

        $route = new \core\lib\route();

        $controller_prefix = $route->controller;
        $controller_file = APP . '/controller/' . $controller_prefix . 'Controller.php';
        if (is_file($controller_file)) {
            include $controller_file;

            $controller_class = '\\app\\controller\\' . $controller_prefix . 'Controller';
            $controller = new $controller_class();
            $action = $route->action;

            $controller->$action();

            \core\lib\log::log('controller->action : ' . $controller_class . '->' . $action, 'cosmos');
        } else {
            throw new \Exception('Can not find controller ' . $controller_prefix . 'Controller');
        }
    }

    /*
     * 自动加载类库
     * 如: 类为 $class = '\core\route';
     * 则: 加载 COSMOS . '/core/route.php'
     * */
    static public function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        }

        $class = str_replace('\\', '/', $class);
        $classFile = COSMOS . '/' . $class . '.php';
        if (is_file($classFile)) {
            include $classFile;
            self::$classMap[$class] = $class;
        } else {
            return false;
        }
    }

    /*
     * 设置参数
     * */
    public function setParameter($name, $value)
    {
        $this->params[$name] = $value;
    }

    /*
     * 渲染界面
     * */
    public function render($file)
    {
        $file = APP . '/view/' . $file;
        if (is_file($file)) {
            // 将array拆成一个个单独的变量
            extract($this->params);
            include $file;

            \core\lib\log::log('render : ' . $file, 'cosmos');
        }
    }
}
