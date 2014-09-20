<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array (
		'basePath' => dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..',
		'name' => 'First Finance',
		
		'params' => array (
				// this is used in contact page
				'adminEmail' => 'abhishek.bhattad@bradsol.com'
		),
		
		// preloading 'log' component
		'preload' => array (
				'log' 
		),
		
		// autoloading model and component classes
		'import' => array (
				'application.models.*',
				'application.components.*',
				'application.modules.user.models.*',
				'application.modules.user.components.*', 
		),
		
		'modules' => array (
				'user',
				// comment the following to disable the Gii tool
				'gii' => array (
						'class' => 'system.gii.GiiModule',
						'password' => 'firstfinance',
						// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters' => array ('127.0.0.1','::1'), 
		)),
		
		// application components
		'components' => array (
				'user' => array (
						// enable cookie-based authentication
						'allowAutoLogin' => true,
						'loginUrl' => array ('/user/login'), 
				),
				// comment the following to disable URLs in path-format
				
				'urlManager' => array (
						'urlFormat' => 'path',
						'rules' => array (
								'<controller:\w+>/<id:\d+>' => '<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
								'<controller:\w+>/<action:\w+>' => '<controller>/<action>' 
						) 
				),
				
				// uncomment the following to use a SQL Lite database
				/*
				 * 'db'=>array( 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db', ),
				 */
				
				'db' => array (
						'connectionString' => 'mysql:host=localhost;dbname=first_finance;port:8889',
						'emulatePrepare' => true,
						'username' => 'root',
						'password' => 'root',
						'charset' => 'utf8' 
				),
				
				'errorHandler' => array (
						// use 'site/error' action to display errors
						'errorAction' => 'site/error' 
				),
				'log' => array (
						'class' => 'CLogRouter',
						'routes' => array (
								array (
										'class' => 'CFileLogRoute',
										'levels' => 'error, warning' 
								) 
						// uncomment the following to show log messages on web pages
						/*
						 * array( 'class'=>'CWebLogRoute', ),
						 */
						 
				) 
		),
		
		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		
));