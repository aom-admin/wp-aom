<?php
function lifted_widgets_init() {

  register_sidebar( array(
    'name'          => __( 'Blog sidebar', 'lifted' ),
    'id'            => 'blog_sidebar',
    'before_widget' => '<div class="sidebar-widget" id="%1$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="sidebar-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'lifted_widgets_init' );
