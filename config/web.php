<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'en',
    'components' => [

	    'language'=>'en-EN',
	    'i18n' => [
		    'translations' => [
			    '*' => [
				    'class' => 'yii\i18n\PhpMessageSource',
				    'basePath' => '@app/messages',
				    'sourceLanguage' => 'en',
				    'fileMap' => [
					    //'main' => 'main.php',
				    ],
			    ],
		    ],
	    ],
        'request' => [
	        'class' => 'app\components\LangRequest',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'NtC8TLEAnI8DYwWjrjdaauocn_HQfZ-p',
	        'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db,

        'urlManager' => [
        	'suffix'=>'/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
	        'class'=>'app\components\LangUrlManager',
            'rules' => [
	            '<action:(about|delivery|user-agreement|contact|returns|privacy|terms-and-conditions)>' => 'site/info',
            	'site/callback' => 'site/callback',
            	'contact-us' => 'site/form',
	            '<section>/<brand>/<gender>'=>'site/products',
	            '<section>/<brand>'=>'site/products',
            	'<section>'=>'site/products',
            	'/'=>'site/index',
            ],
        ],
	    'mailer' => [
		    'class' => 'yii\swiftmailer\Mailer',

		    'useFileTransport' => false,

		    'transport' => [
			    'class' => 'Swift_SmtpTransport',
			    'host' => 'mail.ukraine.com.ua',
			    'username' => 'form@adamantstore.com',
			    'password' => 'U90l80ejkPPY',
			    'port' => '25',
		    ],
	    ],

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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
