<?php

function head($title){

		?>

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

		<html xmlns="http://www.w3.org/1999/xhtml">

		<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" href="css/design.css" type="text/css"  />

        <link rel="stylesheet" href="css/forms.css" type="text/css"  />
        
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
		<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        
        
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>
		
		
        
        <script src="js/cycle.js" type="text/javascript"></script>

		<script src="js/design.js" type="text/javascript"></script>
        

		

		<title><?php echo $title; ?></title>

		</head>

				<body>

		<?php }

function adminhead($title){

		?>

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

		<html xmlns="http://www.w3.org/1999/xhtml">

		<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" href="../css/design.css" type="text/css"  />

         <link rel="stylesheet" href="../css/forms.css" type="text/css"  />

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

		<script src="js/cycle.js" type="text/javascript"></script>

		<script src="js/design.js" type="text/javascript"></script>

		

		<title><?php echo $title; ?></title>

		</head>

				<body>

		<?php }

function topbar(){ ?>

        <div id="topbar">

                



                    <div id="barcontent">

                       <div id="topbarmenu">

                            <ul>

                            <li class="last_menu"><a href="contact.php">Contact Us</a></li>

                            <li><a href="gallery.php">Gallery</a></li>

                            <li><a href="classes.php">Join a class</a></li>

                            </ul>

                      </div>

                     <div id="logo"><a href="/"><img  src="images/moroccodiscoverieslogo.png" /></a></div>   

                    </div>

    

        </div>

	<?php }	

function admintopbar(){ ?>

        <div id="topbar">

                



                    <div id="barcontent">

                       <div id="topbarmenu">

                            <ul>

                            <li class="last_menu"><a href="#">Contact Us</a></li>

                            <li><a href="#">Gallery</a></li>

                            <li><a href="#">Join a class</a></li>

                            </ul>

                      </div>

                     <div id="logo"><img  src="../images/moroccodiscoverieslogo.png" /></div>   

                    </div>

    

        </div>

	<?php }	

function foot(){

	?>

            <div id="footer">

            	<div id="footercontent">

<?php //descfooter();

//contactus();

//navfooter();

//navfooter2();

//footerpartners();



 ?>

                    <div class="footerbreak"></div>

                    

                 </div>

             </div>

            

</body>

</html>	

	<?php }

function descfooter(){ ?>

	                	

                    <div>

                            <h4>Vermilion</h4>

                       

                    </div>

	<?php }

function navfooter(){

	?>

                        <div class="navfooter">

                           

                            <h5><a href="#">Join our Tour</a></h5>

                            <h5><a href="#">Festival Story</a></h5>

                            <h5><a href="#">Sacred Music</a></h5>

                            <h5><a href="#">City of Fez</a></h5>

                    	</div>

	<?php }

function navfooter2(){

	?>

                        <div class="navfooter">

                           

                            <h5><a href="#">Join our Tour</a></h5>

                            <h5><a href="#">Festival Story</a></h5>

                            <h5><a href="#">Sacred Music</a></h5>

                            <h5><a href="#">City of Fez</a></h5>

                    	</div>

	<?php }

function footerpartners(){ ?>

					<div class="partners">

                            <p>

                            

                            <img src="http://vermilionrestaurant.com/Images/V_Left_Btm_Filler_NEW_v2_000.png" />

                            

                            </p>

                    </div>

	<?php }

function contactus(){ ?>

					<div class="contactus">

                        

                            <p>

                            

1120 King Street<br />

Alexandria, VA 22314<br/>

Call: (800) 684-9669<br/>

Email: contact@Vermilion.com<br/>

                            </p>

                    </div>

    <?php }

?>

