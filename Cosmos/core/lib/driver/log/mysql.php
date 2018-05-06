<?php

namespace core\lib\driver\log;

class mysql
{
    public function __construct()
    {

    }

    public function log($event)
    {
        p($event);
    }
}
