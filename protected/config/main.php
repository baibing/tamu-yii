<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Group Reservation',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'ext.yii-mail.YiiMailMessage',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'adm1n',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		// Enables the installer
		'rights'=>array(
			'install'=>true,
		),		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			// Allows super users access implicitly.
			'class'=>'RWebUser',
		),
		// Provides support authorization item sorting
		'authManager'=>array(
			'class'=>'RDbAuthManager',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		// uncomment the following to use a sqlite database
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=campusvisit_dev',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
			// turn on schema caching to improve performance
            // 'schemaCachingDuration' => 3600,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType'=>'smtp',
            'transportOptions'=>array(
                'host'=>'smtp.gmail.com',
                'username'=>'zhengbernard@gmail.com',
                'password'=>'',
                'port'=>'465',
                'encryption'=>'ssl',
            ),
            'viewPath' => 'application.views.mail',             
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
	
	//'theme' => 'classic',
	
);