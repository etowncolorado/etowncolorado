<?php get_header(); ?>
<?php the_post(); ?>
<div class="title-container">
<?php if ( is_day() ) : ?>
			<h1 class="page-title"><?php printf( __( '<span>%s</span>', 'your-theme' ), get_the_time(get_option('date_format')) ) ?></h1>
<?php elseif ( is_month() ) : ?>
			<h1 class="page-title"><?php printf( __( '<span>%s</span>', 'your-theme' ), get_the_time('F Y') ) ?></h1>
<?php elseif ( is_year() ) : ?>
			<h1 class="page-title"><?php printf( __( '<span>%s</span>', 'your-theme' ), get_the_time('Y') ) ?></h1>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
			<h1 class="page-title"><?php _e( 'Blog Archives', 'your-theme' ) ?></h1>
<?php endif; ?>
</div>
<?php rewind_posts(); ?>
	<div id="container">
		<div id="content">

                  
<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                               
<?php /* an h2 title */ ?>                                                      
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'your-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark" style="font-size:24px"><?php the_title(); ?></a></h2>
                                        
<?php /* Microformatted, translatable post meta */ ?>                                                                           
                                        

<?php /* The entry content */ ?>                                        
                                        <div class="entry-content">     
<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
                                        </div><!-- .entry-content -->

<?php /* Microformatted category and tag links along with a comments link */ ?>                                 
                                        <div class="entry-utility">
                                        		<span class="meta-prep meta-prep-entry-date"><?php _e('', 'your-theme'); ?></span>
                                                <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                                                <span class="meta-sep"> | </span>
                                                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'your-theme' ), __( '1 Comment', 'your-theme' ), __( '% Comments', 'your-theme' ) ) ?></span>
                                        </div><!-- #entry-utility -->   
                                </div><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; ?>                      
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link(__( 'older posts', 'your-theme' )) ?></div>
                <div class="nav-next"><?php previous_posts_link(__( 'newer posts', 'your-theme' )) ?></div>
			</div>
<?php } ?>
		</div>
	</div>
<?php get_sidebar(); ?> 
<?php get_footer(); ?>