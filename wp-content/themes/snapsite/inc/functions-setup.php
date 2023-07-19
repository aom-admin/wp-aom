<?php
if ( ! function_exists( 'snapsite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function snapsite_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on SnapShot Interactive, use a find and replace
   * to change 'snapsite' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'snapsite', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /**
   * Add support for custom logo.
   */
  add_theme_support( 'custom-logo' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

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
  add_theme_support( 'custom-background', apply_filters( 'snapsite_custom_background_args', array(
    'default-color'     => 'ffffff',
    'default-image'     => '',
  ) ) );

  // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'snapsite_setup' );

/**
 * Customize login screen logo
 */
function snapsite_login_logo() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $sitelogo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  if ( ! empty($sitelogo) ) {
    $output  = '<style type="text/css">';
    $output .= '#login h1 a, .login h1 a {';
    $output .= "background-image: url('{$sitelogo[0]}');";
    $output .= 'background-size: 100%;';
    $output .= 'padding-bottom: 30px;';
    $output .= 'width: inherit;';
    $output .= '}';
    $output .= '</style>';
  }
  echo $output;
}

add_action( 'login_enqueue_scripts', 'snapsite_login_logo' );

/**
 * Theme Options
 */
if ( function_exists( 'acf_add_options_page' ) ) {

  acf_add_options_page( array(
    'page_title'    => 'Theme Option',
    'menu_title'    => 'Options',
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
  ) );

  acf_add_options_sub_page(array(
    'page_title'  => 'News Options',
    'menu_title'  => 'News Options',
    'parent_slug' => 'theme-general-settings',
  ));
}
