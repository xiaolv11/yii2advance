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
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'enableCsrfCookie' => true,
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
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            //是否开启路由美化
            'enablePrettyUrl' => true,
            //是否展示Index.php
            'showScriptName' => false,
            //路由后缀
            'suffix'=>'.html',
            //是否开启严格路由
            'enableStrictParsing'=>true,
            //验证规则
            'rules' => [
                //路由表达式=>实际地址
                "/login"=>'/test/entryfrom',
                "/number/<number:\d+>"=>"/test/member",
                "/ahref"=>"/test/ahref",
                '/session'=>"/test/session",
                "/cookie"=>'/test/cookie',
                "/redis"=>'/test/redis',
                "/phref/<id:\d+>"=>"/test/phref",
                '/testgoods'=>"/test/goodslist",
                "<controller:\w+>/<action:\w+>"=>"<controller>/<action>",
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];
