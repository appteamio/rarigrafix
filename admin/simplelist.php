<?php

require_once("../includesmain/functions.php");

require_once("../includesmain/session.php");

require_once("../includesmain/database.php");

require_once("../includesmain/user.php");

require_once("../includesmain/class.php");

require_once("../includesmain/client.php");

require_once("../includesmain/class_session.php");

require_once("../includesmain/datemanager.php");

if(isset($_GET['lgt'])){ $session->logout(); }

if(!$session->is_logged_in()){redirect_to("login.php");}

if(!isset($_GET['clsid'])){redirect_to("index.php");}

if(isset($_GET['rmvclt'])){ Client::rmvclt($_GET['rmvclt']);}

$classexst = Classes::find_by_id($_GET['clsid']);

if(!$classexst){redirect_to("index.php");}

//Adding a session to the db

 if(isset($_POST['p_firstname'])){

		Client::addclienttodatabase($_POST['clsid'] ,$_POST['p_firstname'] ,$_POST['p_lastname'] ,$_POST['k_firstname'] ,$_POST['k_lastname'] ,$_POST['phone'] ,$_POST['email'],$_POST['coupon']);

	}

if(isset($_POST['c_id'])){

		Client::updateclient($_POST['c_id'] ,$_POST['u_p_firstname'] ,$_POST['u_p_lastname'] ,$_POST['u_k_firstname'] ,$_POST['u_k_lastname'] ,$_POST['u_phone'] ,$_POST['u_email'],$_POST['u_coupon']);

	}

//finding the info on the class session

$currentclass = Classes::find_by_id($_GET['clsid']);



$loggedinuser = User::showmeuser($_SESSION['user_id']);

include'../includes/pagestructure.php';

include'../includes/smartbanner.php';

include'../includes/smartnav.php';

adminhead('Welcome to Urban Illustration');

admintopbar();

?>

 <div id="content">

     

 		<div id="maincontent">

        	<div class="textcontentalone">

<p>Welcome, <?php if(isset($loggedinuser)){ echo $loggedinuser; } ?> <a href="">Log Out</a></p>

<h2>Session of <?php echo DateManager::frontdisplaytimefromtmstp($currentclass->c_date); ?></h2>
<h2><a href="clients-view.php?clsid=<? echo $_GET['clsid'];?>">Back to Clients View</a></h2>

<a href="classes-view.php?sid=<?php echo $currentclass->sessionid; ?>">back to classes</a>

<table id="tbschedualdisplay">

<tr class="tabletitle"><td>Child Names</td></tr>

<?php Client::displaychildnames($_GET['clsid']); ?>

</table>


</div>

         <div class="textcontentclear"></div>           

      </div>        

</div>

  <?php foot(); 

  if(isset($database)){ $database->close_connection();}

 	?>