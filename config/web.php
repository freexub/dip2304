<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'aliases' => [
//        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            #'defaultRoles' => ['prepod'],
            #'defaultRoles' => ['guest'],
            'defaultRoles' => ['worker'],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'iuf4y4w7fh43iufhr98',
	    'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.kstu.kz',
                'username' => 'drcu@kstu.kz',
                'password' => '123654789!qaz',
                'port' => '465',
                'encryption' => 'ssl',
            ],
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
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
//                ],
//            ],
//        ],
        'db' => require(__DIR__ . '/db.php'),
        /**/
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
		    '' => 'site/index',
	            '<action>'=>'site/<action>',
            ],
        ],

    ],
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module']
        ,
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',

        'allowActions' => [
            'site/*',
            /*'data/*',
            'rbac/*',
            'admin/*',
            'post/index',*/
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        #'allowedIPs' => ['172.16.6.243', '::1'],
    ];
}

return $config;
