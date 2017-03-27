<?php 
	//driver
	$connection = new PDO('mysql:host=127.0.0.1;dbname=pdo_db', 'root', '');

	$drivers = PDO::getAvailableDrivers();
	var_dump($drivers);


 ?>