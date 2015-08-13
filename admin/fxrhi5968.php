<?php
require_once("../includesmain/functions.php");
require_once("../includesmain/session.php");
require_once("../includesmain/database.php");
require_once("../includesmain/user.php");
require_once("../includesmain/client.php");
require_once("../includesmain/class_session.php");
require_once("../includesmain/datemanager.php");
if(isset($_GET['lgt'])){ $session->logout(); }
if(!$session->is_logged_in()){redirect_to("login.php");
}
//Adding a session to the db
 if(isset($_POST['session_name'])){
		if(isset($_POST['active']) && $_POST['active'] == 1 ){ $isactive = 1;} else  { $isactive = 0;}
		ClassSession::addsessiontodatabase($_POST['session_name'],$_POST['date'],$isactive);
	}
 if(isset($_POST['u_session_name'])){
		if(isset($_POST['active'])){ $isactive = 1;} else  { $isactive = 0;}
		ClassSession::updatesession($_POST['s_id'],$_POST['u_session_name'],$_POST['date'],$isactive);
	}
$loggedinuser = User::showmeuser($_SESSION['user_id']);

//Removing a all data
if(isset($_GET['conf98652'])){
	ClassSession::rmvall();
	$datacleared = 1;
	}
//$myclients = Client::find_all();
//	 foreach($myclients as $client1){
//		echo $client1->full_name();
//		 }

include'../includes/pagestructure.php';
include'../includes/smartbanner.php';
include'../includes/smartnav.php';
adminhead('Welcome to Urban Illustration');
admintopbar();
?>
 <div id="content">
     
 		<div id="maincontent">
        	<div class="textcontentalone">
<p>Welcome, <?php if(isset($loggedinuser)){ echo $loggedinuser; } ?> <a href="?lgt=1">Log Out</a></p>
<p><a href="index.php">Back to  session page</a></p>
<?php
if(isset($datacleared)){
?>
<h2>Data Cleared</h2>
<p><a href="index.php">Back to session page</a></p>
<?php	
	}
else{
?>
<h2>Clear all existing sessions:</h2>
<p><a href="fxrhi5968.php?conf98652=98652">Click here to confirm</a></p>
<?php
}
?>
</div>
         <div class="textcontentclear"></div>           
      </div>        
</div>
  <?php foot(); 
  if(isset($database)){ $database->close_connection();}
 	?>