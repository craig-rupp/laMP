<?php 

	class User 
	{

		public static function get_all_users()
		{
			global $database;
			$result_set = $database->query("SELECT * FROM users");
			return $result_set;
		}

		public static function get_user_by_id($id)
		{
			global $database;
			$particular_user = $database->query("SELECT * FROM users WHERE id = $id LIMIT 1");
			$found_user = mysqli_fetch_array($particular_user);
			return $found_user;
		}

	}

 ?>