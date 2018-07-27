  <section class="sweetcake-social social" id="sweetcake-social">
    <div class="social-title-wrapper">
      <h2 class="social-title">
        Follow Us
      </h2>
    </div>
<?php
    wp_nav_menu( array(
        'theme_location' => 'socials-menu',
        'menu_id'        => 'socials-menu',
        'link_before'    => '<span class="screen-reader-text">',
        'link_after'     => '</span>'
    ) );
?>
</section>
