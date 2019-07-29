<?php
if ( is_home() || is_archive() || is_single() ) :

  if ( is_active_sidebar( 'blog_sidebar' ) ) :

    dynamic_sidebar( 'blog_sidebar' );

  endif;

endif;
