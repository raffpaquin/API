<?php

require_once 'libs/Slim/Slim/Slim.php';
require_once 'website/Dispatcher.php';

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Headers: Authorization');

\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim();

$app->error(function ($e) use ($app) { 
    error($e->getMessage(),200);
});

global $app;




//Include all helpers
foreach (glob("helpers/*.php") as $filename){
    include $filename;
}

//Include all global hooks
foreach (glob("hooks/*.php") as $filename){
    include $filename;
}

//Include all website hooks
if (!empty($website_params['site'])) {
	foreach (glob('website/'.$website_params['site'].'/hook/*.php') as $filename){
	    include $filename;
	}
}

//Include all routes
foreach (glob("routes/*.php") as $filename){
    include $filename;
}

//Include all sub-routes
function recursiblyAddSubRoutes($path = 'routes/*'){
	global $app;

	foreach (glob($path,GLOB_ONLYDIR) as $directory){
		$app->group('/'.@array_pop(explode('/',$directory)), function () use ($app, $directory) {
			
			if ($directory != '.') {
		    	recursiblyAddSubRoutes($directory.'/*'); 
			}

			foreach (glob($directory."/*.php") as $filename){
	    		include $filename;
			}
		});
	}

}
recursiblyAddSubRoutes();

$app->run();	
