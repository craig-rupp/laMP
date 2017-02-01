<?php 

function my_autoloader($class) {
	require_once 'includes/' . $class . '.php';
}

spl_autoload_register('my_autoloader');

function redirect($location){
	header("Location: {$location}");
}

 ?>