<?php
return [
    'yiiDebug' => true,
    'yiiEnv' => 'dev',
    'web' => [
        'bootstrap' => ['debug', 'gii'],
        'modules' => [
            'debug' => [
                'class' => 'yii\debug\Module',
                // uncomment the following to add your IP if you are not connecting from localhost.
                //'allowedIPs' => ['127.0.0.1', '::1'],
            ],
            'gii' => [
                'class' => 'yii\gii\Module',
                // uncomment the following to add your IP if you are not connecting from localhost.
                //'allowedIPs' => ['127.0.0.1', '::1'],
            ]
        ],
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

    ]
];