<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$app = dirname(__DIR__);
$vendorPath = $app . '/vendor';

$config = [
    'yiiPath' => $vendorPath . '/yiisoft/yii2/Yii.php',
    'yiiDebug' => true,
    'yiiEnv' => 'dev',
    'aliases' => [
        'vendor' => $vendorPath,
        'root' => $app,
        //'runtime' => $app . "/runtime",
        'web' => $app . '/web',
        'media' => $app . '/web/media',
        'tests' => $app . '/tests',
        'console' => $app . '/console',
    ],
    'web' => [
        'id' => 'basic',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log', 'admin'],
        'aliases' => [
            '@bower' => '@vendor/bower-asset',
            '@npm'   => '@vendor/npm-asset',
        ],
        'components' => [
            'request' => [
                // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                'cookieValidationKey' => 'ebYDsgbD9Dh7rN_hirWvb1VdWs6Kkum9',
            ],
            'cache' => [
                'class' => 'yii\caching\MemCache',
            ],
            'user' => [
                'identityClass' => 'app\models\User',
                'enableAutoLogin' => true,
            ],
            'errorHandler' => [
                'errorAction' => 'site/error',
            ],
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
                'useFileTransport' => true,
            ],
            'log' => [
                'traceLevel' => 1,
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                ],
            ],
            'kkbPayment' => [
                'class' => 'naffiq\kkb\KKBPayment',

                // Расположение публичного ключа
                'publicKeyPath' => '@vendor/naffiq/yii2-kkb/payment-keys/test_pub.pem',
                // Расположение приватного ключа
                'privateKeyPath' => '@vendor/naffiq/yii2-kkb/payment-keys/test_prv.pem',
                // Ключевая фраза к приватному ключу
                'privateKeyPassword' => 'nissan',

                // ID онлайн-магазина в системе kkb
                'merchantId' => '92061101',
                // ID сертификата онлайн-магазина в системе kkb
                'merchantCertificateId' => '00C182B189',
                // Название магазина
                'merchantName' => 'Test shop',
            ],
        ],

        'modules' => [
            'admin' => [
                'class' => \naffiq\bridge\BridgeModule::className(),
                'modules' => [
                    'content' => '\app\modules\content\Module'
                ]
            ]
        ],
        'params' => $params,
    ],
    'console' => [
        'id' => 'basic-console',
        'basePath' => dirname(__DIR__),
        'bootstrap' => ['log', 'admin'],
        'controllerNamespace' => 'app\commands',
        'components' => [
            'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
            'log' => [
                'targets' => [
                    [
                        'class' => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'db' => $db,
        ],
        'params' => $params,

        'modules' => [
            'admin' => [
                'class' => \naffiq\bridge\BridgeModule::className(),

            ]
        ],
    ],
];

return $config;
