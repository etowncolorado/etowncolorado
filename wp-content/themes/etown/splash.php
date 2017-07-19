<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<script>
var $j = jQuery.noConflict();

$j(document).ready(function() {
	moving = 0;
	index = 0;
	speed = 500;
		
	$j('.gallery-rollover').mouseover(function () {
		$j(this).stop(true, false);
		$j(this).animate({opacity: .7}, 400);
	});
	
	$j('.gallery-rollover').mouseout(function () {
		$j(this).stop(true, false);
		$j(this).animate({opacity: 0}, 400);
	});
	
	$j("a#gallery-right").click(function() {
		
		if (moving == 0 && index < 2) {
			moving = 1;
			index++;
			
			$j("ul#home-gallery").animate({
				left: -(960*index)
			}, {
				duration: speed,
				complete: function() {
					moving = 0;
				}
			});
			$j("div#home-gallery-percent").animate({
				width: (314+313*index)
			}, {
				duration: speed,
			});
		} 
	});
	
	$j("a#gallery-left").click(function() {
		if (moving == 0 && index > 0) {
			moving = 1;
			index--;

			$j("ul#home-gallery").animate({
				left: -(960*index)
			}, {
				duration: speed,
				complete: function() {
					moving = 0;
				}
			});
			$j("div#home-gallery-percent").animate({
				width: (314+313*index)
			}, {
				duration: speed,
			});
		} 
	});
});
</script>
		<div class="title-container"><h1 class="page-title"><br/></h1></div>
    	<div id="container" style="margin-right: 0;">
    		<div id="content" style="margin-right: 0;">
    			<div id="home-gallery-nav">
    				<a id="gallery-left">move gallery left</a>
    				<a id="gallery-right">move gallery right</a>
    			</div>
    			<div id="home-gallery-container">
	    			<ul id="home-gallery">
<?php for ($i = 1; $i <= 9; $i++) {?>
						<li>
							<a class="thickbox" href="<?php bloginfo('template_directory'); ?>/images/gallery/full/<?php echo $i; ?>.jpg" rel="gallery-plants">
								<img src="<?php bloginfo('template_directory'); ?>/images/gallery/thumb/<?php echo $i; ?>.jpg" alt="gallery" width="300" height="300" />
								<div class="gallery-rollover"></div>
							</a>
						</li>
<?php } ?>
					</ul>
    			</div>
    			<div id="home-gallery-bar">
    				<div id="home-gallery-percent"></div>
    			</div>
    			<br/>
    			<br/>
    			<div class="title-container">
		        	<h1>e|town is a local neighborhood eatery and bar located in the heart of edwards, colorado,</h1>
		        	<p>
		        		with a passion for consistently delicious cuisine, prepared with love by amazing people, and served in an environment<br/>
						that makes our guests feel welcome dressed up or winding down
		        	</p>
		        </div>
    		</div><!-- #content -->
    	</div><!-- #container -->
<?php get_footer(); ?>