<?php 

	echo __FILE__ ."<br>";
	echo __LINE__ . "<br>";
	echo __DIR__ . "<br>";

	if(file_exists(__DIR__)){
		echo "yes" . "<br>";
	}

	echo is_file(__DIR__) ? "why yes it is a file" . "<br>" : "no my man" . "<br>";

	echo is_file(__FILE__) ? "why yes it is a file" . "<br>" : "no my man";

 ?>