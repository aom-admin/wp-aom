<?php
$featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full');
$content = get_the_content();
$cleanContent = strip_tags($content);
$excerpt = implode(' ', array_slice(explode(' ', $cleanContent), 0, 25));
?>
<div class="row single-post-excerpt large">
  <div class="small-12 column">
    <?php if(!empty($featuredImage)) : ?>
      <div class="featured-image-container" style="background-image: url('<?php echo $featuredImage; ?>');"></div>
    <?php endif; ?>
    <h4 class="date"><?php the_date('M j, Y'); ?></h4>
    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
    <p class="excerpt"><?php echo $excerpt; ?>...</p>
  </div><!-- .column -->
</div><!-- row -->