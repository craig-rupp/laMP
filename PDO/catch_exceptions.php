<?php 

	try {
		$connection = new PDO('mysql:host=127.0.0.1;dbname=pdo_dbs', 'root', '');
	} catch (PDOException $e) {
		die("The database connection failed based on {$e}");
	}

 ?>