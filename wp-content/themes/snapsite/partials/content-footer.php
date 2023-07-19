<div class="row">

  <div class="small-12 medium-6 large-8 columns">
    <div class="title-social-container">
    <h3>Contact</h3>
    <div class="icon-container">
      <?php
      $facebook = get_field('facebook','option');
      $twitter = get_field('twitter','option');
      $linkedin = get_field('linkedin','option');
      $instagram = get_field('instagram','option');
      $youtube = get_field('youtube','option');
      if(!empty($facebook)) :
        echo '<a href="' . $facebook . '" target="_blank">';
        echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
        echo '</a>';
      endif;
      if(!empty($twitter)) :
        echo '<a href="' . $twitter . '" target="_blank">';
        echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
        echo '</a>';
      endif;
      if(!empty($linkedin)) :
        echo '<a href="' . $linkedin . '" target="_blank">';
        echo '<i class="fa fa-linkedin" aria-hidden="true"></i>';
        echo '</a>';
      endif;
      if(!empty($instagram)) :
        echo '<a href="' . $instagram . '" target="_blank">';
        echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
        echo '</a>';
      endif;
      if(!empty($youtube)) :
        echo '<a href="' . $youtube . '" target="_blank">';
        echo '<i class="fa fa-youtube" aria-hidden="true"></i>';
        echo '</a>';
      endif;
      ?>
    </div><!--icon-container-->
  </div><!--title-social-container-->
    <p>
      <?php
      echo esc_html( get_field( 'address', 'option' ) ) . ' ';
      if( get_field('address_line_2','option') ) :
        echo esc_html( get_field( 'address_line_2', 'option' ) ) . ' ';
      endif;
      if( get_field('suite','option') ) :
        echo ' Suite ' . esc_html( get_field( 'suite', 'option' ) ) . ' ';
      endif;
        echo esc_html( get_field( 'city', 'option' ) ) . ', ';
        echo esc_html( get_field( 'state', 'option' ) ) . ' ';
        echo esc_html( get_field( 'zip', 'option' ) ) . ' ';
        echo ' | ';
      ?>
      <?php
      $chars = array( '.', '-' );
      $num = esc_html( get_field( 'phone', 'option' ) );
      $num_link = 'tel:' . str_replace( $chars, '', $num );
      $email = sanitize_email( get_field( 'email', 'option' ) );
      $email = is_email( strtolower($email) );
      ?>
      <a href="<?php echo $num_link; ?>"><?php echo $num; ?></a> |
      <a href="mailto:<?php echo antispambot($email); ?>">Email Us</a>
    </p>
  </div><!--columns-->
  <div class="small-12 medium-6 large-4 columns text-right">
    <a href="" class="snapshot-logo" target="_blank">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/aom-logo-white.png" alt="AOM Logo">
    </a>

  </div><!-- .columns -->

</div><!-- .row -->
