<?php get_header(); ?>
        <div class="title-container"><h1 class="page-title">OUR BLOG</h1></div>
                <div id="container">    
                        <div id="content">
                        
<?php the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                        
                                        <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
                                        </div><!-- .entry-content -->
                                        
                                        <div class="entry-utility">
                                        		<span class="meta-prep meta-prep-entry-date"><?php _e('', 'your-theme'); ?></span>
                                                <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                                        </div><!-- .entry-utility -->                                                                                                   
                                </div><!-- #post-<?php the_ID(); ?> -->                 
                                
                                                                    

<?php comments_template('', true); ?>                   
                        
                        </div><!-- #content -->         
                </div><!-- #container -->
                
<?php get_sidebar(); ?> 
<?php get_footer(); ?>