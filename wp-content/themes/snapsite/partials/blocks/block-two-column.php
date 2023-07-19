<section class="one-column new-padded" role="region">
  <?php
  if ( get_sub_field('section_heading') ) {
    echo '<div class="row column">';
    echo '<h2 class="text-center">'. esc_html__( get_sub_field('section_heading'), 'snapsite' ) .'</h2>';
    echo '</div>';
  }
  ?>
  <div class="row">
    <div class="columns medium-6">
      <div class="entry-content">
        <?php the_sub_field('content_left_column'); ?>
      </div><!-- .entry-content -->
    </div><!-- .columns -->
    <div class="columns medium-6">
      <div class="entry-content">
        <?php the_sub_field('content_right_column'); ?>
      </div><!-- .entry-content -->
    </div><!-- .columns -->
  </div><!-- .row -->
</section>
