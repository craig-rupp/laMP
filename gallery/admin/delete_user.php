<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect('login.php');} ?>

<?php 

	//echo "it works";
	if(empty($_GET['id'])){
		redirect("users.php");
	}

	$user = User::find_by_id($_GET['id']);

	if($user) {
		//echo "caught";
		$user->delete();
		redirect("users.php");
	} else {
		redirect("users.php");
	}

 ?>