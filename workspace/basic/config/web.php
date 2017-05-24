<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ca',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BT2UrK0WlxDY1judYGONA8n2yR5Z7zvd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'yii2mod.comments' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/comments/messages',
                ],
                // ...
            ],
        ],
        
        
        /* Defecte */
        /*
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /* Defecte */
        /*
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],*/
        
        /* Modificat */
        // Configuracio de l'email de verificació d'usuari de la pàgina
        
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@app/mailer',
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => 'soundup69@gmail.com',
                    'password' => 'favestendres14',
                    'port' => '587',
                    'encryption' => 'tls',
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
        // selecciona la configuracio de la  bdd de l'arxiu db
        'db' => require(__DIR__ . '/db.php'), 
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        
    ],
    
    'modules' => [
        
        /*
        'user' => [
        'class' => 'dektrium\user\Module',
        
        ],
        */
        
        
        // Config del modul user/dektrium, per administrar usuaris
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,   // permet fer login sense confirmar email
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin','jordi','maxim'] // per definir nous
        ],
        
        
        // Config del modul de comentaris
            'comment' => [
        'class' => 'yii2mod\comments\Module',
        // when admin can edit comments on frontend
        'controllerMap' => [
        'comments' => 'yii2mod\comments\controllers\ManageController',
  ] 
        
    ],
    


        
    
],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1','*'],
    ];
}

return $config;
