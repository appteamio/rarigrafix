<?php
require_once("database.php");

class User {
	public $id;
	public $user;
	public $pass;

	public static function find_all(){
		return self::find_by_sql("SELECT * FROM admin");
	}
	public static function find_by_id($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM admin WHERE id={$id} LIMIT 1");
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
		$object->id		 = $record['id'];
		$object->user	 = $record['user'];
		$object->pass 	 = $record['pass'];
		return $object;
		
	} 
	public static function authenticate($user="", $pass=""){
	global $database;
	$user = $database->escape_value($user);
	$pass = $database->escape_value($pass);	
	$sql = "SELECT * from admin ";
	$sql .= "WHERE user='{$user}' ";
	$sql .= "AND pass='{$pass}' ";
	$sql .= "LIMIT 1";
	$result_array = self::find_by_sql($sql);
	return !empty($result_array)? array_shift($result_array) : false;
	}
	public static function showmeuser($userid){
		$userinfo = self::find_by_id($userid);
		return $userinfo->user;
	}
	
	}

?>