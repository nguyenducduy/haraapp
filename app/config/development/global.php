<?php
/**
 * Global configuration.
 */
return [
    'profiler' => false,
    'baseUrl' => 'http://haraapp.dev/',
    'staticUrl' => 'http://haraapp.dev/public/',
    'prefix' => 'tpp_',
    'title' => 'haraapp - Development',
    'cookieEncryptionkey' => 'KkX+DVfEA>196yN',

    'xdomain' => [
        'route' => '/proxy.html',
        'viewPath' => 'proxy.phtml'
    ],

    'version' => [
        'css' => 1,
        'js' =>1
    ],

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

    'googleClient' => [
        'clientId' => 'your-google-client-id.apps.googleusercontent.com',
        'clientSecret' => 'your-client-secret',
        'redirectUri' => 'postmessage',
        'scopes' => 'https://www.googleapis.com/auth/userinfo.profile',
    ],

    'authentication' => [
        'jwtSecret' => 'example_key',
        'genSalt' => 'should-also-be-in-application-env',
        'expireTime' => 86400 * 7, // One week till token expires
    ],

    'phpmailer' => [
        'debugMode' => 0, // 0 = off, 1 = client messages, 2 = client and server messages
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'smtpSecure' => 'tls',
        'smtpAuth' => true,
        'from' => ['your-email-address', 'your-name'],
        'replyTo' => ['your-email-address', 'your-name'],
        'username' => 'your-email-address-or-username',
        'password' => 'your-password',
    ],

    'activationMail' => [
        'subject' => 'Activate your account',
        'template' => 'mail/activation', // in views folder
    ],

    'errorMessages' => [
        // General
        1001 => [
            'statuscode' => 404,
            'message' => 'General: Not found',
        ],

        1002 => [
            'statuscode' => 500,
            'message' => 'Server internal error'
        ],

        // Data
        2001 => [
            'statuscode' => 404,
            'message' => 'Data: Duplicate data',
        ],

        2002 => [
            'statuscode' => 404,
            'message' => 'Data: Not Found',
        ],

        2003 => [
            'statuscode' => 404,
            'message' => 'Failed to process data',
        ],

        2004 => [
            'statuscode' => 404,
            'message' => 'Data: Invalid',
        ],

        2005 => [
            'statuscode' => 404,
            'message' => 'Action failed',
        ],

        2010 => [
            'statuscode' => 404,
            'message' => 'Data: Not Found',
        ],

        2020 => [
            'statuscode' => 500,
            'message' => 'Data: Failed to create',
        ],

        2030 => [
            'statuscode' => 500,
            'message' => 'Data: Failed to update',
        ],

        2040 => [
            'statuscode' => 500,
            'message' => 'Data: Failed to delete',
        ],

        2060 => [
            'statuscode' => 404,
            'message' => 'Data: Rejected',
        ],

        2070 => [
            'statuscode' => 403,
            'message' => 'Data: Action not allowed',
        ],

        // Authentication
        3006 => [
            'statuscode' => 404,
            'message' => 'Auth: No authentication bearer present',
        ],

        3007 => [
            'statuscode' => 404,
            'message' => 'Auth: No username present',
        ],

        3008 => [
            'statuscode' => 404,
            'message' => 'Auth: Invalid authentication bearer type',
        ],

        3009 => [
            'statuscode' => 404,
            'message' => 'Auth: Bad login credentials',
        ],

        3010 => [
            'statuscode' => 401,
            'message' => 'Auth: Unauthorized',
        ],

        3011 => [
            'statuscode' => 404,
            'message' => 'Auth: No password present',
        ],

        3020 => [
            'statuscode' => 403,
            'message' => 'Auth: Forbidden',
        ],

        3030 => [
            'statuscode' => 401,
            'message' => 'Auth: Session expired',
        ],

        4001 => [
            'statuscode' => 404,
            'message' => 'Google: No data',
        ],

        4002 => [
            'statuscode' => 404,
            'message' => 'Google: Bad login',
        ],

        4003 => [
            'statuscode' => 404,
            'message' => 'User: Not active',
        ],

        4004 => [
            'statuscode' => 404,
            'message' => 'User: Not found',
        ],

        4005 => [
            'statuscode' => 404,
            'message' => 'User: Registration failed',
        ],

        4006 => [
            'statuscode' => 404,
            'message' => 'User: Modification failed',
        ],

        4007 => [
            'statuscode' => 404,
            'message' => 'User: Creation failed',
        ],

        // PDO
        23000 => [
            'statuscode' => 404,
            'message' => 'Duplicate entry',
        ],
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
];
