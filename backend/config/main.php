<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
     'modules' => [],
    'homeUrl' => '/myanimelist/administrator',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ], 
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_backendUser', 'httpOnly' => true, 'path'=>'/myanimelist/backend/web'],
        ],
        // 'session' => [
        //     // this is the name of the session cookie used for login on the backend
        //     'name' => 'advanced-backend',
        // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        //frontend
        'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/myanimelist/frontend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        ////
        'urlManagerFront' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/myanimelist/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'request' => [
            'baseUrl' => '/myanimelist/administrator',
        ],
        //belajar RBAC
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
    ],
    'params' => $params,
];
