<?php
/**
 * Template part for displaying 'Works' block
 *
 * @package sweetcake
 */
$args = [
  'post_type' => 'swcake_price',
  'post_status' => 'publish',
  'orderby' => 'menu_order',
  'order' => 'asc',
];

$the_query = new WP_Query( $args );

?>


<section class="sweetcake-prices prices" id="sweetcake-prices">
  <div class="prices-title-wrapper">
    <h2 class="prices-title">
      Our Prices
    </h2>
  </div>

<?php

if ( $the_query->have_posts() ) :

?>


  <div class="prices-list">

<?php
    /* Start the Loop */
    while ( $the_query->have_posts() ) : $the_query->the_post();
?>

  <article class="prices-item">
<!--    <div class="prices-item-inner"-->
    <div class="prices-item-img">
      <?php the_post_thumbnail('works-item-thumb'); ?>
    </div>
    <div class="prices-item-value">
      <span class="price-value"><?php the_field('price_value');?></span>
      <span class="item-name"><?php the_field('item_name');?></span>
    </div>
    <div class="prices-item-text">
      <?php the_content();?>
      <ul class="prices-item-features">
      <li>
        <?php the_field('price_item_feature_01'); ?>
      </li>
      <li>
        <?php the_field('price_item_feature_02'); ?>
      </li>
      <li>
        <?php the_field('price_item_feature_03'); ?>
      </li>
    </ul>
    <button class="btn prices-btn">
      Order
    </button>
    </div>
<!--  </div-->
    <div class="triangle-container">
      <div class="triangle">
      </div>
    </div>
  </article>

<?php
  endwhile;

endif;
?>

  </div>

<?php
  sweetcake_anchors_next('#sweetcake-prices');
?>
</section>


