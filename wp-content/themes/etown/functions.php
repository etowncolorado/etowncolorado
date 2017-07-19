<?php

function add_themescript(){
    if(!is_admin()){
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox',null,array('jquery'));
    wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
    }
 
}
add_action('init','add_themescript');

include('includes/shortcodes.php');
include('includes/navigation.php');
//include('admin/about.php');
include('admin/contact.php');

function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','SearchFilter');

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'press_reviews',
		array(
			'labels' => array(
				'name' => __( 'Reviews' ),
				'singular_name' => __( 'Review' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor')
		)
	);
	/*if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
		
		// additional image sizes
		// delete the next line if you do not need additional image sizes
		add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	}*/
}
/*
add_action( 'init', 'add_acme_product' );
function add_acme_product() {
	$post_id = '0';
	$post = get_post($my_id);
	if ($post == null)
		$post = array('ID' => $post_id);
	$post['ID'] = $post_id;
  	$post['post_content'] = 'Acme Product Content';
  	$post['post_title'] = 'Acme Product Title';
  	$post['post_type'] = 'acme_product';
  	$post['post_status'] = 'publish';
	
	//wp_insert_post( $post ); 
}*/

// disable admin bar
/*if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}*/

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
        require_once($locale_file);


// Get the page number
function get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __( 'Page ' , 'your-theme') . get_query_var('paged');
    }
} // end get_page_number


// For category lists on category archives: Returns other categories except the current one (redundant)
function cats_meow($glue) {
        $current_cat = single_cat_title( '', false );
        $separator = "\n";
        $cats = explode( $separator, get_the_category_list($separator) );
        foreach ( $cats as $i => $str ) {
                if ( strstr( $str, ">$current_cat<" ) ) {
                        unset($cats[$i]);
                        break;
                }
        }
        if ( empty($cats) )
                return false;

        return trim(join( $glue, $cats ));
} // end cats_meow


// For tag lists on tag archives: Returns other tags except the current one (redundant)
function tag_ur_it($glue) {
        $current_tag = single_tag_title( '', '',  false );
        $separator = "\n";
        $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
        foreach ( $tags as $i => $str ) {
                if ( strstr( $str, ">$current_tag<" ) ) {
                        unset($tags[$i]);
                        break;
                }
        }
        if ( empty($tags) )
                return false;

        return trim(join( $glue, $tags ));
} // end tag_ur_it


// Register widgetized areas
function theme_widgets_init() {
  // Area 1
  register_sidebar( array (
  'name' => 'Primary Widget Area',
  'id' => 'primary-widget-area',
  'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
  ) );

  // Area 2
  register_sidebar( array (
  'name' => 'Secondary Widget Area',
  'id' => 'secondary-widget-area', 
  'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
  ) );
} // end theme_widgets_init

add_action( 'init', 'theme_widgets_init' );

// Pre-set Widgets
$preset_widgets = array (
        'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
        'secondary-aside'  => array( 'links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) {
        update_option( 'sidebars_widgets', $preset_widgets );
}


// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;

  $widgetcolums = wp_get_sidebars_widgets();
                 
  if ($widgetcolums[$index]) return true;
  
        return false;
} // end is_sidebar_active

// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
        $commenter = get_comment_author_link();
        if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
                $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
        } else {
                $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
        }
        $avatar_email = get_comment_author_email();
        $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
        echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link


// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
        $GLOBALS['comment_depth'] = $depth;
  ?>
        <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author vcard"><?php commenter_link() ?></div>
                <div class="comment-meta"><?php printf(__('%1$s %2$s', 'your-theme'),
                                        get_comment_date(),
                                        get_comment_time(),
                                        '#comment-' . get_comment_ID() ); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'your-theme') ?>
          <div class="comment-content">
                <?php comment_text() ?>
          </div>
          
<?php } // end custom_comments


// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
                <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                        <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
                                        get_comment_author_link(),
                                        get_comment_date(),
                                        get_comment_time() );
                                        edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
                        <?php comment_text() ?>
                        </div>
<?php } // end custom_pings

