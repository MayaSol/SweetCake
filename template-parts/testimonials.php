<?php
/**
 * Template part for displaying 'Testimonials' block
 *
 * @package sweetcake
 */

  $args = [
    'post_type' => 'swcake_testimonial',
    'post_status' => 'publish',
    'orderby' => 'rand',
    'posts_per_page' => 2,
  ];

  $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :

?>

  <section class="sweetcake-testimonials testimonials" id="sweetcake-testimonials">
    <div class="testimonials-list">

<?php
      /* Start the Loop */
      while ( $the_query->have_posts() ) : $the_query->the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
?>

      <article class="sweetcake-testimonials-item item-testimonials">
        <div class="item-testimonials-content">
<?php
        the_title('<h3 class="item-testimonials-title">','</h3>');
?>
          <div class="item-testimonials-text">
<?php
          the_content();
?>
          </div>
        </div>

      </article>

<?php
    endwhile;

  endif;
?>
  </div>

<?php
  sweetcake_anchors_next('#sweetcake-testimonials');
?>
</section>


