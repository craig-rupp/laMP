<?php 

	class db_Object 
	
	{

		public static function get_all_items()
		{
			$result_set = static::find_this_query("SELECT * FROM " . static::$db_table);
			return $result_set;
		}

		public static function find_by_id($id)
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

		protected function properties()
		{
			$array_properties_wanted = [];
			print_r(static::$db_table_fields);
			foreach(static::$db_table_fields as $db_property){
				if(property_exists($this, $db_property)){
					$array_properties_wanted[$db_property] = $this->$db_property; //$required after this as it's not a class property
				}
			}
			print_r($array_properties_wanted);
			return $array_properties_wanted;
			// return get_object_vars($this);
		}

		protected function cleanProperties()
		{
			global $database;

			$clean_properties = [];

			foreach ($this->properties() as $key => $value) {
				$clean_properties[$key] = $database->escape_string($value);
			}

			return $clean_properties;
		}

		public function save ()
		{
			return isset($this->id) ? $this->update() : $this->create();
		}

		public function create()
		{
			global $database;
			$properties = $this->cleanProperties();
			$sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) .  ")";
			$sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";
			// $sql .= "VALUES ('";
			// $sql .= $database->escape_string($this->username) . "', '"; 
			// $sql .= $database->escape_string($this->password) . "', '";
			// $sql .= $database->escape_string($this->first_name) . "', '";
			// $sql .= $database->escape_string($this->last_name). "')";

			if($database->query($sql)) {
				$this->id = $database->the_insert_id();
			} else {
				return false;
			}
		}

		public function update()
		{
			global $database;

			$update_properties = $this->properties();
			//var_dump($update_properties). "<br>";
			$property_pairs = [];
			foreach($update_properties as $key => $value) {
				$property_pairs[] = "{$key}='{$value}'";
			}
			$sql_update = "UPDATE " . static::$db_table . " SET ";
			$sql_update .= implode(", ", $property_pairs);
			$sql_update .= " WHERE id= " . $database->escape_string($this->id);
			//var_dump($property_pairs) . "<br>";

			$database->query($sql_update);

			return (mysqli_affected_rows($database->connection) == 1) ? true : false;
		}

		public function delete()
		{
			global $database;
			$sql_delete = "DELETE FROM " . static::$db_table ;
			$sql_delete .= " WHERE id=" . $database->escape_string($this->id); //no string required because of int
			$sql_delete .= " LIMIT 1";

			$database->query($sql_delete);
		}

	}


 ?>