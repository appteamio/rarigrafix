<?php

require_once("../includesmain/functions.php");

require_once("../includesmain/session.php");

require_once("../includesmain/database.php");

require_once("../includesmain/user.php");

if($session->is_logged_in()){redirect_to("index.php");}



if( isset($_POST['submit']) ){

	$user = trim($_POST['user']);

	$pass = trim($_POST['pass']);

	$found_user = User::authenticate($user,$pass);



	if($found_user){

	$session->login($found_user);

	redirect_to("index.php");

	}else{

	$message="User or pass incorrect";

	}

} else{ //no form submit yet

	$user ="";

	$pass="";

	}

include'../includes/pagestructure.php';

include'../includes/smartbanner.php';

include'../includes/smartnav.php';

adminhead('Welcome to Urban Illustration');

admintopbar();

?>

 <div id="content">

     

 		<div id="maincontent">

        	<div class="textcontentalone">

            

<h1>Admin Login</h1>

<?php if(isset($message)){ echo output_message($message);}?>

<form action="login.php" method="post">

	<table>

    	<tr>

        	<td>User :</td>

            <td><input type="text" name="user" maxlength="40" value="<?php echo htmlentities($user); ?>" /></td>

            <td><input type="password" name="pass" maxlength="40" value="<?php echo htmlentities($pass); ?>" /></td>

        </tr>

        <tr>

        	<td colspan="2"> <input type="submit" name="submit" value="login" /> </td>	

        </tr>

    </table>

</form>

</div>

         <div class="textcontentclear"></div>           

      </div>        

</div>

  <?php foot(); ?>



<?php if(isset($database)){ $database->close_connection();}?>