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
		
		public static function verify_user($username, $password){
			global $database;
			$username = $database->escape_string($username);
			$password = $database->escape_string($password);

			$sql = "SELECT * FROM " . self::$$db_table . " WHERE ";
			$sql .= "username = '{$username}' ";
			$sql .= "AND password = '{$password}' LIMIT 1";

			$result_array = self::find_this_query($sql);
			
			return !empty($result_array) ? array_shift($result_array) : false;
		}

	}

 ?>