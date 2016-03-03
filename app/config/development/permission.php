<?php

/**
 * Access Controll List (ACL) Config Variable for Core Framework
 * @var array
 */
define('ROLE_GUEST', 1);
define('ROLE_ADMIN', 5);
define('ROLE_MOD', 10);
define('ROLE_MEMBER', 15);

return [
    ROLE_GUEST => [
        'User' => [
            'admin/*',
            'login/*'
        ],
        'Core' => [
            'error/*'
        ],
        'Import' => [
            // 'site/*',
            'site/test',
            'error/*'
        ]
    ],

    ROLE_ADMIN => [
        'User' => [
            'admin/*',
            'login/*',
            'logout/*'
        ],
        'Core' => [
            'error/*'
        ],
        'Import' => [
            'site/*',
            'home/*'
        ]
    ],

    ROLE_MEMBER => [
        'User' => [
            'admin/*',
            'login/*',
            'logout/*'
        ],
        'Core' => [
            'error/*'
        ],
        'Import' => [
            'site/*',
            'home/*'
        ]
    ],
];
