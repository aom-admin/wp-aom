<section id="what-is-lift" class="padded text-center" role="region" aria-labelledby="what-is-lift-heading">
  <div class="row">
    <div class="medium-8 medium-centered columns">
      <h2 id="what-is-lift-heading"><?php printf( esc_html__( 'What is %s' , 'lifted' ), 'LIFT' ); ?></h2>
      <p class="font-larger"><?php esc_html_e( get_field('what_is_lift_text'), 'lifted' ); ?></p>
    </div><!--columns-->
  </div><!--row-->

  <?php if ( have_rows('circle_icons') ) : ?>

    <div class="row circle-icons">
      <div class="medium-8 medium-centered columns">
        <div class="row medium-up-3">

          <?php while ( have_rows('circle_icons') ) : the_row(); $icon = get_sub_field('icon_image'); ?>

            <div class="column">
              <div class="container">
                <img src="<?php echo esc_url( $icon['url'] ); ?>"
                     alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
              </div><!-- .container -->
              <p><?php esc_html_e( get_sub_field('icon_text'), 'lifted' ); ?></p>
            </div><!-- .column -->

          <?php endwhile; ?>

        </div><!-- .row -->
      </div><!-- .columns -->
    </div><!-- .row -->

  <?php endif; ?>

</section><!--#what-is-lift-->
