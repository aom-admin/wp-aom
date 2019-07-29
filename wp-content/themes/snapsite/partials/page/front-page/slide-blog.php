<div class="blog-slide" itemscope="itemscope" itemprop="blogPost" itemtype="http://schema.org/Blog">

  <div class="row expanded collapse">
    <?php
    $blog = get_sub_field('blog_link');
    if ( get_sub_field('image') ) {
      $image = get_sub_field('image');
    } else {
      $image = array(
        'url'   => get_the_post_thumbnail_url($blog->ID),
        'alt'   => 'LIFT Education',
      );
    }
    if ( get_sub_field('title') ) {
      $title = get_sub_field('title');
    } else {
      $title = get_the_title($blog->ID);
    }
    if ( get_sub_field('excerpt') ) {
      $excerpt = get_sub_field('excerpt');
    } else {
      $excerpt = get_the_excerpt($blog->ID);
    } ?>
    <div class="left-half columns medium-6"
         style="background-image: url('<?php echo esc_url( $image['url'] ); ?>');"
         role="img"
         aria-label="<?php esc_attr_e( $image['alt'], 'lifted' ); ?>"
         data-equalizer-watch
         itemprop="image">
    </div><!--left-half-->

    <div class="right-half columns medium-6" data-equalizer-watch>
      <div class="constrained-content">
        <h3 class="text-white"><?php echo esc_html($title); ?></h3>
        <p class="text-white" itemprop="reviewBody"><?php echo esc_html($excerpt); ?></p>
        <a class="button" role="button" href="<?php echo esc_url( get_permalink($blog->ID) ); ?>"><?php printf( __( 'Read More%s about this blog.%s', 'lifted' ), '<span class="screen-reader-text">', '</span>' ); ?></a>
      </div>
    </div><!--right-half-->

  </div><!-- .row -->

</div><!--testimonial-->
