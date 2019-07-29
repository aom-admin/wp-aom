<?php while ( have_posts() ) : the_post(); ?>

  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" role="article">


    <div class="entry-content">
      <?php the_title( '<h1 class="entry-title" id="main-content-title">', '</h1>' ); ?>
      <?php if ( has_post_thumbnail() ) : ?>

        <div class="row">
          <div class="column">
            <?php the_post_thumbnail( '', array( 'class' => 'entry-thumb' ) ); ?>
          </div>
        </div>

      <?php endif; ?>

      <?php the_content(); ?>

    </div>
    <div class="tags-container">
      <p> <?php the_tags( '', ', ', '<br />' ); ?></p>
    </div>
    </footer>
    <div class="addthis-container">
      <h4 class="addthis-title">Feel free to share!</h4>
      <div class="addthis_inline_share_toolbox"></div>
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b7320f353353d66"></script>
    </div><!-- addthis-container -->

  </article>

<?php endwhile;?>
