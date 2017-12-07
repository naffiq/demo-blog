<?php
return [
    'yiiDebug' => false,
    'yiiEnv' => 'prod',
    'web' => [
        'components' => [
            'log' => [
                'traceLevel' => 3,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=localhost;dbname=db_new_banners',
                'username' => 'db_new_banners',
                'password' => 'dMQ6D4a7rsEiahzB',
                'charset' => 'utf8mb4',

                // Schema cache options (for production environment)
                //'enableSchemaCache' => true,
                //'schemaCacheDuration' => 60,
                //'schemaCache' => 'cache',
            ]
        ]
    ],
    'console' => [

        'components' => [

            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=localhost;dbname=db_new_banners',
                'username' => 'db_new_banners',
                'password' => 'dMQ6D4a7rsEiahzB',
                'charset' => 'utf8mb4',

                // Schema cache options (for production environment)
                //'enableSchemaCache' => true,
                //'schemaCacheDuration' => 60,
                //'schemaCache' => 'cache',
            ]
        ]
    ]
];