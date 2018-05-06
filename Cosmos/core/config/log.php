<?php

// remember use chmod -R 777 to handle file permission

return array(
    'driver' => 'file',
    'options' => array(
        'path' => COSMOS . '/log/',
    ),
);
