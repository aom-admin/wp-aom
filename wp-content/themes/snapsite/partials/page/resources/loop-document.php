<div <?php post_class('case-study-post'); ?> id="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/DigitalDocument">

  <div class="row">
    <div class="small-4 columns">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paper_small.svg"
           alt="<?php printf( __( '%s Documents', 'lifted' ), 'LIFT Education' ); ?>" />
    </div><!-- .columns -->
    <div class="small-8 columns">
      <a href="<?php echo esc_url( get_field('file')['url'] ); ?>" target="_blank" itemprop="url"><?php the_title( '<h3 itemprop="name">', '</h3>' ); ?></a>
    </div><!-- .columns -->
  </div><!-- .row -->

</div>
