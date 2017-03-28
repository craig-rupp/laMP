<?php 

	$connection = new PDO('mysql:host=127.0.0.1;dbname=pdo_db', 'root', '');

	$first_user = $connection->query("SELECT * FROM users LIMIT 1");
	var_dump($first_user) . "<br>";
	//$first_users_array = $first_user->
	// $user_array = $first_user->fetch(PDO::FETCH_ASSOC);
	// var_dump($user_array['username']);
	$user_object = $first_user->fetch(PDO::FETCH_OBJ);
	var_dump($user_object->email);

 ?>