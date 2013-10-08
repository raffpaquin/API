
RAFF-API
========


### Version 0.7


This is a wrapper for the Slim Framework.
For the full documentation, please see (Slim's documentation)[http://docs.slimframework.com/]


Installation
------------

You can use both APACHE or NGIX to run RAFF-API.
You will need setup a virtual host on your server and edit the information in
website/Dispatcher.php on line 5.

This is a example of a Dispatcher.php file running 2 website both in production and staging:


```
	$_endpoints = array(
		/* yulcom.ca */
		'local.contest.frankandoak.com' => array(
			'site' => 'example.com',
			'config' => 'local',
		),
		'api.example.com' => array(
			'site' => 'example.com',
			'config' => 'prod'
		),
	);
```