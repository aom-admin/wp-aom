<section class="slider-block">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/prev-arrow.png" class="prev-arrow">
   <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/next-arrow.png" class="next-arrow">
	<div class="slider-container">

		<?php	if( have_rows('slides') ):
		 ?>
			<?php while ( have_rows('slides') ) : the_row();
			// Check alignment of slide content
    		if( get_sub_field('content_alignment') == 'right' ) {
    			$alignment = 'medium-push-6';
    		} else {
    			$alignment = '';
    		}
    	// Check color of background to set color of slide content
    	//	if( get_sub_field('dark_background') ) {
				// 	$background_color = 'dark-background';
				// } else {
				// 	$background_color = 'light-background';
				// }
    		?>
			<?php $slider_background = get_sub_field('slide_background'); ?>
				<div class="slide" style="background-image: url('<?php echo $slider_background["url"]; ?>');">
          <div class="overlay"></div>
					<div class="row">
						<div class="slide-content columns small-12 medium-6 <?php echo $alignment; ?>">
							<?php the_sub_field('slide_content'); ?>
							<?php if(get_sub_field('button_link')) : ?>
								<a href="<?php the_sub_field('button_link'); ?>" class="button" style="background-color: <?php echo $GLOBALS['primarycolor']; ?>; border-bottom-color: #cc1e24"><?php the_sub_field('button_text'); ?></a>
							<?php endif; ?>
						</div><!--slide-content-->
					</div><!--row-->
				</div><!--slide-->
			<?php endwhile; ?>
		<?php else :
		    // no rows found
		endif; ?>
	</div><!--slider-container-->
</section>

<script type="text/javascript">

	jQuery(document).ready(function($) {

	  $('.slider-container').slick({
			infinite: true,
	    slidesToShow: 1,
	    autoplay: false,
	    arrows: true,
      nextArrow: $('.next-arrow'),
      prevArrow: $('.prev-arrow'),
      responsive: [
      {
        breakpoint: 640,
        settings: {
          arrows: false,
          dots: true,
          adaptiveHeight: true
        }
      }
    ]
	  });

	});
</script>