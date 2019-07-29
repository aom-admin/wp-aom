<?php
$num_posts = (int) esc_attr( get_sub_field('number_of_posts') );
$args = array(
  'posts_per_page'  => $num_posts,
);
$blog = new WP_Query($args);
if ( $blog->have_posts() ) :
?>

  <section class="recent-posts padded">
    <?php
    if ( get_sub_field('section_heading') ) {
      echo '<div class="row column">';
      echo '<h2 class="text-center">'. esc_html__( get_sub_field('section_heading'), 'snapsite' ) .'</h2>';
      echo '</div>';
    }
    ?>
    <div class="red-line" style="width: 15%; margin-bottom: 30px;"></div>
    <?php
    // Set up column sizes
    switch ($num_posts) :
      case 1:
        $cols = 'column';
        break;
      case 2:
        $cols = 'medium-up-2';
        break;
      case 3:
        $cols = 'medium-up-3';
        break;
      case 4:
        $cols = 'medium-up-2 large-up-4';
        break;
      case 5:
        $cols = 'medium-up-3';
        break;
      default:
        $cols = 'medium-up-3 large-up-4';
        break;
    endswitch;
    ?>
    <div class="posts container">
      <div class="row <?php echo $cols; ?>" data-equalizer data-equalize-on="medium">

        <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

          <div class="column">
            <article id=post-<?php the_ID(); ?> <?php post_class(); ?> data-equalizer-watch>
              <a href="<?php the_permalink(); ?>">
                <div class="post-thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                  <!-- <?php echo get_the_post_thumbnail() ? get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'entry-thumb' ) ) : '<img src="#" alt="#" class="entry-thumb placeholder" />'; ?> -->
                <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
              </a>
            </article>
          </div>

        <?php endwhile; ?>

      </div><!-- .row -->
    </div><!-- .posts.container -->

  </section>

<?php endif; wp_reset_postdata(); ?>
