<?php

function snapsite_theme_scripts() {

  /**
   * Typekit
   *
   * @link https://typekit.com/
   */
  // $typekit_id = 00000; // Replace this with the ID associated with your kit.
  // wp_enqueue_script( 'typekit', '//use.typekit.net/' . $typekit_id . '.js', array(), '1.0.0' );

  /**
   * WhatInput
   *
   * @version v4.3.1
   * @link https://github.com/ten1seven/what-input
   */
  wp_enqueue_script( 'what-input', get_template_directory_uri() . '/lib/what-input/dist/what-input.min.js', array(), '4.3.1', true );

  /**
   * Foundation
   *
   * By default the theme supports the legacy `float grid` for increased backwards compatibility.
   * To use the newer XY Grid, change `foundation-float-grid` to `foundation` in the variable below.
   * @version v6.4.2
   * @link http://foundation.zurb.com/sites/docs/
   */
  $foundation_dir = '/lib/foundation-float-grid';
  wp_enqueue_script( 'foundation-js', get_template_directory_uri() . $foundation_dir . '/js/foundation.min.js', array( 'jquery' ), '6.4.2', true );
  wp_enqueue_style( 'foundation', get_template_directory_uri() . $foundation_dir . '/css/foundation.min.css', array(), '6.4.2', 'all' );

  /**
   * FontAwesome
   *
   * @version v4.7.0
   * @link http://fontawesome.io/
   */
  wp_enqueue_script( 'fontawesome', '//use.fontawesome.com/805ef52297.js', array(), '4.7.0' );


  /**
   * HoverIntent
   *
   * @version v1.9.0
   * @link https://briancherne.github.io/jquery-hoverIntent/
   */
  wp_enqueue_script( 'hoverintent', '//cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/1.9.0/jquery.hoverIntent.js', array(), '1.9.0' );

  /**
   * Typekit Font
   *
   */
  wp_enqueue_style( 'Calibri', 'https://use.typekit.net/gfe2xxq.css' );



  /**
   * SlickNav
   *
   * Disabled by default, but here for use as an option as needed.
   * @version v1.0.10
   * @link https://github.com/ComputerWolf/SlickNav
   */
  // wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/lib/slicknav/dist/jquery.slicknav.min.js', array( 'jquery' ), '1.0.10', true );
  // wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/lib/slicknav/dist/slicknav.min.css', array(), '1.0.10', 'all' );

  /**
   * Slick Slider
   *
   * @version v1.6.0
   * @link http://kenwheeler.github.io/slick/
   */
  $slick_css = '/assets/css/slick-theme.css';
  wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array( 'jquery' ), '1.6.0', true );
  wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array(), '1.6.0', 'all' );
  wp_enqueue_style( 'slick-theme', get_template_directory_uri() . $slick_css, array(), filemtime( get_template_directory() . $slick_css ), 'all' );

  /**
   * Lity
   *
   * @version v2.3.0
   * @link https://sorgalla.com/lity/
   */
  wp_enqueue_script( 'lity-js', get_template_directory_uri() . '/lib/lity/dist/lity.min.js', array( 'jquery' ), '2.3.0', true );
  wp_enqueue_style( 'lity', get_template_directory_uri() . '/lib/lity/dist/lity.min.css', array(), '2.3.0', 'all' );


  /**
   * Skip link focus fix
   *
   * @version v0.1.0
   * @link https://github.com/cedaro/skip-link-focus
   */
  wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/lib/skip-link-focus-fix/skip-link-focus-fix.js', array(), '0.1.0', true );

  /**
   * Theme scripts
   *
   * If using for AJAX or internationlization: register first, then localize, enqueue last.
   */
  $theme_js = '/assets/js/app.js';
  wp_register_script( 'theme-js', get_template_directory_uri() . $theme_js, false, filemtime( get_template_directory() . $theme_js ), true );
  wp_localize_script( 'theme-js', 'myAjax', array(
    // 'ajaxurl'       => esc_url( admin_url( 'admin-ajax.php' ) ),
    // 'loading'       => esc_html__( 'Loading …', 'snapsite' ),
    // 'noposts'       => esc_html__( 'No older posts found', 'snapsite' ),
    // 'loadmore'      => esc_html__( 'Load more', 'snapsite' ),
  ) );
  wp_enqueue_script( 'theme-js' );

  /**
   * Theme styles.
   */
   $theme_css = '/assets/css/app.css';
   wp_enqueue_style( 'theme', get_template_directory_uri() . $theme_css, array(), filemtime( get_template_directory() . $theme_css ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'snapsite_theme_scripts' );

/**
 * Login styles
 */
function snapsite_login_css() {
  wp_enqueue_style( 'login_css', get_template_directory_uri() . '/assets/css/login.css' );
}
add_action( 'login_head', 'snapsite_login_css' );

/**
 * Check to make sure the typekit script has been enqueued and then load the
 * inline script.
 */
function snapsite_typekit_inline() {
  if ( wp_script_is( 'typekit', 'enqueued' ) ) {
    echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
  }
}
add_action( 'wp_head', 'snapsite_typekit_inline' );
