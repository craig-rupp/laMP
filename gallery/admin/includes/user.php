<?php 

	class User 
	{
		public $username;
		public $password;
		public $id;
		public $first_name;
		public $last_name;

		public static function get_all_users()
		{
			$result_set = self::find_this_query("SELECT * FROM users");
			return $result_set;
		}

		public static function get_user_by_id($id)
		{
			global $database;
			$result_array = self::find_this_query("SELECT * FROM users WHERE id = $id LIMIT 1");
			
			return !empty($result_array) ? array_shift($result_array) : false;
			
		}

		public static function find_this_query($sql)
		{
			global $database;
			$result_set = $database->query($sql);
			$object_array = [];
			while($row = mysqli_fetch_array($result_set)){
				$object_array[] = self::attribute($row);
				//$object_array.push(self::attribute($row));
			}
			return $object_array;
		}

		public static function verify_user($username, $password){
			global $database;
			$username = $database->escape_string($username);
			$password = $database->escape_string($password);

			$sql = "SELECT * FROM users WHERE ";
			$sql .= "username = '{$username}' ";
			$sql .= "AND password = '{$password}' LIMIT 1";

			$result_array = self::find_this_query($sql);
			
			return !empty($result_array) ? array_shift($result_array) : false;
		}

		public static function attribute($found_user)
		{
			$user_object = new self;

            foreach ($found_user as $property => $attribute) {
            	if($user_object->has_the_attribute($property)){
            		$user_object->$property = $attribute;
            	}
            }
            return $user_object;
		}

		private function has_the_attribute($property)
		{
			$object_properties = get_object_vars($this); //gets properties of given object, return assoc array

			return array_key_exists($property, $object_properties);
		}

	}

 ?>