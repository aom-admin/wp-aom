<?php get_header(); ?>
<?php
//variables set in functions-layout.php, pulls from Theme Options set by user
global $primary_color;
global $secondary_color;
?>


  <section class="page-content padded extra blog-archive" role="region">
    <div class="row">
      <div class="small-12 medium-8 large-8 column main-section-left">
        <main id="main" role="main">
           <?php
            if ( have_posts() ) :
              $p = 0;
              while ( have_posts() ) :
                $p++;
                  the_post();
                  if($p == 1) :
                    get_template_part( 'partials/content', 'excerpt-large' );
                  else :
                    get_template_part( 'partials/content', 'excerpt' );
                  endif;

              endwhile;

              the_posts_pagination( array(
                  'mid_size'           => 1,
                  'prev_text'          => _x( 'Previous', 'previous set of posts', 'basetheme' ),
                  'next_text'          => _x( 'Next', 'next set of posts', 'basetheme' ),
                  'screen_reader_text' => __( 'Posts navigation', 'basetheme' ),
              ) );
          else :
              get_template_part( 'partials/content', 'none' );
          endif;
            ?>

      </main>
    </div><!-- .cell -->
    <div class="small-12 medium-4 large-4 column">
      <aside class="sidebar" role="complementary">
        <?php get_sidebar('blog'); ?>
      </aside>
    </div><!-- .column -->
  </div><!-- .row -->
</section>


<?php get_footer(); ?>
