<?php get_header();
echo '<style type="text/css">
  .single-post .addthis-container .addthis-title {
    color: ' . $primary_color . ';
  }
  .single-post .addthis-container .addthis_inline_share_toolbox a svg {
    fill: ' . $primary_color . ' !important;
  }
</style>'; ?>

  <section class="page-content blog-archive" role="region">
    <div class="row">
      <div class="small-12 medium-8 large-8 column main-section-left">
        <main id="main" role="main">
          <?php
          $post_format = get_post_format() ? get_post_format() : 'post';
          get_template_part( 'partials/content', $post_format );
          ?>

      </main>
    </div><!-- .cell -->
    <div class="small-12 medium-4 large-4 column sidebar-right">
      <aside class="sidebar" role="complementary">
        <?php get_sidebar('blog'); ?>
      </aside>
    </div><!-- .column -->
  </div><!-- .row -->
</section>

<?php get_footer(); ?>