$preset=DeliPreset::model()->with(array('tasks','tasks.preusn','tasks.preusn.usnitems','tasks.predsn','tasks.predsn.dsnitems','dailytasks','weeklytasks'))->FindByPk($deli);












1) Gii
2) model relationships
3) Extensions
4) modules
5) simple database queries
6) form validations
7) themes
8)Documentations
9) securities
10 caching
11) debugging
12) sessions
13) config parameters
14) speed
15) Url manager
http://www.sitepoint.com/7-reasons-choose-yii-2-framework/



<?php
define('YII_DEBUG_SHOW_PROFILER',true);
error_reporting(E_ALL);
ini_set("display_startup_errors","1");
ini_set("display_errors","1");
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Goal surf',
	//'theme'=>'memories',
	'theme'=>'goalsurf',
	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.behaviors.*',
		'application.modules.user.models.*',
		'application.modules.user.UserModule',
		'application.modules.user.components.*',
		'ext.YiiMailer.YiiMailer',
		'application.libs.*',
		'ext.yii-mail.YiiMailMessage',
		'application.modules.dashboard.DashboardModule',
	),
	'defaultController'=>'index',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
		'test',
		
		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => false,
 
            # allow access for non-activated users
            'loginNotActiv' => true,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true, 
 
            # automatically login from registration
            'autoLogin' => true,
           
 
            # registration path
            'registrationUrl' => array('/'),
            
			'captcha'=>array('registration'=>false),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login            
         //   'returnUrl' => array('/admin'),
            'returnUrl' => array('/gplus'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
   
		
		
	),

	// application components
	'components'=>array(
		'cache' => array('class' => 'system.caching.CDummyCache'),
		'phpThumb'=>array(
		'class'=>'ext.EPhpThumb.EPhpThumb',
		'options'=>array()
		),
		'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
           //  'class' => 'WebUser',
        ),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'user' => 'profile/index',
				'profile/<username>' => 'profile/index',  
				'addfriend' => 'profile/addfriend',
				'page/<slug>'=>'page/index',
				'addfriend/<username>' => 'profile/addfriend',
				'userprofile/edit'=>'user/profile/edit',
				'userprofile/updatequote'=>'user/profile/updatefamousquote',
				'addjudge/<username>' => 'profile/addjudge',
				'addcoach/<username>' => 'profile/addcoach',
				'accept/<username>/<guid>' => 'profile/acceptfriend',
				'remove/<username>/<guid>' => 'profile/removefriend',
				'rejectrequest/<username>/<guid>' => 'profile/rejectrequest',
				'acceptjudgeinvitaion/<invitaionid>'=>'index/index',
				'removecoach'=>'profile/removecoach',
				
				
				'gii/<controller:\w+>/<action:[\w-]+>' => 'gii/<controller>/<action>',
				'admin/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:[\w-]+>/<guid>/<id>' => 'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:[\w-]+>/<guid>' => 'admin/<controller>/<action>',
				'admin/<controller:\w+>/<action:[\w-]+>' => 'admin/<controller>/<action>',
				'user/<controller:\w+>/<action:[\w-]+>' => 'user/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<sysid:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<guid>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<guid>/<id>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<guid>/<id>/<id2>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			
			),
			 
		),
		'PHPExcel' => array(
                    'class' => 'ext.PHPExcel.Classes.PHPExcel'
                ),
        'yexcel' => array(
					'class' => 'ext.yexcel.Yexcel'
				), 
		'session' => array(
			'sessionName' => 'SiteSession',
			'class' => 'CHttpSession',
			'autoStart' => true,
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		//~ 'db'=>array(
			//~ 'connectionString' => 'mysql:host=localhost;dbname=goalsurf_app',
			//~ 'emulatePrepare' => true,
			//~ 'username' => 'manoj',
			//~ 'password' => 'manoj@900',
			//~ 'charset' => 'utf8',
			//~ 'tablePrefix' => 'tbl_',
			
		//~ ),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=goalsurf-app',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'mysql@123',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
			
		),
		'interceptor' => array(
            'class' => 'HInterceptor',
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
		'myClass' => array(
			    'class' => 'application.components.MyClass',
		),

		'mail' => array(
                'class' => 'ext.yii-mail.YiiMail',
                'transportType'=>'smtp',
                'transportOptions'=>array(
                        'host'=>'smtp.gmail.com',
                        'username'=>'manoj.ris32@gmail.com',
                        'password'=>'manoj@41@',
                        'port'=>'465',                     
                ),
                'viewPath' => 'application.views.mail',             
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['adminEmail']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'manoj@localhost.com',
		'socket_server'=>'http://192.168.1.33:8080',
		'facebook_app_id'=>'1656112017938970',
		//'socket_server'=>'http://192.168.1.106:8080',
		'postslimit'=>10,
		'commentlimit'=>3,
		'rating'=>array('less1'=>5,'greater1less2'=>4,'greater2less4'=>3,'greater4less10'=>2,'greater10less20'=>1,'greater20'=>0),
		'max_msg'=>4,
		'webRoot' => dir(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'),
		'dateformat'=>'d M,Y',
		'defaultgoalcolor'=>'#0000ff',
		'guestuser'=>array(
							'email'=>'guest@goalsurf.com',
							'password'=>'guest@41@'
						   ),
		'notifications'=>array(
								'newgoal'=>'A new goal has been added. Goal:<b>{name}</b>',
								'newuser'=>'A new User has been registered. Name:<b>{name}</b>',
								),
		'usernotifications'=>array(
									'postnews'=>'get notification if a friend/circle post an update',
									'goalcomplete'=>'Get notification if a friend completed a goal',
									'newgoal'=>'Get notifications if a friend/circle added a new goal',
									)										   
	),
);
