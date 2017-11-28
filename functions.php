<?php

/**
 * Remove p tags from category description
 */
remove_filter('term_description','wpautop');


add_theme_support( 'post-thumbnails' ); 

/**
 * Add menu positions
 */
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'partidos-menu' => __( 'Partidos Menu' ),
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

/**
 * Add custom post type to categories
 */
function add_custom_types_to_tax( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
  
  // Get all your post types
  $post_types = get_post_types();
  
  $query->set( 'post_type', $post_types );
  return $query;
  }
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

?>