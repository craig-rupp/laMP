<?php 

	// function __autoload($class)
	// {
	// 	$class = strtolower($class);

	// 	$path = "includes/{$class}.php";

	// 	if(file_exists($path)){
	// 		require_once($path);
	// 	} else {
	// 		die("This file named {$class}.php can not be found");
	// 	}
	// }

	function classCatcher($class)
	{
		$class=strtolower($class);
		$path = "includes/{$class}.php";

		if(file_exists($path))
		{
			require_once($path)
		} {
			die("The file named {$class}.php could not be located");
		}
	}

	spl_autoload_register('classCatcher');

 ?>