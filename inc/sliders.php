<?php
/**
 *
 * Custom post types and taxonomies for sliders
 *
 * @package sweetcake
 */


function create_slider_posttype() {
    $args = array(
      'labels' => array(
        'name' => __( 'Sliders' ),
        'singular_name' => __( 'Slider' )
      ),
      'public' => false,
      'show_ui' => true,
      //'menu_icon' => 'dashicons-images-alt',
      'capability_type' => 'page',
      'rewrite' => array( 'slider-loc', 'post_tag' ),
      'label'  => 'Slider',
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
    );
    register_post_type( 'slider', $args );
}

add_action( 'init', 'create_slider_posttype' );


/*function create_slider_location_tax() {
  register_taxonomy(
    'slider-loc',
    'slider',
    array(
      'label' => 'Slider location',
      'public' => false,
      'show_ui' => true,
      'show_admin_column' => true,
      'rewrite' => false
    )
  );
}

add_action( 'init', 'create_slider_location_tax' );*/


