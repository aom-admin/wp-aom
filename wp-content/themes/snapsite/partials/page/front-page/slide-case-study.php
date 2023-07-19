<div class="case-study">
  <div class="row expanded collapse">

    <div class="left-half columns medium-6" data-equalizer-watch>
      <?php if ( get_sub_field('image') ) : $image = get_sub_field('image'); ?>
        <img src="<?php echo esc_url( $image['url'] ); ?>"
             alt="<?php echo esc_attr( $image['alt'] ); ?>" />
      <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paper.svg"
             alt="<?php printf( __( '%s Resources', 'lifted' ), 'LIFT Education' ); ?>" />
      <?php endif; ?>
    </div><!-- .left-half -->

    <div class="right-half columns medium-6" data-equalizer-watch>
      <div class="constrained-content">
        <p class="text-blue text-bold"><?php esc_html_e( get_sub_field('title'), 'lifted' ); ?></p>
        <p><?php esc_html_e( get_sub_field('excerpt'), 'lifted' ); ?></p>

        <?php if ( get_sub_field('link_type') == 'external' ) {

          $link_atts = 'href="' . esc_url( get_sub_field('read_more_link') ) . '" target="_blank"';

        } elseif ( get_sub_field('link_type') == 'media' ) {

          $link_atts = 'href="' . esc_url( get_sub_field('read_more_link_media')->guid ) . '" target="_blank"';

        } elseif ( get_sub_field('link_type') == 'internal' ) {

          $link_atts = 'href="' . esc_url( get_sub_field('read_more_link_internal') ) . '"';

        } ?>

        <a class="button" role="button" <?php echo $link_atts; ?>><?php printf( __( 'Read More%s about this content.%s', 'lifted' ), '<span class="screen-reader-text">', '</span>' ); ?></a>
      </div>
    </div><!-- .right-half -->

  </div><!-- .row -->
</div><!-- .case-study -->
