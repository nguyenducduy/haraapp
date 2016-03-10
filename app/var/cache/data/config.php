<?php
/**
* WARNING
*
* Manual changes to this file may cause a malfunction of the system.
* Be careful when changing settings!
*
*/

return array (
  'db' => 
  array (
    'mysql' => 
    array (
      'adapter' => 'Mysql',
      'host' => 'localhost',
      'port' => '3306',
      'username' => 'root',
      'password' => 'uCGoiZzJd7L94TWWVbau7nMnt',
      'dbname' => 'haraapp',
    ),
    'dbfive' => 
    array (
      'adapter' => 'Mysql',
      'host' => 'localhost',
      'port' => '3306',
      'username' => 'root',
      'password' => 'uCGoiZzJd7L94TWWVbau7nMnt',
      'dbname' => 'betafive',
    ),
    'queue' => 
    array (
      'max_retry' => 5,
      'host' => 'localhost',
      'port' => 11300,
      'prefix' => 'haraapp_',
    ),
    'redis' => 
    array (
      'host' => 'localhost',
      'port' => 6379,
    ),
  ),
  'global' => 
  array (
    'profiler' => false,
    'version' => 
    array (
      'css' => 1,
      'js' => 1,
    ),
    'baseUrl' => 'http://haraapp.dev/',
    'staticUrl' => 'http://haraapp.dev/',
    'staticFive' => '/data/web/five/public/',
    'prefix' => 'haraapp_',
    'title' => 'haraapp',
    'cookieEncryptionkey' => 'KkX+DVfEA>196yN',
    'cache' => 
    array (
      'lifetime' => 86400,
      'adapter' => 'File',
      'cacheDir' => ROOT_PATH . '/app/var/cache/data/',
    ),
    'logger' => 
    array (
      'enabled' => false,
      'path' => ROOT_PATH . '/app/var/logs/',
      'format' => '[%date%][%type%] %message%',
    ),
    'view' => 
    array (
      'compiledPath' => ROOT_PATH . '/app/var/cache/volt/',
      'compiledExtension' => '.php',
      'compiledSeparator' => '_',
      'compileAlways' => false,
    ),
    'session' => 
    array (
      'adapter' => 'Files',
    ),
    'assets' => 
    array (
      'local' => 'assets/',
    ),
    'metadata' => 
    array (
      'adapter' => 'Files',
      'metaDataDir' => ROOT_PATH . '/app/var/cache/metadata/',
    ),
    'annotations' => 
    array (
      'adapter' => 'Files',
      'annotationsDir' => ROOT_PATH . '/app/var/cache/annotations/',
    ),
    'user' => 
    array (
      'directory' => '/uploads/avatar/',
      'minsize' => 1000,
      'maxsize' => 1000000,
      'mimes' => 
      array (
        0 => 'image/gif',
        1 => 'image/jpeg',
        2 => 'image/jpg',
        3 => 'image/png',
      ),
      'sanitize' => true,
    ),
    'product' => 
    array (
      'directory' => '/uploads/products/',
      'minsize' => 1000,
      'maxsize' => 1000000,
      'mimes' => 
      array (
        0 => 'image/gif',
        1 => 'image/jpeg',
        2 => 'image/jpg',
        3 => 'image/png',
      ),
      'sanitize' => true,
    ),
  ),
  'permission' => 
  array (
    1 => 
    array (
      'User' => 
      array (
        0 => 'admin/*',
        1 => 'login/*',
      ),
      'Core' => 
      array (
        0 => 'error/*',
      ),
    ),
    5 => 
    array (
      'User' => 
      array (
        0 => 'admin/*',
        1 => 'login/*',
        2 => 'logout/*',
      ),
      'Core' => 
      array (
        0 => 'index/*',
        1 => 'error/*',
      ),
      'Import' => 
      array (
        0 => 'site/*',
        1 => 'home/*',
        2 => 'category/*',
      ),
    ),
  ),
  'events' => 
  array (
  ),
  'modules' => 
  array (
    0 => 'user',
    1 => 'import',
  ),
);