<?php if ( !empty( get_the_content() ) ) : ?>
<section class="page-content padded extra" role="region">
  <div class="row">
    <div class="small-12 medium-10 medium-offset-1 large-8 large-offset-2 column text-center">
      <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" role="article">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    </div><!--column-->
  </div><!--row-->
</section>
<?php endif; ?>