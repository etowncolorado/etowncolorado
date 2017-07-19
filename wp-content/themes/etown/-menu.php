<?php
/*
Template Name: Menu Static
*/
?>

<?php get_header(); ?>

        <div class="title-container">
        
        	<h1 class="page-title">"Since etown's beginnings as a laid-back local's joint,</h1>
        	<p>
        		both the atmosphere and menus have evolved. We've created an unpretentious yet upscale ambience where guests are equally welcome<br/>
        		to watch their favorite game or enjoy a relaxing meal. We take inspiration from the world's most popular cuisines and give them<br/>
        		a spin that's authentically e|town's. Over 5 years later, we are having more fun than ever. Simply put, we have a passion for<br/>
        		pure flavor, quality ingredients prepared from scratch by great people, and served in an approachable environment that makes<br/>
        		our guests want to settle in, get comfortable and have a great time. Please come enjoy an elegant meal without any fussy formality."
        	</p>
        </div>
        <br/>
    	<div id="container" style="margin-right: 0;">
    		<div id="content" style="margin-right: 0;">
				<ul id="menu-info">
					<li>
	        			<a href="<?php bloginfo('url'); ?>/wp-content/uploads/food.pdf">
	        				<img src="<?php bloginfo('template_directory'); ?>/images/menu/food.jpg" alt="menu_0" width="460" height="345" />
	        				<div></div>
	        			</a>
	        			<div class="title-container">
	        				<h1 class="page-title">FOOD</h1>
	        			</div>
	        			<a class="grey-button" href="<?php bloginfo('url'); ?>/wp-content/uploads/food.pdf">view menu</a>
					</li>
					<li>
						<a  href="<?php bloginfo('url'); ?>/wp-content/uploads/drinks.pdf">
							<img src="<?php bloginfo('template_directory'); ?>/images/menu/drinks.jpg" alt="menu_0" width="460" height="345" />
							<div></div>
						</a>
	        			<div class="title-container">
	        				<h1 class="page-title">DRINKS + DESSERTS</h1>
	        			</div>
	        			<a class="grey-button" href="<?php bloginfo('url'); ?>/wp-content/uploads/drinks.pdf">view menu</a>
					</li>
				</ul>
    		</div><!-- #content -->
    		
    	</div><!-- #container -->
<?php get_footer(); ?>