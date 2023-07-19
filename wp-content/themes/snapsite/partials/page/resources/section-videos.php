<section id="videos" role="region" role="region">

  <h2><?php _e( 'Video Library', 'lifted' ); ?></h2>
  <?php
  $args = array(
    'post_type'         => 'video',
    'posts_per_page'    => -1
  );
  $video_query = new WP_Query( $args );

  if ( $video_query->have_posts() ) : while ( $video_query->have_posts() ) : $video_query->the_post(); ?>

    <?php get_template_part( 'partials/page/resources/loop', 'video' ); ?>

  <?php endwhile; endif; wp_reset_postdata(); ?>

</section>
