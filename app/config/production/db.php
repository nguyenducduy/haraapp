<?php
return [
    'mysql' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'port' => '3306',
        'username' => 'root',
        'password' => 'root',
        'dbname' => 'tpp',
    ],
    'memcached' => [
        'host' => 'localhost',
        'port' => 11211,
        'lifetime' => 3600
    ],
    'beanstalkd' => [
        'host' => 'localhost',
        'port' => 11300
    ],
    'sphinx' => [
        'host' => 'localhost',
        'realtime_port' => 9306,
        'plain_port' => 9312
    ]
];