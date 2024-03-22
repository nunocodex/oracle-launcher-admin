<?php

return [
    'icon' => 'https://avatars.githubusercontent.com/u/158091495?s=200&v=4',

    'background' => '/images/background.jpeg',

    'support_url' => 'https://discord.gg/ATz7gb8H',

    'server' => [
        'php' => [
            'name' => 'PHP Version',
            'version' => '>= 8.1.0',
            'check' => [
                'type' => 'php',
                'value' => 80100
            ]
        ],
        'pdo' => [
            'name' => 'PDO',
            'check' => [
                'type' => 'extension',
                'value' => 'pdo_mysql'
            ]
        ],
        'mbstring' => [
            'name' => 'Mbstring extension',
            'check' => [
                'type' => 'extension',
                'value' => 'mbstring'
            ]
        ],
        'fileinfo' => [
            'name' => 'Fileinfo extension',
            'check' => [
                'type' => 'extension',
                'value' => 'fileinfo'
            ]
        ],
        'openssl' => [
            'name' => 'OpenSSL extension',
            'check' => [
                'type' => 'extension',
                'value' => 'openssl'
            ]
        ],
        'tokenizer' => [
            'name' => 'Tokenizer extension',
            'check' => [
                'type' => 'extension',
                'value' => 'tokenizer'
            ]
        ],
        'json' => [
            'name' => 'Json extension',
            'check' => [
                'type' => 'extension',
                'value' => 'json'
            ]
        ],
        'curl' => [
            'name' => 'Curl extension',
            'check' => [
                'type' => 'extension',
                'value' => 'curl'
            ]
        ],
        'xmlwriter' => [
            'name' => 'XML Writer extension',
            'check' => [
                'type' => 'extension',
                'value' => 'xmlwriter'
            ]
        ]
    ],

    'folders' => [
        'storage.framework' => [
            'name' => '/storage/framework',
            'check' => [
                'type' => 'directory',
                'value' => '../storage/framework'
            ]
        ],
        'storage.logs' => [
            'name' => '/storage/logs',
            'check' => [
                'type' => 'directory',
                'value' => '../storage/logs'
            ],
        ],
        'storage.cache' => [
            'name' => '/bootstrap/cache',
            'check' => [
                'type' => 'directory',
                'value' => '../bootstrap/cache'
            ]
        ],
    ],

    'database' => [
        'seeders' => false
    ],

    'commands' => [],

    'admin_area' => [
        'user' => [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'password'
        ]
    ],

    'login' => '/'
];
