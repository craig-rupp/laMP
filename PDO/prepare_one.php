<?php 

	$connection = new PDO('mysql:host=127.0.0.1;dbname=pdo_db', 'root', '');

	$user = $connection->prepare("SELECT * FROM users WHERE first_name = :first ");
	$user_test = $user->execute([':first' => $_GET['first_name']]);
	if($user_test){
		$user = $user->fetchAll(PDO::FETCH_OBJ);
		print_r($user);
	} else {
		echo "You must execute first my padwon";
	}

	//prepare and escape date for sql injection

 ?>