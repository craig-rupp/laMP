<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect('login.php');} ?>

<?php 

	//echo "it works";
	if(empty($_GET['photo_id'])){
		redirect("photos.php");
	}

	$photo = Photo::find_by_id($_GET['photo_id']);

	if($photo) {
		$photo->delete_photo();
	} else {
		redirect("photos.php");
	}

 ?>