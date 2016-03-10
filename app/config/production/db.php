<?php
return [
    'mysql' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'port' => '3306',
        'username' => 'root',
        'password' => 'uCGoiZzJd7L94TWWVbau7nMnt',
        'dbname' => 'haraapp',
    ],
    'dbfive' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'port' => '3306',
        'username' => 'root',
        'password' => 'uCGoiZzJd7L94TWWVbau7nMnt',
        'dbname' => 'betafive',
    ],
    'queue' => [
        'max_retry' => 5,
        'host' => 'localhost',
        'port' => 11300,
        'prefix' => 'haraapp_'
    ],
    'redis' => [
        'host' => 'localhost',
        'port' => 6379
    ]
];
