<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sweetcake
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

        <?php
          get_template_part( 'template-parts/slider-main');

          get_template_part( 'template-parts/services');

          get_template_part( 'template-parts/testimonials');

          get_template_part( 'template-parts/works');

          get_template_part( 'template-parts/prices');

          get_template_part( 'template-parts/social');

          get_template_part( 'template-parts/map');

        ?>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
