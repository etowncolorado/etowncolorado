<?php
function register_navigation() {
  register_nav_menus(
    array('primary-navigation' => __( 'Primary Navigation' ), 'secondary-navigation' => __( 'Secondary Navigation' ))
  );
}

add_action( 'init', 'register_navigation' );
?>