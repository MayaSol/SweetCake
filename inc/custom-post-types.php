<?php
/**
 *
 * Custom post types and taxonomies
 *
 * @package sweetcake
 */

/*
* Custom post type for services block
*/

function create_services_posttype() {
    $args = array(
      'labels' => array(
        'name' => __( 'SweetCake Services' ),
        'singular_name' => __( 'SweetCake Service' )
      ),
      'public' => true,
      //'menu_icon' => 'dashicons-images-alt',
      'capability_type' => 'post',
      'label'  => 'service',
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
    );
    register_post_type( 'sweetcake_service', $args );
}

add_action( 'init', 'create_services_posttype' );


function create_testimonials_posttype() {
    $args = array(
      'labels' => array(
        'name' => __( 'SweetCake Testimonials' ),
        'singular_name' => __( 'SweetCake Testimonial' )
      ),
      'public' => true,
      //'menu_icon' => 'dashicons-images-alt',
      'capability_type' => 'post',
      'label'  => 'testimonial',
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
    );
    register_post_type( 'swcake_testimonial', $args );
}

add_action( 'init', 'create_testimonials_posttype' );

/*
 * Custom post type and taxonomy for Our Works block
*/


function create_works_posttype() {
    $args = array(
      'labels' => array(
        'name' => __( 'SweetCake Works' ),
        'singular_name' => __( 'SweetCake Work' )
      ),
      'public' => true,
      //'menu_icon' => 'dashicons-images-alt',
      'capability_type' => 'post',
      'label'  => 'work',
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
    );
    register_post_type( 'swcake_work', $args );
}

add_action( 'init', 'create_works_posttype' );


function create_works_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Work Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Work Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Work Types' ),
    'popular_items' => __( 'Popular Work Types' ),
    'all_items' => __( 'All Work Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Work Type' ),
    'update_item' => __( 'Update Work Type' ),
    'add_new_item' => __( 'Add New Work Type' ),
    'new_item_name' => __( 'New Work Type Name' ),
    'separate_items_with_commas' => __( 'Separate work types with commas' ),
    'add_or_remove_items' => __( 'Add or remove work types' ),
    'choose_from_most_used' => __( 'Choose from the most used work types' ),
    'menu_name' => __( 'Work Types' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('swcake_works_taxonomy','swcake_work', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'work' ),
  ));
}


add_action( 'init', 'create_works_taxonomy', 0 );


/*
 * Custom post type for Prices block
*/

function create_price_posttype() {
    $args = array(
      'labels' => array(
        'name' => __( 'SweetCake Prices' ),
        'singular_name' => __( 'SweetCake Price' )
      ),
      'public' => true,
      //'menu_icon' => 'dashicons-images-alt',
      'capability_type' => 'post',
      'label'  => 'price',
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
    );
    register_post_type( 'swcake_price', $args );
}

add_action( 'init', 'create_price_posttype' );
