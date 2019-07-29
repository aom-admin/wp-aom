<div class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right">

  <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php _e( 'Mobile site navigation', 'snapsite' ); ?>">
    <?php wp_nav_menu( array(
      'theme_location'    => 'main-navigation',
      'container'         => '',
      'menu_class'        => 'vertical menu mobile-nav'
    ) ); ?>
  </nav>

</div>
