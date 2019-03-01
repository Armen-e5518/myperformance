<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'impact/<year:\d+>' => 'impact',
                'user-impact/<year:\d+>/<id:\d+>' => 'impact/user',
                'goals/<year:\d+>' => 'goals',
                'user-goals/<year:\d+>/<id:\d+>' => 'goals/user',
                'annual/<year:\d+>' => 'annual',
                'user-annual/<year:\d+>/<id:\d+>' => 'annual/user',
                'behavioral/<year:\d+>' => 'behavioral',
                'user-behavioral/<year:\d+>/<id:\d+>' => 'behavioral/user',
                'development/<year:\d+>' => 'development',
                'user-development/<year:\d+>/<id:\d+>' => 'development/user',
                'conversations/<year:\d+>' => 'conversations',
                'feedback/<year:\d+>' => 'feedback',
                'provide-feedback/<year:\d+>' => 'feedback/provide-feedback',
                'give-feedback/<year:\d+>/<id:\d+>' => 'feedback/give-feedback',
                'view-feedback/<year:\d+>/<id:\d+>' => 'feedback/view-feedback',
                'open-feedback/<year:\d+>/<id:\d+>' => 'open-feedback',
            ],
        ],

    ],
    'params' => $params,
];
