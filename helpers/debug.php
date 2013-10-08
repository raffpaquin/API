<?php

	function eof($data = array()){
		if (count($data)) {
			echo '<pre>';
			print_r($data);
		}
		die('<hr />EOF');
	}