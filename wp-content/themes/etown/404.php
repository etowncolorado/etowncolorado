<?php get_header(); ?>
	<div class="title-container"><h1 class="entry-title"><?php _e( 'Not Found', 'your-theme' ); ?></h1></div>
	<div id="container">
		<div id="content">
			<div id="post-0" class="post error404 not-found">
				
				<div class="entry-content">
					<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'your-theme' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_sidebar(); ?> 
<?php get_footer(); ?>