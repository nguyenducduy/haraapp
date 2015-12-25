<?php

/**
 * Access Controll List (ACL) Config Variable for Core Framework
 * @var array
 */
define('GROUP_GUEST', 1);
define('GROUP_ADMIN', 5);
define('GROUP_MOD', 10);
define('GROUP_MEMBER', 15);

return [
    'publicEndpoint' => [
        '/v1/user/login/email',
        '/',
        '/proxy.html'
    ],

    'acl' => [
        GROUP_GUEST => [
            'User' => [
                'admin/*',
            ],
            'Category' => [
                'adminclassified/*',
                'adminfieldsets/*',
            ],
            'Fields' => [
                'admin/*',
            ],
            'Core' => [
                'error/*'
            ]
        ],

        GROUP_ADMIN => [
            'User' => [
                'admin/*',
                'site/*',
            ],
            'Core' => [
                'error/*'
            ]
        ],

        GROUP_MOD => [
            'User' => [
                'admin/*',
            ],
            'Core' => [
                'error/*'
            ]
        ],

        GROUP_MEMBER => [
            'User' => [
                'admin/*',
            ],
            'Core' => [
                'error/*'
            ]
        ],
    ]
];
