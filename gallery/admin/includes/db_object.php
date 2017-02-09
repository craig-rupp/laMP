<?php 

	class db_Object 
	
	{
		protected static $db_table = "users";

		public static function get_all_users()
		{
			$result_set = static::find_this_query("SELECT * FROM " . static::$db_table);
			return $result_set;
		}

		public static function get_user_by_id($id)
		{
			global $database;
			$result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
			
			return !empty($result_array) ? array_shift($result_array) : false;
			
		}

		public static function find_this_query($sql)
		{
			global $database;
			$result_set = $database->query($sql);
			$object_array = [];
			while($row = mysqli_fetch_array($result_set)){
				$object_array[] = static::attribute($row);
				//$object_array.push(static::attribute($row));
			}
			return $object_array;
		}

		public static function attribute($found_user)
		{

			$call_class = get_called_class();
			$user_object = new $call_class;

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