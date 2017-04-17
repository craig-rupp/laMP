<?php 
	echo "Hello" . "<br>" . "You jabrones" . "<br>";

	if(count($_SERVER) >= 1){
		echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"' . "<br>";
		echo count($_SERVER) . "<br><br>";
	} else {
		echo "NADA";
	}

	require_once('../Core/Router.php');

	$router = new Router();
	echo get_class($router);
 ?>