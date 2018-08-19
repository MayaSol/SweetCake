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
        ];
        $slider = get_posts( $slider_args );

        $images_args = array (
          'post_parent' => $slider[0]->ID,
          'post_type' => 'attachment',
          'orderby' => 'menu_order', // you can also sort images by date or be name
          'order' => 'ASC',
          'post_mime_type' => 'image'
        );
        $images = get_children( $images_args );

        if ( $images = get_children( $images_args ) ) {
          foreach( $images as $key=>$image ) {
            echo '<div class="slider-main-item">' .
            wp_get_attachment_image( $image->ID, 'slider-main-large') .

/*                <image width="100%" src="' .
                wp_get_attachment_url( $image->ID ) . '"></image>' .*/
                '<h2>' . $image->post_title . '</h2>' .
            '</div>';
          }
        }
      ?>

    </div>

    <div id="slider-nav" class="owl-nav  slider-nav-wrapper">
    </div>

  </div>
