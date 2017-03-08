<?php 

	require_once("init.php");

	$user = new User();

	if(isset($_POST['image_name'])){
		echo $_POST;
		//$user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);
	}


 ?>