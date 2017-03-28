<?php 

$con = new PDO('mysql:host=127.0.0.1;dbname=pdo_db','root','');

$first_name = 'Craig';

$password = 'mesutical';



$user = $con->prepare("
	SELECT * FROM users
	WHERE first_name = :first_name
	AND password = :password

	");

//bind the Values
$user->bindValue(':first_name', $first_name);
$user->bindValue(':password', $password);


$user->execute();


$user = $user->fetchAll(PDO::FETCH_OBJ);

var_dump($user);

 ?>