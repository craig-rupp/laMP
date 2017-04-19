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
	echo get_class($router) . "<br><br>";

	/* Add the Routes */
	$router->add('', ['controller' => 'Home', 'action' => 'index']);
	$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
	$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
	$router->add('posts/lizzy', ['controller' => 'Posts', 'action' => 'index']);

	//Display routing table
	echo '<pre>';
	var_dump($router->getRoutes());
	echo '</pre>' . "<br><br>" . "Query Matches". "<br>";

	//Match the Requested Route
	$url = $_SERVER['QUERY_STRING'];
	if($router->match($url)){
		echo '<pre>'. '<br>';
		var_dump($router->getParams());
		echo '</pre>';
	} else {
		echo "No route found for {$url}";
	}
 ?>