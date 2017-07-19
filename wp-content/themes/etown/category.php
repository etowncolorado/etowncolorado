<?php get_header(); ?>
        		<div class="title-container"><h1 class="page-title"><?php _e( 'Category: ', 'your-theme' ) ?> <span><?php single_cat_title() ?></span></span></h1></div>
                <div id="container">    
                        <div id="content">
                        
<?php the_post(); ?>                    
                        
                                
                                <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>

<?php rewind_posts(); ?>
                        
                   

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
                                </div><!-- #nav-below -->
<?php } ?>                      
                        
                        </div><!-- #content -->         
                </div><!-- #container -->
                
<?php get_sidebar(); ?> 
<?php get_footer(); ?>