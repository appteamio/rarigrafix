<?php function bannercontentdisplay($image, $title, $desc){

	?>

  <div class="imagebanner">

               <div class="bigbanner">

                                        <img src="images/<?php echo $image ?>" />

                </div>

 </div>

	<?php }

function smartbannerdisplay(){

	 ?>

     

             <div id="bannernavs">



             </div>

                 <div id="cyclebanner">

<?php bannercontentdisplay(

						"banner.png",

						"Join A Class",

						"Aliquam semper, turpis dignissim malesuada malesuada, justo eros tristique lectus, vitae sollicitudin felis justo non lorem. Pellentesque vel sapien odio. Ut nulla sapien, pellentesque eget ultrices et, porttitor id ligula."

					);



?>

                            

                  </div>

                <div id="roundnav"><div  id="nav"></div></div>

            

<?php }

?>