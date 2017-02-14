<?php 

	class Photo extends db_Object
	{
		public $title;
		public $description;
		public $id;
		public $filename;
		public $type;
		public $size;
		public $caption;
		public $alt_text;
		protected static $db_table = "photos";
		protected static $db_table_fields = ['title', 'description', 'filename', 'type', 'size', 'caption', 'alt_text'];

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
			} elseif ($file['error'] != 0){
				$this->custom_errors[] = $this->upload_errors_array[$file['error']];
				return false;
			} else {
				$this->filename = basename($file['name']); //getting the name key from the $_FILE SG
				$this->tmp_path = $file['tmp_name'];
				$this->type = $file['type'];
				$this->size = $file['size'];
			}
		}

		public function picture_path()
		{
			return $this->upload_directory.DS.$this->filename;
		}

		public function save()
		{
			if($this->id){
				$this->update();
			} else {
				if(!empty($this->custom_errors)){
					return false;
				}
				if(empty($this->filename) || empty($this->tmp_path)){
					$this->custom_errors[] = "the file was not available";
					return false;
				}

				$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

				if(file_exists($target_path)){
					$this->custom_errors[] = "this file, {$this->filename} already exists numnuts";
					return false;
				}

				if(move_uploaded_file($this->tmp_path, $target_path)){
					//move uploaded filed takes filename, destination
					if($this->create()){
						unset($this->tmp_path);
						return true;
					}
				}
				else {
					$this->custom_errors[] = "the file directory likely does not have permission";
					return false;
				}
				 
			}
		}

		public function delete_photo()
		{
			if($this->delete()){

				$target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();

				return unlink($target_path) ? true : false;

			} else {

				return false;
			}

		}


	} //End of Class

 ?>