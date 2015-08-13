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

<p>Welcome, <?php if(isset($loggedinuser)){ echo $loggedinuser; } ?> <a href="?lgt=1">Log Out</a></p>

<h2>Session of <?php echo DateManager::frontdisplaytimefromtmstp($currentclass->c_date); ?></h2>

<h2><a href="simplelist.php?clsid=<? echo $_GET['clsid'];?>">View a Simple List</a></h2>

<a href="classes-view.php?sid=<?php echo $currentclass->sessionid; ?>">back to classes</a>

<table id="tbschedualdisplay">

<tr class="tabletitle"><td>Client Name</td><td>Child Name</td><td>Email</td><td>Phone</td><td>Coupon</td><td>Update</td><td>Remove</td></tr>

<?php Client::displayclients($_GET['clsid']); ?>

</table>

<?php

if(isset($_GET['updclt'])){

$updateclient = Client::find_by_id($_GET['updclt']);

?>
<div class="box">
<h2>Update Client : <?php echo $updateclient->p_lastname; ?></h2>

<form action="clients-view.php?clsid=<?php echo $_GET['clsid']; ?>" method="post">

<input type="hidden" value="<?php echo $updateclient->id; ?>" name="c_id" />

<label><span>Parent First Name:</span> <input type="text" maxlength="40" name="u_p_firstname" value="<?php echo $updateclient->p_firstname; ?>" class="input_text" /></label>

<label><span>Parent Last Name:</span> <input type="text" maxlength="40" name="u_p_lastname" value="<?php echo $updateclient->p_lastname; ?>" class="input_text" /></label>

<label><span>Child First Name:</span> <input type="text" maxlength="40" name="u_k_firstname" value="<?php echo $updateclient->k_firstname; ?>" class="input_text" /></label>

<label><span>Child Last Name: </span><input type="text" maxlength="40" name="u_k_lastname" value="<?php echo $updateclient->k_lastname; ?>" class="input_text" /></label>

<label><span>Email:</span> <input type="text" maxlength="40" name="u_email" value="<?php echo $updateclient->email; ?>" class="input_text" /></label>

<label><span>Phone: </span><input type="text" maxlength="40" name="u_phone" value="<?php echo $updateclient->phone; ?>" class="input_text" /></label>

<label><span>Coupon: </span><input type="text" maxlength="40" name="u_coupon" value="<?php echo $updateclient->coupon; ?>" class="input_text" /></label>

<input type="submit" name="Update" value="Update"  class="button" />

</form>
</div>
<?php

}

else{



$stillspots = Classes::anyspots($_GET['clsid']);

if($stillspots){

	echo '<h2>CLASS FULL</h2>';

	}

else{

?>
<div class="box">
<h2>Add a New Client</h2>

<form action="clients-view.php?clsid=<?php echo $_GET['clsid']; ?>" method="post">

<input type="hidden" value="<?php echo $_GET['clsid']; ?>" name="clsid" />

<label><span>Parent First Name:</span> <input type="text" maxlength="40" name="p_firstname" class="input_text"/></label>

<label><span>Parent Last Name:</span> <input type="text" maxlength="40" name="p_lastname" class="input_text"/></label>

<label><span>Child First Name: </span><input type="text" maxlength="40" name="k_firstname" class="input_text"/></label>

<label><span>Child Last Name:</span> <input type="text" maxlength="40" name="k_lastname" class="input_text"/></label>

<label><span>Email: </span><input type="text" maxlength="40" name="email" class="input_text"/></label>

<label><span>Phone: </span><input type="text" maxlength="40" name="phone" class="input_text"/></label>

<label><span>Coupon:</span> <input type="text" maxlength="40" name="coupon" class="input_text"/></label>

<input type="submit" name="submit" class="button" />

</form>
</div>
<?php

}

}

?>

</div>

         <div class="textcontentclear"></div>           

      </div>        

</div>

  <?php foot(); 

  if(isset($database)){ $database->close_connection();}

 	?>