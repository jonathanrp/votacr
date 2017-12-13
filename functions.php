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

/**
 * Facebook Open Graph
 */
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
  return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
global $post;
  if(get_the_title()){
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
  } else {
    echo '<meta property="og:title" content="Vota.CR"/>';
  }
  echo '<meta property="og:type" content="article"/>';
  echo '<meta property="og:description" content="Vota.CR información centralizada para un voto informado"/>';
  if(get_permalink()){
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
  } else {
    echo '<meta property="og:url" content="http://www.vota.cr"/>';
  }
  
  echo '<meta property="og:site_name" content="Vota.CR"/>';
  if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
    $default_image="http://www.vota.cr/wp-content/themes/vota/img/votacr_og.png"; //replace this with a default image on your server or an image in your media library
    echo '<meta property="og:image" content="' . $default_image . '"/>';
  }
  else{
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
  }
;
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
?>