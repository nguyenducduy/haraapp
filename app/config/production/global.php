<?php
/**
 * Global configuration.
 */
return [
    'profiler' => false,
    'version' => [
        'css' => 1,
        'js' =>1
    ],
    'baseUrl' => 'http://phalconkit.dev/',
    'staticUrl' => 'http://phalconkit.dev/',
    'prefix' => 'tpp_',
    'title' => 'Phalconkit',
    'cookieEncryptionkey' => 'KkX+DVfEA>196yN',
    'cache' => [
        'lifetime' => 86400,
        'adapter' => 'File',
        'cacheDir' => ROOT_PATH . '/app/var/cache/data/'
    ],
    'logger' => [
        'enabled' => false,
        'path' => ROOT_PATH . '/app/var/logs/',
        'format' => '[%date%][%type%] %message%'
    ],
    'view' => [
        'compiledPath' => ROOT_PATH . '/app/var/cache/volt/',
        'compiledExtension' => '.php',
        'compiledSeparator' => '_',
        'compileAlways' => false
    ],
    'session' => [
        'adapter' => 'Files'
    ],
    'assets' => [
        'local' => 'assets/'
    ],
    'metadata' => [
        'adapter' => 'Files',
        'metaDataDir' => ROOT_PATH . '/app/var/cache/metadata/'
    ],
    'annotations' => [
        'adapter' => 'Files',
        'annotationsDir' => ROOT_PATH . '/app/var/cache/annotations/'
    ],
    'adscategory' => [
        'directory' => '/uploads/adscategory/',
        'minsize' => 1000,
        'maxsize' => 1000000,
        'mimes' => [
            'image/gif',
            'image/jpeg',
            'image/jpg',
            'image/png',
        ],
        'sanitize' => true
    ],
];
