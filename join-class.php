<?php

require_once("includesmain/session.php");

require_once("includesmain/functions.php");

require_once("includesmain/database.php");

require_once("includesmain/class.php");

require_once("includesmain/client.php");

require_once("includesmain/class_session.php");

require_once ("securimage/securimage.php");

require_once("includesmain/datemanager.php");

$securimage = new Securimage();

$activesession = ClassSession::getactivesession();

$classtojoin = Classes::find_by_id($_GET['join']);

$sessiontojoin = ClassSession::find_by_id($classtojoin->sessionid);

 if(isset($_POST['p_firstname'])){

	 if (!$securimage->check($_POST['captcha_code'])) {

  $captchaerror = TRUE ;



	}

	else{
		
$mailtotest = $database->escape_value($_POST['email']);
	$alreadyclient =Client::find_by_email($mailtotest);

if($alreadyclient){
	if( $_POST['k_firstname'] == $alreadyclient->k_firstname ){
		$kidalreadyregistered = true;
		}
	
	}	
		if(!$kidalreadyregistered){
		Client::addclienttodatabase($_POST['clsid'] ,$_POST['p_firstname'] ,$_POST['p_lastname'] ,$_POST['k_firstname'] ,$_POST['k_lastname'] ,$_POST['phone'] ,$_POST['email'], $_POST['coupon']);

		$insertedid = $database->insert_id();
		redirect_to('view-details.php?tclt='.$insertedid.'&cls='.$_POST['clsid']);
		}
		else{
		redirect_to('complete.php');

			}
	}

 }

include'includes/pagestructure.php';

include'includes/smartbanner.php';

include'includes/smartnav.php';

head('Welcome to Urban Illustration');

topbar();

?>

 <div id="content">

     

 		<div id="maincontent">

        	<div class="textcontentalone">
<h1>join the class of <?php echo DateManager::frontdisplaytimefromtmstp($classtojoin->c_date);  ?> part of the <?php echo $sessiontojoin->name;  ?></h1>
<p>Please fill out the form below to register for a class in the upcoming Spring Session. Please be sure to look at DAY and TIME to be sure you are registering for the correct time slot. </p>

<?php

$stillspots = Classes::anyspots($classtojoin->id);

if($stillspots){

	echo '<h2>CLASS FULL</h2>';

	}

else{

		if(isset($captchaerror)){

		$p_firstname = $database->escape_value($_POST['p_firstname']);

		$p_lastname = $database->escape_value($_POST['p_lastname']);

		$k_firstname = $database->escape_value($_POST['k_firstname']);

		$k_lastname = $database->escape_value($_POST['k_lastname']);

		$phone = $database->escape_value($_POST['phone']);

		$email = $database->escape_value($_POST['email']);

?>
  <script>
  $(document).ready(function(){
    $("#commentForm").validate();
  });
  </script>
<div class="box">

<h2>Entre your info</h2>

<h3>Please correct some of your information</h3>

<form action="?join=<?php echo $classtojoin->id; ?>&appl=1" method="post">

<input type="hidden" value="<?php echo $classtojoin->id; ?>" name="clsid" />

<label><span>Parent First Name:</span> <input type="text" maxlength="40" name="p_firstname" class="input_text" value="<?php echo $p_firstname; ?>"/></label>

<label><span>Parent Last Name:</span> <input type="text" maxlength="40" name="p_lastname" class="input_text" value="<?php echo $p_lastname; ?>"/></label>

<label><span>Child First Name:</span> <input type="text" maxlength="40" name="k_firstname" class="input_text" value="<?php echo $k_firstname; ?>"/></label>

<label><span>Child Last Name:</span> <input type="text" maxlength="40" name="k_lastname" class="input_text" value="<?php echo $k_lastname; ?>"/></label>

<label><span>Email:</span> <input type="text" maxlength="40" name="email" class="input_text" value="<?php echo $email; ?>"/></label>

<label><span>Phone:</span> <input type="text" maxlength="40" name="phone" class="input_text" value="<?php echo $phone; ?>"/></label>

<label><span>Coupon:</span> <input type="text" maxlength="40" name="coupon" class="input_text" value="<?php echo $coupon; ?>"/></label>

<label><span>Security Code:</span><img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /></label>

<label><span></span><input type="text" name="captcha_code" size="10" maxlength="6" class="input_text"/></label>

<label><span></span><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a><br/>

</label>

<input type="submit" name="submit" class="button" />

</form>

</div>

<?php





		}

		else{

?>
  <script>
  $(document).ready(function(){
    $("#commentForm").validate();
  });
  </script>
<div class="box">

<h2>Entre your info</h2>

<form action="?join=<?php echo $classtojoin->id; ?>&appl=1" method="post" id="commentForm">

<input type="hidden" value="<?php echo $classtojoin->id; ?>" name="clsid" />

<label><span>Parent First Name:</span> <input type="text" maxlength="40" name="p_firstname" class="required input_text"  /></label>

<label><span>Parent Last Name:</span> <input type="text" maxlength="40" name="p_lastname" class="required input_text" /></label>

<label><span>Child First Name:</span> <input type="text" maxlength="40" name="k_firstname" class="required input_text"/></label>

<label><span>Child Last Name:</span> <input type="text" maxlength="40" name="k_lastname" class="required input_text"/></label>

<label><span>Email:</span> <input type="text" maxlength="40" name="email" class="required email input_text"/></label>

<label><span>Phone:</span> <input type="text" maxlength="40" name="phone" class="required input_text"/></label>

<label><span>Coupon:</span> <input type="text" maxlength="40" name="coupon" class=" input_text"/>not required</label>

<label><span>Security Code:</span><img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /></label>

<label><span></span><input type="text" name="captcha_code" size="10" maxlength="6" class="required input_text"/></label>

<label><span></span><a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a><br/>

</label>

<input type="submit" name="submit" class="button" value="Submit Form" />

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

  <?php foot(); ?>



