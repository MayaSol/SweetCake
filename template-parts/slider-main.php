<?php
/**
 * Template part for displaying sliders
 *
 * @package sweetcake
 */

?>
  <div class="slider-main">

    <div class="owl-carousel">

      <?php
        $slider_args = [
        'post_type'      => 'slider',
        'post_name__in'  => ['slider-main'],
        'post-status'    => 'published',
        'posts_per_page' => 1,
//        'fields'         => 'ids',
        ];
        $slider = get_posts( $slider_args );
        error_log(print_r($slider,true));

        $images_args = array (
          'post_parent' => $slider[0]->ID,
          'post_type' => 'attachment',
          'orderby' => 'menu_order', // you can also sort images by date or be name
          'order' => 'ASC',
          'post_mime_type' => 'image'
        );
        $images = get_children( $images_args );
        error_log(print_r($images,true));

        if ( $images = get_children( $images_args ) ) {
          foreach( $images as $key=>$image ) {
            echo '<div class="slider-main-item">
                <image width="100%" height="500" src="' .
                wp_get_attachment_url( $image->ID ) . '"></image>' .
                '<h2>' . $image->post_title . '</h2>' .
            '</div>';
          }
        }
      ?>

    </div>

    <div id="slider-nav" class="owl-nav  slider-nav-wrapper">
    </div>

  </div>