<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sweetcake
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sweetcake' ); ?></a>

    <header id="masthead" class="site-header">

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'sweetcake' ); ?></button>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'header-left',
                'menu_id'        => 'header-left',
            ) );
            if ( function_exists( 'the_custom_logo' ) ) {
            ?>
            <div class="custom-logo-place">
            <?php
              the_custom_logo();
            ?>
            </div>
            <?php
            }
            wp_nav_menu( array(
                'theme_location' => 'header-right',
                'menu_id'        => 'header-right',
            ) );
            ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
