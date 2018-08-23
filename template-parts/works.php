<?php
/**
 * Template part for displaying 'Works' block
 *
 * @package sweetcake
 */
$args = [
  'post_type' => 'swcake_work',
  'post_status' => 'publish',
  'orderby' => 'rand',
];

$the_query = new WP_Query( $args );

?>


<section class='sweetcake-works works' id='sweetcake-works'>
  <div class='works-title-wrapper'>
    <h2 class='works-title'>
      Our Works
    </h2>
  </div>

<?php

if ( $the_query->have_posts() ) :

?>

  <div class='works-list'>

<?php
    $terms_all = '';
    /* Start the Loop */
    while ( $the_query->have_posts() ) : $the_query->the_post();
      $id = get_the_ID();
      $terms = wp_get_post_terms($id,'swcake_works_taxonomy');
      $terms_classes = swcake_term_classes($terms);
      $terms_all = $terms_all . $terms_classes;
?>
      <article class='works-item<?php echo $terms_classes ?>'>
        <div class='works-item-img'>
          <?php echo swcake_post_thumbnail($post,'card-works'); ?>
        </div>
        <div class='work-item-desc'>
          <h3 class='work-item-title'>
            <?php the_title();?>
          </h3>
          <div class='work-item-text'>
            <?php the_content();?>
          </div>
        </div>

      </article>

<?php
    endwhile;

endif;
?>

  </div>

  <?php
    $terms_list = array_unique(explode(' ',trim($terms_all)));
  ?>

  <div class='terms-buttons'>
    <div class='terms-buttons-item' data-filter='*'>Show All</div>
    <?php
      foreach ($terms_list as $key => $value) {
        echo '<div class="terms-buttons-item" data-filter=".' . $value .'">'
        . $value . '</div>';
      }
    ?>
  </div>
</section>


