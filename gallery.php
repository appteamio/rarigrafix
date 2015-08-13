<?php

include'includes/pagestructure.php';

include'includes/smartbanner.php';

include'includes/smartnav.php';

head('Welcome to Urban Illustration');

topbar();

?>
		<style type="text/css" media="screen">
			* { margin: 0; padding: 0; }
			h1{ margin-left:20px;}

			
			p { font-size: 1.2em; }
			ul{ margin:10px;}
			
			ul li { display: inline; padding:40px; }
			
			.wide {
				border-bottom: 1px #000 solid;
				width: 4000px;
			}
			
			.fleft { float: left; margin: 0 20px 0 0; }
			
			.cboth { clear: both; }
			

		</style>
 <div id="content">
          

 		<div id="maincontent">
                   
                    <h1> Urban Illustration Gallery:</h1>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
		<div id="main">

	

			<ul class="gallery clearfix">
				<li><a href="images/images_big/DSC_0009.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0009.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>

				<li><a href="images/images_big/DSC_0010.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0010.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>
                
                				<li><a href="images/images_big/DSC_0013.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0013.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>
                                				<li><a href="images/images_big/DSC_0033.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0033.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>

				<li><a href="images/images_big/DSC_0039.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0039.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>

				<li><a href="images/images_big/DSC_0046.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0046.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>
                
                				<li><a href="images/images_big/DSC_0057.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0057.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>
                                				<li><a href="images/images_big/DSC_0070.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0070.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>

				<li><a href="images/images_big/DSC_0440.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0440.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>

				<li><a href="images/images_big/DSC_0450.jpg" rel="prettyPhoto[gallery1]" title=""><img src="images/thumbnails/DSC_0450.jpg" width="140" height="140" alt="Urban Illustration Gallery" /></a></li>
                
		  </ul>			
			
			<br class="cboth" />
	
    
	
			
	
		  <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
	
	</div>

                    <div class="textcontentclear"></div>

                    

                    <div class="textcontentright">

                 

                    <div class="textcontentclear"></div>

                    

      </div>        

</div>

  <?php foot(); ?>

