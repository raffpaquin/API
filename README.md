
RAFF-API
========


### Version 0.7


This is a wrapper for the Slim Framework.
For the full documentation, please see (Slim's documentation)[http://docs.slimframework.com/]


Installation
------------

You can use both APACHE or NGIX to run RAFF-API.
You will need setup a virtual host on your server and edit the information in
`website/Dispatcher.php` on `line 5`.

This is a example of a Dispatcher.php file running 2 website both in production and staging:


```
	$_endpoints = array(
		/* Website 1, Production */
		'api.website1.com' => array(
			'site' => 'website1.com',
			'config' => 'prod',
		),
		/* Website 1, Staging */
		'stage.api.website1.com' => array(
			'site' => 'website1.com',
			'config' => 'stage',
		),
		/* Website 2, Production */
		'api.website2.com' => array(
			'site' => 'website2.com',
			'config' => 'prod',
		),
		/* Website 2, Staging */
		'stage.api.website2.com' => array(
			'site' => 'website2.com',
			'config' => 'stage',
		),
	);
```

In the previous example, loading this api from the `stage.api.website2.com` will automatically:

1. Load the config from `website/website2.com/config/stage.php`
2. Load all the hooks from `website/website2.com/hook/*.php`