<section class="newsletter-subscribe padded">
  <div class="row">
    <div class="columns medium-10 large-8 medium-centered">
      <h2><?php esc_html_e( get_sub_field('section_heading'), 'snapsite' ); ?></h2>
      <?php if(get_sub_field('section_content')) : ?>
      	<p><?php echo get_sub_field('section_content') ? wp_kses( get_sub_field('section_content'), array( 'p', 'br' ) ) : ''; ?></p>
      	<?php endif; ?>
      <?php echo do_shortcode( '[contact-form-7 id="419" title="Request Information Form"]' ); ?>
      <!-- <div class="button-container">
      	<a class="button" style="background-color: <?php echo $GLOBALS['primarycolor']; ?>; border-bottom-color: <?php echo $GLOBALS['secondarycolor']; ?>;">Subscribe</a>
      </div> -->
    </div>
  </div>
</section>
<!-- <script type="text/javascript">
jQuery(document).ready(function($) {
	$('.newsletter-subscribe .button').click(function() {
		console.log('hey!');
		event.preventDefault();
		$( '.newsletter-subscribe .wpcf7-form-control.wpcf7-submit' ).trigger( 'click' );
	});
});
</script> -->
