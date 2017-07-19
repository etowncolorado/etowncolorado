<?php 
function title_container_func( $atts, $content=null, $code="" ) {
	extract( shortcode_atts( array(
		'title' => '',
		'class' => '',
		'id' => ''
	), $atts ) );
	$title = $title == '' ? '&nbsp;' : strtoupper($title);
	return '<div id="'.$id.'" class="title-container '.$class.'">
				<h1>'.$title.'</h1>'.
				strtolower($content).
			'</div>';
}

add_shortcode( 'title_container', 'title_container_func' );

function page_layout_func( $atts, $content=null, $code="" ) {
	extract( shortcode_atts( array(
		'sidebar_width' => '',
		'gutter_width' => '20'
	), $atts ) );
	
	$container = '<div id="container">';
	$container .= do_shortcode($content);
	$sidebar = 'id="sidebar"';
	if (strpos($container, $sidebar) !== false) {	
		if ($sidebar_width) {
			$contain = 'id="container"';
			$contain_style = 'style="margin-right:'.(-$sidebar_width-$gutter_width).'px" ';
			$container = str_replace($contain, $contain_style.$contain, $container);
		
			$content = 'id="content"';
			$content_style = 'style="margin-right:'.($sidebar_width+$gutter_width).'px" ';
			$container = str_replace($content, $content_style.$content, $container);
			
			$sidebar_style = 'style="width:'.$sidebar_width.'px" ';
			$container = str_replace($sidebar, $sidebar_style.$sidebar, $container);
		}
	} else {
		$contain = 'id="container"';
		$contain_style = 'style="margin-right:0px" ';
		$container = str_replace($contain, $contain_style.$contain, $container);
		
		$content = 'id="content"';
		$content_style = 'style="margin-right:0px" ';
		$container = str_replace($content, $content_style.$content, $container);
	}
	return $container;
}

add_shortcode( 'page_layout', 'page_layout_func' );

function content_container_func( $atts, $content=null, $code="" ) {
	extract( shortcode_atts( array(
		'class' => '',
		'id' => ''
	), $atts ) );
	$container = 	'<div id="content" class="content-container '.$class.'">
						<div id="'.$id.'">';
	$container .= do_shortcode($content);
	$container .=		'</div>
					</div>
				</div>';
	return $container;
}

add_shortcode( 'content_container', 'content_container_func' );

function sidebar_container_func( $atts, $content=null, $code="" ) {
	extract( shortcode_atts( array(
		'class' => '',
		'id' => ''
	), $atts ) );
	$container = 	'<div id="sidebar" class="sidebar-container '.$class.'">
						<div id="'.$id.'">';
	$container .= do_shortcode($content);
	$container .=		'</div>
					</div>';
	return $container;
}

add_shortcode( 'sidebar_container', 'sidebar_container_func' );

function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );
?>