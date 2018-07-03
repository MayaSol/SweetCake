<?php
/**
 *
 * Custom post types and taxonomies
 *
 * @package sweetcake
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
