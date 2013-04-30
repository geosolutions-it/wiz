<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'WIZ Platform',
	'Language'=>'it',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*',
		'application.extensions.simpleWorkflow.*',      // Import simpleWorkflow extension
		'application.extensions.CJuiDateTimePicker.CJuiDateTimePicker',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
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
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			//'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			
			'connectionString' => 'pgsql:host=127.0.0.1;port=5432;dbname=acqueDB',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => 'postgres',
			'charset' => 'utf8',
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
					'levels'=>'error, warning, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		
		'mailer' => array(
			'class' => 'ext.swiftMailer.SwiftMailer',
			'mailer' => 'smtp',
			'host'=>'smtp.acque.it',
			'From'=>'sender@acque.it',
			'username'=>'sender@acque.it',
			'password'=>'password'
		),
		
		'ePdf' => array(
        	'class'         => 'ext.yii-pdf.EYiiPdf',
        	'params'        => array(
            	'mpdf'     => array(
                	'librarySourcePath' => 'application.vendors.mpdf.*',
                	'constants'         => array(
                    	'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                	),
                	'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                	/*
					'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
	                    'mode'              => '', //  This parameter specifies the mode of the new document.
	                    'format'            => 'A4', // format A4, A5, ...
	                    'default_font_size' => 0, // Sets the default document font size in points (pt)
	                    'default_font'      => '', // Sets the default font-family for the new document.
	                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
	                    'mgr'               => 15, // margin_right
	                    'mgt'               => 16, // margin_top
	                    'mgb'               => 16, // margin_bottom
	                    'mgh'               => 9, // margin_header
	                    'mgf'               => 9, // margin_footer
	                    'orientation'       => 'P', // landscape or portrait orientation
	                )*/
				),                                                     
            	'HTML2PDF' => array(
	                'librarySourcePath' => 'application.vendors.html2pdf.*',
                	'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                	/*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    	'orientation' => 'P', // landscape or portrait orientation
                    	'format'      => 'A4', // format A4, A5, ...
                    	'language'    => 'en', // language: fr, en, it ...
                    	'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    	'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    	'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                	)*/
				)
			
			),
            
        ),
        
		//simple Workflow source component
		'swSource'=> array(
			'class'=>'application.extensions.simpleWorkflow.SWPhpWorkflowSource',
		),
		
		//browser detection
		'browser' => array(
			'class' => 'application.extensions.Browser.CBrowserComponent',
		),
		
	),
	
	'behaviors' => array('ApplicationConfigBehavior'),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	
	'params'=>include(dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'params.php'), 
	/*
	'params'=>array(
		// this is used in contact page
		'site'=>'http://131.114.33.66/acque/index.php',
		'adminEmail'=>'acque@cpr.it',
		'debugEmail'=>'acque@cpr.it',
		'debug_email'=>false,
		'block_email'=>false,
		
		// role 
		//'defaultRole'=>'cittadino',
		'geoserver'=>array(
			'version'=>'1.1.0',
			'protocol'=>'http://',
			'ip'=>'131.114.33.66',
			'port'=>80,
			'path'=>'/geoserver',
			'wms'=>'/wms',
			'workspace'=>'acque',
			'layer_geom'=>'wr_geom',
			'default_srs'=>'EPSG:4326',
			'citystate_layer_srid'=>3003,
			'water_request_geometries_srid'=> 4326,
			'pdf_geoms'=>'pdf_geoms',
			'layer_dem'=>'DEM'
		),
		'water_demand_unit'=>'l/s',
		'decimals'=>2,
		'pe_precision'=>0,
		'wd_precision'=>2,
		'margin_precision'=>2,
		'pe_abbreviation'=>'PE',
		'formulas'=>array(
			'pe'=>'ae',
			'da'=>'da',
			'dg'=>'dg',
		),
		'water_demand_range'=>10,//percentage
		'geoserverIP'=>'131.114.33.66',
		'geoserverPort'=>'80',
		'geoserverPath'=>'/geoserver/wms',
		//Date Time Format used to render a date
		//See http://php.net/manual/en/function.date.php for the right format
		'dateTimeFormat'=>'j F Y, H:i',
		//Date Time Format used to store a date into DB
		'dateTimeFormatDB'=>'Y-m-d H:i:sO',
		//Date Format used to render a date
		'dateFormat'=>'Y-m-d',
		//EPANET parameters
		'EPANET'=>array(
			'section_marker_start'=>'[',
			'section_marker_end'=>']',
			'section_regular_expression'=>'/^\[[a-zA-Z0-9]{1,}\]/',
			'comment_marker'=>';',
			'section_junctions'=>'JUNCTIONS',
			'section_coordinates'=>'COORDINATES',
			'section_tags'=>'TAGS',
			'section_emitters'=>'EMITTERS',
			'section_quality'=>'QUALITY',
			'section_sources'=>'SOURCES',
			'tag_node_junction'=>'NODE',
			'source_type_junction'=>'CONCEN',
			'upload_dir'=>'epanet_uploads',
			'upload_max_size'=>10, //max file size in MByte
			'download_dir'=>'epanet_downloads',
			'download_filename_suffix'=>'-WIZ-GENERATED',
			'junction_prefix'=>'WIZ_',
		),
		//Folder to upload shp to, relative to 'protected'
		'shp_upload_folder' => '/../uploads/shp/',
		'transition'=>array(
			'upload_dir'=>'uploads/wrut',
			'upload_max_size'=>10, //max file size in MByte				
		),
	),*/
);