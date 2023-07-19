<header id="header-layout" class="masthead
<?php if( get_field('sticky_nav', 'option') ): ?>
sticky-nav	
<?php endif; ?>
" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
  <div class="row">

    <div class="small-9 medium-5 large-4 columns">

      <?php
      $logo = get_field('logo','option');
      if( !empty($logo) ): ?>
        <a href="/"><img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" /></a>
      <?php endif; ?>

    </div><!-- .columns -->

    <div class="small-3 medium-7 large-8 columns">

      <?php get_template_part( 'partials/header/nav', 'main-medium' ); ?>

      <a href="#" class="hamburger-icon show-for-small-only" data-toggle="offCanvas">
        <span class="screen-reader-text"><?php esc_html_e( 'Primary menu toggle for small screens.', 'snapsite' ); ?></span>
        <div class="lines">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </a>

    </div><!-- .columns -->

  </div><!-- .row -->
</header>
<?php
//variables set in functions-layout.php, pulls from Theme Options set by user
global $primary_color;
global $secondary_color;
echo '<style type="text/css">
.page-header {
  background-color: ' . $primary_color . ';
  }
  .top-nav .menu-item:nth-child(5n+1) a::after {
  background: ' . $primary_color . ';
}

.top-nav .menu-item:nth-child(5n+2) a::after {
  background: ' . $primary_color . ';
}

.top-nav .menu-item:nth-child(5n+3) a::after {
  background: ' . $primary_color . ';
}

.top-nav .menu-item:nth-child(5n+4) a::after {
  background: ' . $primary_color . ';
}

.top-nav .menu-item:nth-child(5n+0) a::after,
.pagination .current {
  background: ' . $primary_color . ';
}
.button {
  border-bottom-color: ' . $secondary_color . ';
  background: ' . $primary_color . ';
}

a,
.blog-archive .single-post-excerpt a h3 {
  color: ' . $primary_color . ';
}

.hamburger-icon .line {
  background-color: ' . $primary_color . ';
}

.hamburger-icon[aria-expanded="true"] {
 background-color: ' . $primary_color . ';
 border-color: ' . $primary_color . ';
}

</style>';
?>
