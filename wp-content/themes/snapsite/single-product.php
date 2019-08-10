<?php get_header();
echo '<style type="text/css">
  .blog-single-header {
    display: none;
  }
  .single-post .addthis-container .addthis-title {
    color: ' . $primary_color . ';
  }
  .single-post .addthis-container .addthis_inline_share_toolbox a svg {
    fill: ' . $primary_color . ' !important;
  }
</style>'; ?>
<section class="page-content product-item-pages" role="region">
  <div class="row">
    <div class="small-12 medium-6 large-4 column main-section-left">
      <main id="main" role="main">
        <?php
        $post_format = get_post_format() ? get_post_format() : 'post';
        ?>
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="row">
          <div class="column">
            <?php the_post_thumbnail( '', array( 'class' => 'entry-thumb' ) ); ?>
          </div>
        </div>
        <?php endif; ?>
          
      </main>
    </div><!-- .cell -->
    <div class="small-12 medium-6 large-8 column sidebar-right">
      <aside class="sidebar" role="complementary">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php the_content(); ?>        
      </aside>
    </div><!-- .column -->
  </div><!-- .row -->
</section>

<div class="columns medium-10 large-8 medium-centered">
</div>

<section class="newsletter-subscribe padded">
  <div class="row">
    <div class="columns medium-10 large-8 medium-centered">
      <h2>Get Setup With This Product</h2>
      <?php echo do_shortcode( '[contact-form-7 id="419" title="Contact form 1"]' ); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>