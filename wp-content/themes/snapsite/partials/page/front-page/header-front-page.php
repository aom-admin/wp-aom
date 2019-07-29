<?php $image = get_field("our_mission_background_image"); ?>
<section id="our-mission"
         class="hero"
         style="background-image: url('<?php echo esc_url( $image['url'] ); ?>');"
         role="region"
         aria-labelledby="hero-heading">
  <div class="row">
    <div class="medium-10 large-9 columns">
      <h2 id="hero-heading" class="text-white"><?php esc_html_e( 'Our Mission' , 'lifted' ); ?></h2>
      <p class="text-white font-larger"><?php esc_html_e( get_field('our_mission_text'), 'lifted' ); ?></p>
      <?php
      if ( get_field('button_link_type') == 'external' ) {
        $button_atts = 'href="' . esc_url( get_field('button_link') ) .'" target="_blank"';
      } elseif ( get_field('button_link_type') == 'internal' ) {
        $button_atts = 'href="' . esc_url( get_field('button_link_internal') ) .'"';
      } elseif ( get_field('button_link_type') == 'anchor' ) {
        $button_atts = 'href="#' . esc_attr( get_field('button_link_anchor') ) .'"';
      }
      ?>
      <a class="button" role="button" <?php echo $button_atts; ?>><?php esc_html_e( get_field('button_text'), 'lifted' ); ?></a>
    </div>
  </div>
</section>
