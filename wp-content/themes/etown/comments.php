<?php /* The Comments Template � with, er, comments! */ ?>                      
                        <div id="comments">
<?php /* Run some checks for bots and password protected posts */ ?>    
<?php
        $req = get_option('require_name_email'); // Checks if fields are required.
        if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
                die ( 'Please do not load this page directly. Thanks!' );
        if ( ! empty($post->post_password) ) :
                if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
                                <div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'your-theme') ?></div>
                        </div><!-- .comments -->
<?php
                return;
        endif;
endif;
?>
									<div id="comments-list" class="comments">
                                	<h1 class="entry-title">COMMENTS:</h1>
<?php /* See IF there are comments and do the comments stuff! */ ?>                                             
<?php if ( have_comments() ) : ?>

<?php /* Count the number of comments and trackbacks (or pings) */
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
        get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

                                
<?php /* IF there are comments, show the comments */ ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>



<?php /* If there are enough comments, build the comment navigation  */ ?>                                      
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                                    <div id="comments-nav-above" class="comments-navigation">
                                    	<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                                   	</div><!-- #comments-nav-above -->                                      
<?php endif; ?>                                 
                                
<?php /* An ordered list of our custom comments callback, custom_comments(), in functions.php   */ ?>                           
                                        <ul>
<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
                                        </ul>

<?php /* If there are enough comments, build the comment navigation */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>                                    
                                <div id="comments-nav-below" class="comments-navigation">
                                                <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                </div><!-- #comments-nav-below -->
<?php endif; ?>                                 
                                        

<?php endif; /* if ( $comment_count ) */ ?>

<?php /* If there are trackbacks(pings), show the trackbacks  */ ?>

                                                   
					

<?php endif /* if ( $comments ) */ ?>

                                </div><!-- #comments-list .comments -->
							</div>
<?php /* If comments are open, build the respond form */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
							<div class="post type-post status-publish format-standard hentry">
                                <div id="respond">                                
                                        <div class="formcontainer">     
                                                <form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

														<h1 class="entry-title">POST A COMMENT:</h1>


              <div id="form-section-author" class="form-section">
                                                                <div class="form-label"><label for="author"><?php _e('Name:', 'your-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?></div>
                                                                <div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
              </div><!-- #form-section-author .form-section -->

              <div id="form-section-email" class="form-section">
                                                                <div class="form-label"><label for="email"><?php _e('Email:', 'your-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'your-theme') ?></div>
                                                                <div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
              </div><!-- #form-section-email .form-section -->

              <div id="form-section-url" class="form-section">
                                                                <div class="form-label"><label for="url"><?php _e('Website:', 'your-theme') ?></label></div>
                                                                <div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
              </div><!-- #form-section-url .form-section -->
<p id="comment-notes"><?php _e('Your email is <em>never</em> published nor shared.', 'your-theme') ?> <?php if ($req) _e('Required fields are marked <span class="required">*</span>', 'your-theme') ?></p>
              <div id="form-section-comment" class="form-section">
                                                                <div class="form-label"><label for="comment"><?php _e('Comment:', 'your-theme') ?></label></div>
                                                                <div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
              </div><!-- #form-section-comment .form-section -->
              
              <div id="form-allowed-tags" class="form-section">
                      <p><span><?php _e('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'your-theme') ?></span><br/><br/><code><?php echo allowed_tags(); ?></code><br/><br/></p>
              </div>
              
                                                                 

                                                        
<?php do_action('comment_form', $post->ID); ?>
                  
                                                        <div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php _e('Post Comment', 'your-theme') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>

<?php comment_id_fields(); ?>  

<?php /* Just � end everything. We're done here. Close it up. */ ?>  

                                                </form><!-- #commentform -->                                                                            
                                        </div><!-- .formcontainer -->
                                </div><!-- #respond -->
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
                        </div><!-- #comments -->