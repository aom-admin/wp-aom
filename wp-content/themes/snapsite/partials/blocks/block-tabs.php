<section class="tabs-section padded">
  <?php
  if ( get_sub_field('section_heading') ) {
    echo '<div class="row column">';
    echo '<h2 class="text-center">'. esc_html__( get_sub_field('section_heading'), 'snapsite' ) .'</h2>';
    echo '</div>';
  }
  ?>
  <div class="container">
    <div class="row collapse expanded">

      <div class="medium-4 large-5 columns">
        <ul class="vertical tabs" data-tabs id="example-tabs">

          <?php
          $i = 0;
          while ( have_rows('tabs') ) :
            the_row();
            $i++;
            ?>

            <li class="tabs-title<?php if ( $i == 1 ) echo ' is-active'; ?>"><a href="#panel<?php echo $i; ?>"<?php if ( $i == 1 ) echo ' aria-selected="true"'; ?>><span style="color: <?php echo $GLOBALS['primarycolor']; ?>;"><?php esc_html_e( get_sub_field('tab_label'), 'snapsite' ); ?></span></a></li>

          <?php endwhile; ?>

        </ul>
      </div><!-- .columns -->

      <div class="medium-8 large-7 columns">
        <div class="tabs-content" data-tabs-content="example-tabs">

          <?php
          $i = 0;
          while ( have_rows('tabs') ) :
            the_row();
            $i++;
            ?>

            <div class="tabs-panel<?php if ( $i == 1 ) echo ' is-active'; ?>" id="panel<?php echo $i; ?>">
              <?php the_sub_field('tab_content'); ?>
            </div>

          <?php endwhile; ?>

        </div><!-- .tabs-content -->
      </div><!-- .columns -->

    </div><!-- .row -->
  </div><!-- .container -->
</section>
