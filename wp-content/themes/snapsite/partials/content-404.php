<article <?php post_class() ?> id="post-<?php the_ID(); ?>" role="article">
  <div class="entry-content">
    <div class="error">
      <p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'lifted' ); ?></p>
    </div>
    <p><?php _e( 'Please try the following:', 'lifted' ); ?></p>
    <ul>
      <li><?php _e( 'Check your spelling', 'lifted' ); ?></li>
      <li><?php printf( __( 'Return to the %1$shome page%2$s', 'lifted' ), '<a href="' . home_url() . '">', '</a>' ); ?></li>
      <li><?php printf( __( 'Click the %1$sback button%2$s', 'lifted' ), '<a href="javascript:history.back()">', '</a>' ); ?></li>
    </ul>
  </div>
</article>
