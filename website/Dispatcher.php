<?php

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

	if (!isset($_endpoints[$_SERVER['HTTP_HOST']])) {
		die('Invalid API endpoint.');
	}else{
		$website_params = $_endpoints[$_SERVER['HTTP_HOST']];

		#Load config file
		global $CONFIG;
		if (!empty($website_params['config'])) {
			$CONFIG = include 'website/'.$website_params['site'].'/config/'.$website_params['config'].'.php';
		}else{
			$CONFIG = array();
		}
	}