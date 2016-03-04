<?php
/**
 * Global configuration.
 */
return [
    'profiler' => true,
    'version' => [
        'css' => 1,
        'js' =>1
    ],
    'baseUrl' => 'https://haraapp.dev/',
    'staticUrl' => 'https://haraapp.dev/public/',
    'staticFive' => '/data/web/five/public', //Not has end slashes
    'prefix' => 'haraapp_',
    'title' => 'haraapp - Development',
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
        'compileAlways' => true
    ],
    'session' => [
        'adapter' => 'Files'
    ],
    'assets' => [
        'local' => 'assets/'
    ],
    'metadata' => [
        'adapter' => 'Memory',
        'metaDataDir' => ROOT_PATH . '/app/var/cache/metadata/'
    ],
    'annotations' => [
        'adapter' => 'Memory',
        'annotationsDir' => ROOT_PATH . '/app/var/cache/annotations/'
    ],
    'user' => [
        'directory' => '/uploads/avatar/',
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
    'product' => [
        'directory' => '/uploads/products/',
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
