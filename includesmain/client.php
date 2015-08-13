<?php

require_once("database.php");



class Client {

	public $id;

	public $class_id;

	public $p_firstname;

	public $p_last_name;

	public $k_firstname;

	public $k_lastname;

	public $email;

	public $phone;
		
	public $coupon;

	

	public static function find_all(){

		return self::find_by_sql("SELECT * FROM clients");

	}

	public static function find_by_id($id=0){

		global $database;

		$result_array = self::find_by_sql("SELECT * FROM clients WHERE id={$id} LIMIT 1");

		return !empty($result_array)? array_shift($result_array) : false;

	}

	public static function find_temp_by_id($id=0){

		global $database;

		$result_array = self::find_by_sql("SELECT * FROM temp_clients WHERE id={$id} LIMIT 1");

		return !empty($result_array)? array_shift($result_array) : false;

	}
	public static function find_by_email($mail=0){

		global $database;

		$result_array = self::find_by_sql("SELECT * FROM clients WHERE email='{$mail}' LIMIT 1");

		return !empty($result_array)? array_shift($result_array) : false;

	}
	public static function find_by_sql($sql=""){

		global $database;

		$result_set = $database->query($sql);

		$object_array = array();

		while($row = $database->fetch_array($result_set)){

			$object_array[] = self::instantiate($row);	

			}

		return $object_array;

	}

	private static function instantiate($record){

		$object = new self;

		$object->id				  = $record['id'];

		$object->class_id 		  = $record['class_id'];

		$object->p_firstname 	  = $record['p_firstname'];

		$object->p_lastname 	  = $record['p_lastname'];

		$object->k_firstname 	  = $record['k_firstname'];

		$object->k_lastname 	  = $record['k_lastname'];

		$object->email			  = $record['email'];

		$object->phone			  = $record['phone'];

		$object->coupon			  = $record['coupon'];

		return $object;

		

	} 

	public static function displayclients($class_id){

		$classbox = self::find_by_sql("SELECT * FROM `clients` WHERE class_id={$class_id}");

		foreach($classbox as $client_sheet){

			echo '<tr><td>'.$client_sheet->p_firstname.' '.$client_sheet->p_lastname.'</td><td>'.$client_sheet->k_firstname.' '.$client_sheet->k_lastname.'</td><td>'.$client_sheet->email.'</td><td>'.$client_sheet->phone.'</td><td>'.$client_sheet->coupon.'</td><td><a href="clients-view.php?clsid='.$client_sheet->class_id.'&updclt='.$client_sheet->id.'">Update Client</a></td><td><a href="clients-view.php?clsid='.$client_sheet->class_id.'&rmvclt='.$client_sheet->id.'">Delete</a></td></tr>';

			}

	}
	public static function displaychildnames($class_id){

		$classbox = self::find_by_sql("SELECT * FROM `clients` WHERE class_id={$class_id}");

		foreach($classbox as $client_sheet){

			echo '<tr><td>'.$client_sheet->k_firstname.' '.$client_sheet->k_lastname.'</td></tr>';

			}

	}
	public static function rmvclt($rmvid){

		global $database;	

		$insert_query = "DELETE FROM clients  WHERE id='".$rmvid."'";

		$database->query($insert_query);

		}	
	public static function rmvtempclt($rmvid){

		global $database;	

		$insert_query = "DELETE FROM temp_clients  WHERE id='".$rmvid."'";

		$database->query($insert_query);

		}	

	public static function addclienttodatabase($class_id ,$p_firstname ,$p_lastname ,$k_firstname ,$k_lastname ,$phone ,$email ,$coupon){

		global $database;

		$class_id = $database->escape_value($class_id);

		$p_firstname = $database->escape_value($p_firstname);

		$p_lastname = $database->escape_value($p_lastname);

		$k_firstname = $database->escape_value($k_firstname);

		$k_lastname = $database->escape_value($k_lastname);

		$phone = $database->escape_value($phone);

		$email = $database->escape_value($email);
			
		$coupon = $database->escape_value($coupon);		

		$insert_query = "INSERT INTO clients (`id`, `class_id`, `p_firstname`, `p_lastname`, `k_firstname`, `k_lastname`, `phone`, `email`, `coupon`) VALUES (NULL, '".$class_id."', '".$p_firstname."', '".$p_lastname."', '".$k_firstname."', '".$k_lastname."', '".$phone."', '".$email."', '".$coupon."')";

		return $database->query($insert_query);	

	}

	public static function addtempclienttodatabase($class_id ,$p_firstname ,$p_lastname ,$k_firstname ,$k_lastname ,$phone ,$email ,$coupon){

		global $database;

		$class_id = $database->escape_value($class_id);

		$p_firstname = $database->escape_value($p_firstname);

		$p_lastname = $database->escape_value($p_lastname);

		$k_firstname = $database->escape_value($k_firstname);

		$k_lastname = $database->escape_value($k_lastname);

		$phone = $database->escape_value($phone);

		$email = $database->escape_value($email);
		
		$coupon = $database->escape_value($coupon);	

		$insert_query = "INSERT INTO temp_clients (`id`, `class_id`, `p_firstname`, `p_lastname`, `k_firstname`, `k_lastname`, `phone`, `email`, `coupon`) VALUES (NULL, '".$class_id."', '".$p_firstname."', '".$p_lastname."', '".$k_firstname."', '".$k_lastname."', '".$phone."', '".$email."', '".$coupon."')";

		return $database->query($insert_query);	

	}

	public static function updateclient($c_id, $p_firstname ,$p_lastname ,$k_firstname ,$k_lastname ,$phone ,$email ,$coupon){

		global $database;

		$c_id = $database->escape_value($c_id);

		$p_firstname = $database->escape_value($p_firstname);

		$p_lastname = $database->escape_value($p_lastname);

		$k_firstname = $database->escape_value($k_firstname);

		$k_lastname = $database->escape_value($k_lastname);

		$phone = $database->escape_value($phone);

		$email = $database->escape_value($email);
		
		$coupon = $database->escape_value($coupon);			

		$insert_query = "UPDATE  clients SET `p_firstname` =  '".$p_firstname."', `p_lastname` =  '".$p_lastname."', `k_firstname` =  '".$k_firstname."', `k_lastname` =  '".$k_lastname."', `email` =  '".$email."', `phone` =  '".$phone."', `coupon` =  '".$coupon."' WHERE  `clients`.`id` ='".$c_id."'";

		return $database->query($insert_query);	

	}

	}



?>