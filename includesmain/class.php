<?php
require_once("database.php");
require_once("class_session.php");
require_once("datemanager.php");
class Classes {
	public $id;
	public $sessionid;
	public $date;
	public $spots;
	public $note;
	
	public static function find_all(){
		return self::find_by_sql("SELECT * FROM classes");
	}
	public static function find_by_id($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM classes WHERE id={$id} LIMIT 1");
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
		$object->sessionid 		  = $record['session_id'];
		$object->c_date 	  	  = $record['date'];
		$object->spots 	  	      = $record['spots'];
		$object->note 	          = $record['note'];
		return $object;
		
	} 
	public static function displayclass($s_id){
		global $database;
		$sessionbox = self::find_by_sql("SELECT * FROM  `classes` WHERE  session_id ={$s_id} ORDER BY  `date` DESC");
		
		foreach($sessionbox as $session_sheet){
			
			$removable = '<a href="classes-view.php?sid='.$session_sheet->sessionid.'&rmvclss='.$session_sheet->id.'">Remove</a>';
			$ava = self::checkava($session_sheet->id);
			echo '<tr><td>'.DateManager::frontdisplaytimefromtmstp($session_sheet->c_date).'</td><td>'.$session_sheet->spots.'</td><td>'.$ava.'</td><td>'.$session_sheet->note.'</td><td><a href="clients-view.php?clsid='.$session_sheet->id.'">View</a></td><td><a href="classes-view.php?sid='.$session_sheet->sessionid.'&updtclss='.$session_sheet->id.'">Update</a></td><td>'.$removable.'</td></tr>';
			}
	}
	public static function frontdisplayclass($s_id){
		global $database;
		$sessionbox = self::find_by_sql("SELECT * FROM  `classes` WHERE  session_id ={$s_id} ORDER BY  `date` ASC");
		
		foreach($sessionbox as $session_sheet){
			if(!self::anyspots($session_sheet->id))
			{
			$joinclass = '<a href="join-class.php?join='.$session_sheet->id.'">Join this Class</a>';
			}
			else{
			$joinclass = '-----';
				}
			$removable = '<a href="classes-view.php?sid='.$session_sheet->sessionid.'&rmvclss='.$session_sheet->id.'">Remove</a>';
			$ava = self::checkava($session_sheet->id);
			echo '<tr><td>'.DateManager::frontdisplaytimefromtmstp($session_sheet->c_date).'</td><td>'.$ava.'</td><td>'.$joinclass.'</td><td>'.$session_sheet->note.'</td></tr>';
			}
	}
	public static function rmvclasses($rmvid){
		global $database;	
		$insert_query = "DELETE FROM classes  WHERE id='".$rmvid."'";
		$database->query($insert_query);
		}
	public static function addclasstodatabase($classdate,$classtime,$spots,$sid,$note){
		global $database;
		$classdate = $database->escape_value($classdate);
		$classtime = $database->escape_value($classtime);
		$spots = $database->escape_value($spots);
		$sid = $database->escape_value($sid);	
		$note = $database->escape_value($note);
		$timestmp = DateManager::convertdateandtime2tmstp($classdate,$classtime);
		$insert_query = "INSERT INTO `classes` (`id`, `session_id`, `date`, `spots`, `note`) VALUES (NULL, '".$sid."', '".$timestmp."', '".$spots."', '".$note."')";
		return $database->query($insert_query);	
	}
	public static function updateclass($cls_id,$classdate,$classtime,$spots,$note){
		global $database;
		$cls_id = $database->escape_value($cls_id);
		$classdate = $database->escape_value($classdate);
		$classtime = $database->escape_value($classtime);
		$spots = $database->escape_value($spots);	
		$note = $database->escape_value($note);
		$timestmp = DateManager::convertdateandtime2tmstp($classdate,$classtime);
		$insert_query = "UPDATE  classes SET `date` =  '".$timestmp."', `spots` =  '".$spots."', `note` =  '".$note."' WHERE  `classes`.`id` ='".$cls_id."'";
		return $database->query($insert_query);	
	}
	public static function checkava($class){
		global $database;
		$insert_query = "SELECT * FROM `clients` Where `class_id` = {$class}";
		$holdquery = $database->query($insert_query);
		$classclientsnum = $database->num_rows($holdquery);
		$infoclass = self::find_by_id($class);
		return $infoclass->spots - $classclientsnum;
	}
	public static function anyspots($class){
		$spots = self::checkava($class);
		if($spots <= 0){
			return TRUE;
			}
		else{
			return FALSE;
			}
	}
	}


?>