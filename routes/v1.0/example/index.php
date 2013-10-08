<?php

	//GET /v1.0/example/
	$app->get('/', function () use ($app){
		success(array(
			'my_data' => 'is nice!'
		));
	});


	//POST /v1.0/example/add/1234
	$app->get('/add/:id', function ($id) use ($app) {
		
		$id = intval($id);

		if (empty($id)) {
			error('ID is not an int');
			return;
		}

		success(array('message' => 'ID is a int'));
	});
