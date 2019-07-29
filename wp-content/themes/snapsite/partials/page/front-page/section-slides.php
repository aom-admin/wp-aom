<?php if ( have_rows('slides') ) : ?>

  <section id="slider-section" class="homepage-slider" data-equalizer data-equalize-on="medium" role="slider" aria-label="<?php _e( 'Content slider', 'lifted' ); ?>">

    <nav class="slide-nav" role="navigation" aria-label="<?php _e( 'Slide navigation', 'lifted' ); ?>">
      <img class="slide-nav-button next"
           src="<?php bloginfo('template_directory'); ?>/assets/img/nav_next.svg"
           alt="<?php _e( 'Next Slide', 'lifted' ); ?>"
           role="button" />
      <img class="slide-nav-button prev"
           src="<?php bloginfo('template_directory'); ?>/assets/img/nav_prev.svg"
           alt="<?php _e( 'Previous Slide', 'lifted' ); ?>"
           role="button" />
    </nav>

    <div class="slider-container">

    <?php while ( have_rows('slides') ) : the_row(); ?>

      <?php if ( get_row_layout() == 'case_study_slide' ) {

        get_template_part( 'partials/page/front-page/slide', 'case-study' );

      } elseif ( get_row_layout() == 'testimonial_slide' ) {

        get_template_part( 'partials/page/front-page/slide', 'testimonial' );

      } elseif ( get_row_layout() == 'blog_slide' ) {

        get_template_part( 'partials/page/front-page/slide', 'blog' );
        
      } ?>

    <?php endwhile; ?>

    </div><!--slider-->
  </section><!--#slider-section-->

<?php endif; ?>
