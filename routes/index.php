<?php

	$app->get('/', function () use ($app) {
		success(array(
			'version' => array('v1.0'),
			'protocol' => array('http'),
		),200);
	});