<?php
/**
 * sweetcake functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sweetcake
 */

if ( ! function_exists( 'sweetcake_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function sweetcake_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on sweetcake, use a find and replace
     * to change 'sweetcake' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'sweetcake', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'works-thumb', 558, 368, true );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'header-left-menu' => esc_html__( 'Header Left Menu', 'sweetcake' ),
      'header-right-menu' => esc_html__( 'Header Right Menu', 'sweetcake'),
      'socials-menu' => esc_html__( 'Socials Menu', 'sweetcake'),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'sweetcake_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'sweetcake_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sweetcake_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'sweetcake_content_width', 640 );
}
add_action( 'after_setup_theme', 'sweetcake_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sweetcake_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'sweetcake' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'sweetcake' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'sweetcake_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sweetcake_scripts() {
  wp_enqueue_style( 'sweetcake-style', get_stylesheet_uri() );

  wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/node_modules/owl.carousel/dist/assets/owl.carousel.min.css' );

  wp_enqueue_style( 'leaflet', get_template_directory_uri() . '/node_modules/leaflet/dist/leaflet.css' );

  wp_enqueue_script( 'leaflet', get_template_directory_uri() . '/node_modules/leaflet/dist/leaflet.js' );

  wp_enqueue_script( 'sweetcake-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'sweetcake-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/node_modules/owl.carousel/dist/owl.carousel.min.js', array('jquery'), null, true);

  wp_enqueue_script( 'isotope-script', get_template_directory_uri() . '/node_modules/isotope-layout/dist/isotope.pkgd.min.js', array(), null, true);

  wp_enqueue_script( 'isotope-settings', get_template_directory_uri() . '/js/isotope-settings.js', array(), '20180708', true );

  //wp_enqueue_script( 'map-marker', get_template_directory_uri() . '/js/map-marker.js', array(), '20180724', true );
}

add_action( 'wp_enqueue_scripts', 'sweetcake_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom post types for slider.
 */
require get_template_directory() . '/inc/sliders.php';
/**
* Various custom post types
*/
require get_template_directory() . '/inc/custom-post-types.php';
/**
* Cutsom Fields, requires plugin Advanced Custom Fields
*/
require get_template_directory() . '/inc/custom-fields.php';

/**
* Functions for include svg icons
*/
require get_template_directory() . '/inc/icon-functions.php';
/*
 * Options page
 */
require get_parent_theme_file_path( '/inc/options-page.php' );


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');
