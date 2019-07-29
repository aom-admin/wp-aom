<article <?php post_class('video-post'); ?> id="post-<?php the_ID(); ?>" role="article">

  <div class="responsive-embed widescreen">

    <?php if ( get_field('video_source') == 'youtube' ) : ?>

      <iframe width="420"
              height="315"
              src="https://www.youtube.com/embed/<?php echo esc_attr( get_field('youtube_id') ); ?>"
              frameborder="0"
              allowfullscreen></iframe>

    <?php elseif ( get_field('video_source') == 'vimeo' ) : ?>

      <iframe src="https://player.vimeo.com/video/<?php echo esc_attr( get_field('vimeo_id') ); ?>"
              width="640"
              height="360"
              frameborder="0"
              webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

    <?php endif; ?>

  </div>
  <?php the_title( '<h3>', '</h3>' ); ?>

</article>
