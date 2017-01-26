<?php 
	
class Cars 
{

}

$my_classes = get_declared_classes();

// get_declared_classes returns array

foreach ($my_classes as $class) {
	echo "Another one: " . $class . '<br>';
}

 ?>