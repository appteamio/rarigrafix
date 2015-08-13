<?php
class DateManager {
	
	
	public static function convertdate2tmstp($filldate){
       $datearray = explode("/",$filldate);
	   return mktime(0,0,0,$datearray[0],$datearray[1],$datearray[2]);
	}
	public static function displaydatefromtmstp($tmstpdate){
		return date('m\/d\/y',$tmstpdate);
	}
	public static function convertdateandtime2tmstp($filldate, $filltime){
       $datearray = explode("/",$filldate);
	   $timearray = explode(":",$filltime);
	   return mktime($timearray[0],$timearray[1],0,$datearray[0],$datearray[1],$datearray[2]);
	}
	public static function backdisplaytimefromtmstp($tmstpdate){
	return date('G\:i',$tmstpdate);
	}
	public static function frontdisplaytimefromtmstp($tmstpdate){
		return date('l g\:i a',$tmstpdate);
	}
}
	
?>
