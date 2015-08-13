<?php
require_once("database.php");
require_once("datemanager.php");

class ClassSession {
	public $id;
	public $name;
	public $s_date;
	public $active;
	
	public static function find_all(){
		return self::find_by_sql("SELECT * FROM class_session");
	}
	public static function find_by_id($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM class_session WHERE id={$id} LIMIT 1");
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
		$object->name 		  = $record['name'];
		$object->s_date 	  = $record['date'];
		$object->active 	  = $record['active'];
		return $object;
		
	} 
	public static function displaysessions(){
		$sessionbox = self::find_by_sql("SELECT * FROM `class_session` ORDER BY date DESC");
		foreach($sessionbox as $session_sheet){
			$updatelink = '<a href="?s_upd='.$session_sheet->id.'" >Update</a>';
			if($session_sheet->active == 1)	{$status = "Active"; $removable = "---";}
			else{ $status = '<a href="?activate='.$session_sheet->id.'" >Not Active</a>';
				  $removable= '<a href="?sessionrmv='.$session_sheet->id.'">Remove</a>';	
			}
			echo '<tr><td><a href="classes-view.php?sid='.$session_sheet->id.'">'.$session_sheet->name.'</a></td><td>'.DateManager::displaydatefromtmstp($session_sheet->s_date).'</td><td>'.$status.'</td><td>'.$updatelink.'</td><td>'.$removable.'</td></tr>';
			}
	}
	public static function desactivate(){
		global $database;	
		$insert_query = "UPDATE class_session  SET active='0' WHERE active='1'";
		$database->query($insert_query);
	}
	public static function activate($activ_id){
		global $database;	
		self::desactivate();
		$insert_query = "UPDATE class_session  SET active='1' WHERE id='".$activ_id."'";
		$database->query($insert_query);
		}
	public static function rmvsession($rmvid){
		global $database;	
		$insert_query = "DELETE FROM class_session  WHERE id='".$rmvid."'";
		$database->query($insert_query);
		}
	public static function rmvall(){/*Delete all data from data bases*/
		global $database;	
		$insert_query = "DELETE FROM class_session";
		$database->query($insert_query);
		$insert_query = "DELETE FROM clients";
		$database->query($insert_query);
		$insert_query = "DELETE FROM classes";
		$database->query($insert_query);
		}		
	public static function addsessiontodatabase($s_name,$s_date,$s_active=0){
		global $database;
		
		if($s_active == 1){
		 self::desactivate();
			}
		$s_name = $database->escape_value($s_name);
		$s_date = $database->escape_value($s_date);
		$s_active = $database->escape_value($s_active);	
		$s_date = DateManager::convertdate2tmstp($s_date);
		$insert_query = "INSERT INTO class_session (`id`, `name`, `date`, `active`) VALUES (NULL, '".$s_name."', '".$s_date."', '".$s_active."')";
		return $database->query($insert_query);	
	}
	public static function Updatesession($s_id,$s_name,$s_date,$s_active=0){
		global $database;
		if($s_active == 1){
		 self::desactivate();
			}
		$s_id = $database->escape_value($s_id);
		$s_name = $database->escape_value($s_name);
		$s_date = $database->escape_value($s_date);
		$s_active = $database->escape_value($s_active);	
		$s_date = DateManager::convertdate2tmstp($s_date);
		$insert_query = "UPDATE  `class_session` SET  `name` =  '".$s_name."',`date` =  '".$s_date."', `active` =  '".$s_active."' WHERE  `class_session`.`id` ='".$s_id."' ";
		return $database->query($insert_query);	
	}

	public static function getactivesession(){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM `class_session` WHERE `active`='1' LIMIT 1");
		return !empty($result_array)? array_shift($result_array) : false;
		}
	}
?>