<?php
/**
 * Layout functions.
 */
require get_template_directory() . '/inc/functions-layout.php';

/**
 * Theme setup.
 */
require get_template_directory() . '/inc/functions-setup.php';

/**
 * Register custom post types.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
require get_template_directory() . '/inc/functions-post-types.php';

/**
 * Register navigation menus.
 */
require get_template_directory() . '/inc/functions-nav.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory(). '/inc/functions-scripts.php';

/**
 * Register widget areas.
 */
require get_template_directory(). '/inc/functions-widgets.php';

/**
 * Anything else!
 */
require get_template_directory(). '/inc/functions-extras.php';
