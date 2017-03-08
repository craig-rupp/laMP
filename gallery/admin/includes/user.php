<?php 

	class User extends db_Object 
	{
		protected static $db_table = "users";
		protected static $db_table_fields = array('username', 'password', 'first_name','last_name', 'user_image');
		public $id;
		public $username;
		public $password;
		public $first_name;
		public $last_name;
		public $user_image;
		public $upload_directory = "images";
		public $placeholder = "http://placehold.it/200x200";
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

		public function set_file($file)
		{
			if(empty($file) || !$file || !is_array($file)){
				$this->custom_errors[] = "There was no file uploaded here";
				return false;
			} elseif ($file['error'] != 0){
				$this->custom_errors[] = $this->upload_errors_array[$file['error']];
				return false;
			} else {
				$this->user_image = basename($file['name']); //getting the name key from the $_FILE SG
				$this->tmp_path = $file['tmp_name'];
				$this->type = $file['type'];
				$this->size = $file['size'];
			}
		}

		public function upload_photo() {

	

			if(!empty($this->errors)) {

				return false;

			}

			if(empty($this->user_image) || empty($this->tmp_path)){
				$this->errors[] = "the file was not available";
				return false;
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;


			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->user_image} already exists";
				return false;



			}

			if(move_uploaded_file($this->tmp_path, $target_path)) {

				

					unset($this->tmp_path);
					return true;

		



			} else {

				$this->errors[] = "the file directory probably does not have permission";
				return false;

			}

 


	}

		public function save_user_and_image()
		{
			if($this->id){
				$this->update();
			} else {
				if(!empty($this->custom_errors)){
					return false;
				}
				if(empty($this->user_image) || empty($this->tmp_path)){
					$this->custom_errors[] = "the file was not available";
					return false;
				}

				$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

				if(file_exists($target_path)){
					$this->custom_errors[] = "this file, {$this->user_image} already exists numnuts";
					return false;
				}

				if(move_uploaded_file($this->tmp_path, $target_path)){
					//move uploaded filed takes user_image, destination
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

		public static function verify_user($username, $password){
			global $database;
			$username = $database->escape_string($username);
			$password = $database->escape_string($password);

			$sql = "SELECT * FROM " . self::$db_table . " WHERE ";
			$sql .= "username = '{$username}' ";
			$sql .= "AND password = '{$password}' LIMIT 1";

			$result_array = self::find_this_query($sql);
			
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		public function user_image_placeholder()
		{
			return empty($this->user_image) ? $this->placeholder : $this->upload_directory.DS.$this->user_image;
		}

		public function ajax_save_user_image($user_imgage, $user_id)
		{
			$this->user_image = $user_image;
			$this->id = $user_id;
			$this->save(); 
		}

	}

 ?>