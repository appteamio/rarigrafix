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
//activating a spesific session
if(isset($_GET['activate'])){ClassSession::activate($_GET['activate']);}
//Removing a session
if(isset($_GET['sessionrmv'])){ClassSession::rmvsession($_GET['sessionrmv']);}
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
<h2>Available Sessions</h2>
<table id="tbschedualdisplay">
<tr class="tabletitle"><td>Session Name</td><td>Starting Date</td><td>Status</td><td>Update</td><td>Delete</td></tr>
<?php ClassSession::displaysessions(); ?>
</table>
<?php
if(isset($_GET['s_upd'])){
$updatesession = ClassSession::find_by_id($_GET['s_upd']);
?>
<h2><a>Update Session:</a></h2>
<form action="index.php" method="post">
<input type="hidden" value="<?php echo $updatesession->id; ?>" name="s_id" />
Session Name:  <input type="text" maxlength="40" name="u_session_name"  value="<?php echo $updatesession->name; ?>"/>
Starting Date: <input type="text" maxlength="40" name="date" value="<?php echo DateManager::displaydatefromtmstp($updatesession->s_date); ?>"/>
 <?php if($updatesession->active != 1){?> Make active: <input type="checkbox" name="active" value="1" /> <? }
 else{
	 ?> <input type="hidden" name="active" value="1" /> <?
	 }
  ?>
<input type="submit" name="submit" />
</form>
<a href="index.php">Add New Session</a>
<?php	
	}
else{
?>
<h2><a>Add a New Session</a></h2>
<form action="index.php" method="post">
Session Name:  <input type="text" maxlength="40" name="session_name" />
Starting Date: <input type="text" maxlength="40" name="date"/>
Make active: <input type="checkbox" name="active" value="1" />
<input type="submit" name="submit" />
</form>
<?php
}
?>

<h2><a>Clear all existing sessions:</a></h2>
<p>All data will be erased make sure you only proceed if you have gathered all the data</p>
<p><a href="fxrhi5968.php">Clear History</a></p>


</div>
         <div class="textcontentclear"></div>           
      </div>        
</div>
  <?php foot(); 
  if(isset($database)){ $database->close_connection();}
 	?>