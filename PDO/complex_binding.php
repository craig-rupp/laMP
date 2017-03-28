<?php 

	$con = new PDO('mysql:host=127.0.0.1;dbname=pdo_db', 'root', '');

	//$first_name = $_GET['first_name'];
	$password = $_GET['password'];

	$user= $con->prepare("SELECT * FROM users WHERE 
		first_name LIKE :first_name
		AND password LIKE :password
		");

	//% before variable looks at last letter, % at end looks for first letter
	//the below bindvalue works for my last letter in my first_name && first letter in my password (pdo_db) phpmyadmin
	$user->bindValue(':first_name', "%$first_name");
	$user->bindValue(':password', "$password%");

	$user->execute();
	$user = $user->fetchAll(PDO::FETCH_OBJ);
	var_dump($user);

 ?>