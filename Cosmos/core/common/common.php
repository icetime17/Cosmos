<?php

function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } elseif (is_null($var)) {
        var_dump(null);
    } else {
        print "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:1;'>" . print_r($var, true) . "</pre>";
    }
}
