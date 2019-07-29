<section class="principles padded" role="region" aria-labelledby="principles-title">
  <div class="row medium-up-2">
    <h2 id="principles-title"><?php _e( 'Our Principles', 'lifted' ); ?></h2>

    <?php while ( have_rows('principles') ) : the_row(); ?>

      <div class="column">
        <div class="principle-block">
          <h3><?php esc_html_e( get_sub_field('title'), 'lifted' ); ?></h3>
          <p><?php esc_html_e( get_sub_field('content'), 'lifted' ); ?></p>
        </div>
      </div>

    <?php endwhile; ?>

  </div>
</section>
