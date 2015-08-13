<?php

require_once("includesmain/session.php");

require_once("includesmain/functions.php");

require_once("includesmain/database.php");

require_once("includesmain/class.php");

require_once("includesmain/client.php");

require_once("includesmain/class_session.php");



require_once("includesmain/datemanager.php");



$activesession = ClassSession::getactivesession();

$classtojoin = Classes::find_by_id($_GET['cls']);

$sessiontojoin = ClassSession::find_by_id($classtojoin->sessionid);



include'includes/pagestructure.php';

include'includes/smartbanner.php';

include'includes/smartnav.php';

head('Welcome to Urban Illustration');

topbar();

?>

 <div id="content">

     

 		<div id="maincontent">

        	<div class="textcontentalone">



<?php



$tmpclt = Client::find_by_id($_GET['tclt']);

if($tmpclt->coupon == 'family'){
	
	$price = '$150';	
	
	}
else{
	$price = '$190';	
	}

?>

<h2>Thank you for Joining: 

The <?php echo DateManager::frontdisplaytimefromtmstp($classtojoin->c_date); ?> Class part of the <?php echo $sessiontojoin->name ; ?></h2>

<h3>Payment information:</h3>
<p>
To complete your registration please send a check for <strong><?php echo $price; ?></strong> made out to Urban Illustration with your child's name in the memo to: <br/>
119 Underhill rd Ossining NY 10562
</p>

<?php
$clientemail = $tmpclt->email;

$txt = 'Thank you for joining Urban Ilustration. To complete registration please send a check for '.$price.' made out to Urban Illustration with your child\'s name in the memo to: 119 Underhill rd Ossining NY 10562';
$conf = $tmpclt->p_lastname.' '.$tmpclt->p_firstname.' has registered '.$tmpclt->k_firstname.' for a class.';
// Use wordwrap() if lines are longer than 70 characters
$txt = wordwrap($txt,70);
// Always set content-type when sending HTML email
$headers = 'Reply-To: contact@rarigrafix.com/' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
// Send email
mail( $clientemail,"Thank you for joining Urban Ilustration", $txt, $headers);
mail( 'rarigrafix22@gmail.com',"Yay! we've got another one",  $conf, $headers);
?>


</div>

         <div class="textcontentclear"></div>           

      </div>        

</div>

  <?php foot(); ?>



