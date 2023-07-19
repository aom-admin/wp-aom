<?php get_header(); ?>

<section class="main-content" role="region" aria-label="<?php _e( 'Page not found', 'lifted' ); ?>">
  <div class="row">
    <div class="medium-12 columns">
      <?php get_template_part( 'partials/content', '404' ); ?>
    </div><!-- .columns -->
  </div><!-- .row -->
</section>

<?php get_footer();
