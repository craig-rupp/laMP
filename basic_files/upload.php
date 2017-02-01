<?php 
	print_r($_POST);
	if(isset($_POST['submit'])){
		//echo "<pre>";
		print_r($_FILES['file_upload']);
	 	//echo "<pre>";	
	}

	$upload_error = [
		UPLOAD_ERR_OK => "NO ERROR",
		UPLOAD_ERR_INI_SIZE => "FILE EXCEED MAX UPLOAD SIZE",
		UPLOAD_ERR_FORM_SIZE => "EXCEED MAX FILE SIZE DIRECTIVE",
		UPLOAD_ERR_PARTIAL => "ONLY PARTIAL UPLOAD",
		UPLOAD_ERR_NO_FILE => "NO FILE WAS UPLOADED",
		UPLOAD_ERR_NO_TMP_DIR => "MISSING A TEMP FOLDER",
		UPLOAD_ERR_CANT_WRITE => "FAILED TO WRITE A FILE TO DISK",
		UPLOAD_ERR_EXTENSION => "PHP EXTENSION STOPPED FILE UPLOAD"
	];

	$tmp = $_FILES['file_upload']['tmp_name'];
	$the_file = $_FILES['file_upload']['name'];
	$directory = "uploads";

	if(move_uploaded_file($tmp, $directory . "/" . $the_file)){
		$the_message = "Filed Uploaded!";
	} else {
		$the_error = $_FILES['file_upload']['error'];
		$the_message = $upload_error[$the_error]; 
	}
	//move_uploaded_file($tmp, $directory . "/" . $the_file);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="upload.php" enctype="multipart/form-data" method="post">

		<h2>
			<?php 
				if(!empty($upload_error)){
					echo $the_message;
				}
			 ?>
		</h2>
		<input type="file" name="file_upload"><br>
		<input type="submit" name="submit">
	</form>

</body>
</html>