<?php
require_once("../includesmain/functions.php");
require_once("../includesmain/session.php");
require_once("../includesmain/database.php");
require_once("../includesmain/user.php");
require_once("../includesmain/class.php");
require_once("../includesmain/class_session.php");
if(isset($_GET['lgt'])){ $session->logout(); }
if(!$session->is_logged_in()){redirect_to("login.php");}
if(!isset($_GET['sid'])){redirect_to("index.php");}
if(isset($_GET['rmvclss'])){ Classes::rmvclasses($_GET['rmvclss']);}
$sessionexst = ClassSession::find_by_id($_GET['sid']);
if(!$sessionexst){redirect_to("index.php");}
//Adding a session to the db
 if(isset($_POST['sid'])){
		Classes::addclasstodatabase($_POST['class-date'],$_POST['class-time'],$_POST['spots'],$_POST['sid'],$_POST['note']);
	}
if( isset($_POST['cls_id']) ){
		Classes::updateclass($_POST['cls_id'],$_POST['class-date'],$_POST['class-time'],$_POST['spots'],$_POST['note']);
	}
//finding the info on the class session
$currentclasssession = ClassSession::find_by_id($_GET['sid']);

$loggedinuser = User::showmeuser($_SESSION['user_id']);
include'../includes/pagestructure.php';
include'../includes/smartbanner.php';
include'../includes/smartnav.php';
adminhead('Welcome to Urban Illustration');
admintopbar();
?>
 <div id="content">
     
 		<div id="maincontent">
        	<div class="textcontentalone"><p>Welcome, <?php if(isset($loggedinuser)){ echo $loggedinuser; } ?> <a href="?lgt=1">Log Out</a></p>
<h2>Session <?php echo $currentclasssession->name; ?></h2>
<p>Current Session <?php if($currentclasssession->active == 1){echo 'Active';} else {echo 'Not Active';}?></p>
<a href="index.php">back to sessions</a>
<table id="tbschedualdisplay">
<tr class="tabletitle"><td>Class Dates</td><td>Spots</td><td>Available</td><td class="notes">Notes</td><td>View</td><td>Update</td><td>Delete</td></tr>
<?php Classes::displayclass($_GET['sid']); ?>
</table>
<?php
if(isset($_GET['updtclss']))
{
	$updateclass = Classes::find_by_id($_GET['updtclss']);
?>	
<h2>Update Class of: <?php echo DateManager::frontdisplaytimefromtmstp($updateclass->c_date); ?></h2>
<form action="classes-view.php?sid=<?php echo $_GET['sid']; ?>" method="post">
<input type="hidden" value="<?php echo $updateclass->id; ?>" name="cls_id" />
Class Date: <input type="datetime" maxlength="40" name="class-date" value="<?php echo DateManager::displaydatefromtmstp($updateclass->c_date); ?>"/> MM/DD/YY
Class Time: <input type="text" maxlength="40" name="class-time" value="<?php echo DateManager::backdisplaytimefromtmstp($updateclass->c_date); ?>"/>HH:MM<br />
Available Spots: <input type="text" maxlength="40" name="spots" value="<?php echo $updateclass->spots; ?>"/>
<br />Note:<br /> <textarea rows="2" cols="60" name="note">
<?php echo $updateclass->note; ?>
</textarea><br />
<input type="submit" name="Update" value="Update" />
</form>
<?php	
	}
else{
?>
<h2>Add a New Class</h2>
<form action="classes-view.php?sid=<?php echo $_GET['sid']; ?>" method="post">
<input type="hidden" value="<?php echo $_GET['sid']; ?>" name="sid" />
Class Date: <input type="text" maxlength="40" name="class-date"/> MM/DD/YY
Class Time: <input type="text" maxlength="40" name="class-time"/>HH:MM<br />

Available Spots: <input type="text" maxlength="40" name="spots"/>
<br />Note:<br /> <textarea rows="2" cols="60" name="note">
</textarea><br />
<input type="submit" name="submit" />
</form>
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