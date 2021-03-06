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
    'components' => [
    	'assetManager' => [
    		'basePath' => '@webroot/assets',
		    'baseUrl' => '@web/assets',
	    ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
	        'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],//['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-backend',//'advanced-frontend',
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
            	'' => 'site/index',
	            '<action>' => 'site/<action>',
            ],
        ],
	    'i18n' => [
		    'translations' => [
			    '*' => [
				    'class' => 'yii\i18n\DbMessageSource',
			    ],
		    ],
	    ],
    ],
    'params' => $params,
	'language' => 'ru-RU',
	'sourceLanguage' => 'en-US',
];
