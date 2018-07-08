<?php
/**
 * Template part for displaying 'Our services' block
 *
 * @package sweetcake
 */

  $args = [
    'post_type' => 'sweetcake_service',
    'post_status' => 'published',
    'orderby' => 'menu_order',
    'order' => 'ASC'
  ];

  $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :

?>

  <section class="sweetcake-services services" id="sweetcake-services">
    <div class="services-title-wrapper">
      <h2 class="services-title">
        Services We Provide
      </h2>
    </div>
    <div class="services-list">

<?php
      /* Start the Loop */
      while ( $the_query->have_posts() ) : $the_query->the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
?>

      <article class="sweetcake-services-item item-services">
        <div class="item-services-img">
<?php
            the_post_thumbnail();
?>
        </div>
        <div class="item-services-content">
<?php
            the_title('<h3 class="item-services-title">','</h3>');
            the_content();
?>
        </div>
      </article>

<?php

    endwhile;

  endif;

?>


  </div>
</section>


