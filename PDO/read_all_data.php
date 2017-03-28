<?php 

	$connection = new PDO('mysql:host=127.0.0.1;dbname=pdo_db', 'root', '');

	$all_users = $connection->query("SELECT * FROM users");
	$all_users_array = $all_users->fetchAll();
	//var_dump($all_users->fetchAll());
	//print_r($all_users_array[0]);
	//print_r($all_users_array);
	foreach ($all_users_array as $user) {
		echo $user['first_name'] . "<br>";
	}

	$users_obj = $connection->query("SELECT * FROM users");
	$users_objects = $users_obj->fetchAll(PDO::FETCH_OBJ);
	echo "Let's use objects " . "<br>";
	foreach($users_objects as $object){
		echo $object->first_name . "<br>";
	} 

 ?>