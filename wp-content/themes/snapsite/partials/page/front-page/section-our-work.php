<?php if ( have_rows('our_work') ) : ?>

  <section id="our-work" class="padded staggered-blocks" role="region" aria-labelledby="our-work-heading">
    <div class="row text-center title-row">
      <div class="small-12 columns">
        <h2 id="our-work-heading"><?php _e( 'Our Work' , 'lifted' ); ?></h2>
      </div>
    </div><!--row-->

    <?php while ( have_rows('our_work') ) : the_row(); ?>

      <div class="row">
        <div class="small-12 columns">
          <?php $image = get_sub_field('image'); ?>
          <img class="image-container"
               src="<?php echo esc_url( $image['url'] ); ?>"
               alt="<?php echo esc_attr( $image['alt'] ); ?>">
          <div class="text-container">
            <h3><?php esc_html_e( get_sub_field('title'), 'lifted' ); ?></h3>
            <p><?php esc_html_e( get_sub_field('description'), 'lifted' ); ?></p>
          </div><!--our-work-text-container-->
        </div><!--columns-->
      </div>

    <?php endwhile; ?>

  </section><!--#our-work-->

<?php endif; ?>
