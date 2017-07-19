        </div><!-- #main -->
        
        <div id="footer">
        	<?php wp_nav_menu( array( 'theme_location' => 'secondary-navigation', 'after' => '<span>|</span>' , 'items_wrap' => '<ul id=\"%1$s\" class=\"%2$s\">%3$s<li><span class="menu-secondary-text">'.get_option('contact_info_email_address').'</span><span>|</span></li><li><span class="menu-secondary-text">'.get_option('contact_info_phone_number').'</span><span>|</span></li><li><span class="menu-secondary-text">'.get_option('contact_info_address').'</span><span>|</span></li><li><span class="menu-secondary-text"><div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false" data-colorscheme="dark"></div></span></li></ul>') ); ?>
        	<div id="colophon">
        		<a id="wordpress-logo" href="http://wordpress.org/" title="<?php _e( 'WordPress', 'your-theme' ) ?>" rel="generator"><?php _e( 'WordPress', 'your-theme' ) ?></a>
        		powered by
        	</div>
        </div><!-- #footer -->
        
</div><!-- #wrapper --> 

<script type="text/javascript">
if ( typeof tb_pathToImage != 'string' )
    var tb_pathToImage = "<?php echo get_bloginfo('url').'/wp-includes/js/thickbox'; ?>/loadingAnimation.gif";
if ( typeof tb_closeImage != 'string' )
    var tb_closeImage = "<?php echo get_bloginfo('url').'/wp-includes/js/thickbox'; ?>/tb-close.png";
</script>

<?php wp_footer(); ?>

</body>
</html>