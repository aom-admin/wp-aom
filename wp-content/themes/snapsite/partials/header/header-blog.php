<section class="page-header blog"
  <?php if ( get_field('blog_background_image','option') ) :
     $backgroundImage = get_field('blog_background_image','option');
   else :
     $backgroundImage = get_stylesheet_directory_uri() . '/assets/img/blog-header.jpg';
   endif; ?>
    style="background-image: url('<?php echo $backgroundImage; ?>');">


  <div class="overlay"></div>
  <div class="header-container">
    <div class="row">
      <div class="medium-12 large-12 medium-centered columns">

        <?php get_template_part( 'partials/header/header', 'content' ); ?>

      </div>
    </div>
  </div><!--header-container-->
</section>
