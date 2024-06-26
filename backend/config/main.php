<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','gii'],
    'modules' => [
        'gii' => [
             'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1'], // Adjust this to your needs
            'as access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Atur akses Gii hanya untuk pengguna yang sudah login
                    ],
                    [
                        'allow' => true,
                        'ips' => ['127.0.0.1', '::1'], // Sesuaikan dengan IP Anda
                    ],
                ],
            ],

        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        'klinik' => [
            'class' => 'common\modules\klinik\Module',
        ],
    ],
   /* 'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
        ],
    ],*/
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
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
        ],*/
    ],
    'params' => $params,
];
