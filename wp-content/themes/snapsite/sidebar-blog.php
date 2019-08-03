<?php
if ( is_home() || is_archive() ) :
  echo '<h3 class="archive-title">Archives</h3>';
  wp_custom_archive(); ?>

<?php
elseif(is_single() ) :
  echo '<h3 class="archive-title">Archives</h3>';
   wp_custom_archive(); ?>

  <section class="newsletter-subscribe padded">
  <div class="row">
    <div class="columns small-12">
      <h2>Subscribe to our newsletter</h2>
      <?php echo do_shortcode( '[contact-form-7 id="268" title="Newsletter Subscribe"]' ); ?>
      <!-- <div class="button-container">
        <a class="button" style="background-color: <?php echo $GLOBALS['primarycolor']; ?>; border-bottom-color: <?php echo $GLOBALS['secondarycolor']; ?>;">Subscribe</a>
      </div>button-container -->
    </div>
  </div>
  </section>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
  $('.newsletter-subscribe .button').click(function() {
    event.preventDefault();
    $( '.newsletter-subscribe .wpcf7-form-control.wpcf7-submit' ).trigger( 'click' );
  });
  });
  </script>
 <?php endif;
