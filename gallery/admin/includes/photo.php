<?php 

	class Photo extends db_Object
	{
		public $title;
		public $description;
		public $photo_id;
		public $filename;
		public $type;
		public $size;
		protected static $db_table = "photos";
		protected static $db_table_fields = ['title', 'description', 'filename', 'type', 'size'];

		public $tmp_path;
		public $upload_directory = 'images';
		public $custom_errors = [];
		public $upload_errors_array = [
			UPLOAD_ERR_OK => "NO ERROR",
			UPLOAD_ERR_INI_SIZE => "FILE EXCEED MAX UPLOAD SIZE",
			UPLOAD_ERR_FORM_SIZE => "EXCEED MAX FILE SIZE DIRECTIVE",
			UPLOAD_ERR_PARTIAL => "ONLY PARTIAL UPLOAD",
			UPLOAD_ERR_NO_FILE => "NO FILE WAS UPLOADED",
			UPLOAD_ERR_NO_TMP_DIR => "MISSING A TEMP FOLDER",
			UPLOAD_ERR_CANT_WRITE => "FAILED TO WRITE A FILE TO DISK",
			UPLOAD_ERR_EXTENSION => "PHP EXTENSION STOPPED FILE UPLOAD"
		];

		//Passing $_FILES['uploaded_file'] as an arg
		public function set_file($file)
		{
			if(empty($file) || !$file || !is_array($file)){
				$this->custom_errors[] = "There was no file uploaded here";
				return false;
			} elseif ($file['error'] >= 1){
				$this->custom_errors[] = $this->upload_errors_array[$file['error']];
				return false;
			} else {
				$this->filename = basename($file['name']); //getting the name key from the $_FILE SG
				$this->tmp_path = $file['tmp_name'];
				$this->type = $file['type'];
				$this->size = $file['size'];
			}


		}
	}

 ?>