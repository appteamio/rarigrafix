<?php
require_once("includesmain/functions.php");
require_once("includesmain/database.php");
require_once("includesmain/class.php");
require_once("includesmain/class_session.php");
$activesession = ClassSession::getactivesession();

include'includes/pagestructure.php';
include'includes/smartbanner.php';
include'includes/smartnav.php';
head('Welcome to Urban Illustration');
topbar();
?>
 <div id="content">
     
 		<div id="maincontent">


                    <div class="textcontentalone">
                    <h1>Welcome to the <?php echo $activesession->name;  ?></h1>
                    <h2>Available Classes</h2>
                   <table id="tbschedualdisplay">
<tr class="tabletitle"><td class="classdate">Class Dates</td><td class="avaspots">Available Spots</td><td class="joincls">Join Class</td><td>Notes</td></tr>
<?php Classes::frontdisplayclass($activesession->id) ?>
</table>
      				</div>
                    <div class="textcontentclear"></div>
                    
      </div>        
</div>
  <?php foot(); ?>