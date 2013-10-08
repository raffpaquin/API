<?php

	function cache($etag, $expires = '+1 hour'){
		if (empty($etag)) {
			return;
		}

		global $app;
		$app->etag($etag);
    	$app->expires($expires);
	}

	function success($data = array(), $status = 200){
		global $app;

		if (isset($data['_id'])) {
			unset($data['_id']);
		}
		
		echoJson(array(
			'status' 	=> 'success',
			'code'		=> $status,
			'data' 		=> $data,
			'time' 		=> time(),
		),$status);
	}

	function error($message = 'Unknow Error', $status = 500, $data = array()){
		global $app;
		
		
		echoJson(array(
			'status' 	=> 'error',
			'code'		=> $status,
			'message'	=> $message ,
			'data' 		=> $data,
			'time' 		=> time(),
		),$status);
	}


	function echoJson($data, $status = 200){
		global $app;
		$app->response()->status($status);
		$data = json_encode($data);

		if(array_key_exists('callback', $_GET)){
			#JSONP
			$app->response->headers->set('Content-Type', 'text/javascript; charset=utf8');

		    $callback = $_GET['callback'];
		    echo $callback.'('.$data.');';
		}else{
		    $app->response->headers->set('Content-Type', 'application/json; charset=utf8');
		    echo $data;
		}
	}