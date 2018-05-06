<?php

namespace core\lib\driver\log;

use core\lib\config;

class file
{

    public $path;

    public function __construct()
    {
        $this->path = config::query('options', 'log')['path'];
    }

    public function log($event, $file = 'log')
    {
        $dir = $this->path . date('YmdH');
        if (!is_dir($dir)) {
            mkdir($dir, '777', true);
        }
        $data = date('Y-m-d H:i:s') . ' ' . json_encode($event) . PHP_EOL;
        return file_put_contents($dir . '/' . $file . '.log', $data, FILE_APPEND);
    }
}
