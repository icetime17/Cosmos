<?php

namespace core\lib;

class config
{

    static $config = array();

    /*
     * 获取指定配置文件中的对应config项
     * */
    static public function query($name, $file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file][$name];
        } else {
            $filePath = COSMOS . '/core/config/' . $file . '.php';
            if (is_file($filePath)) {
                $config = include $filePath;
                if (isset($config[$name])) {
                    self::$config[$file] = $config;
                    return $config[$name];
                } else {
                    throw new \Exception('找不到该配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    /*
    * 获取指定配置文件中的所有项
    * */
    static public function queryAll($file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file];
        } else {
            $filePath = COSMOS . '/core/config/' . $file . '.php';
            if (is_file($filePath)) {
                $config = include $filePath;
                self::$config[$file] = $config;
                return $config;
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}
