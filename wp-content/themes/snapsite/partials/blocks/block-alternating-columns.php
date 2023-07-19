<section class="alternating-columns padded extra">
  <div class="row text-center heading-container">
    <h2><?php the_sub_field('section_heading'); ?></h2>
  </div>
  <?php
  $i = 0;
  while ( have_rows( 'rows' ) ) :
    the_row();
    // Iterate through $i to distinguish odd and even rows
    $i++;
    $is_even_row = ! ( $i & 1 );
    ?>

    <div class="row">
      <div class="columns medium-6 large-6<?php echo $is_even_row ? ' medium-push-6 large-push-6' : null; ?>">
        <div class="block-img-container">
          <img src="<?php echo esc_url( get_sub_field('image')['sizes']['large'] ); ?>"
               alt="<?php echo esc_attr( get_sub_field('image')['alt'] ); ?>"
               class="block-img" />
        </div>
      </div>
      <div class="columns medium-6 large-6<?php echo $is_even_row ? ' medium-pull-6 large-pull-6' : null; ?>">
        <?php the_sub_field('content'); ?>
      </div>
    </div>

  <?php endwhile; ?>

</section>
