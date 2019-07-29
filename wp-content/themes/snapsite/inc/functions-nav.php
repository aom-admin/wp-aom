<?php
  function snapsite_navigation_menus() {
  $locations = array(
    'main-navigation'       => __( 'Main Navigation', 'text_domain' )
  );
register_nav_menus( $locations );
}

add_action( 'init', 'snapsite_navigation_menus' );
