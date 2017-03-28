<?php 

	$con = new PDO('mysql:host=127.0.0.1;dbname=pdo_db', 'root');

	//parameters being bassed to execute method must be accurate
	$first_name = "Craig";
	$password = 'mesutical';

	$user = $con->prepare("SELECT * FROM users WHERE first_name = ? AND password = ?");
	$userExecution = $user->execute([$first_name, $password]);
	$user = $user->fetchAll(PDO::FETCH_OBJ);
	var_dump($user);

 ?>