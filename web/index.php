<?php

// comment out the following two lines when deployed to production
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';


putenv('YII_ENV=' . trim(file_get_contents(__DIR__ . '/../config/mode.php')));
putenv('YII_END=front');


$env = new \janisto\environment\Environment([
    dirname(__DIR__) . '/config/'
]);
$env->setup();

(new yii\web\Application($env->web))->run();
