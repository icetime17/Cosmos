<?php

namespace core\lib;

use core\lib\config;
use \core\lib\log;

class model extends \PDO
{

    public function __construct()
    {
        $database = config::queryAll('database');
        try {
            parent::__construct($database['dsn'], $database['username'], $database['passwd']);

            \core\lib\log::log('connect to database: ' . $database['dsn'], 'cosmos');
        } catch (\PDOException $e) {
            \core\lib\log::log('fail to connect to database: ' . $database['dsn'] . ' ' . $e->getMessage(), 'cosmos');
        }
    }

}
