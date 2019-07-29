<section class="page-header"
  <?php if ( get_field('background_image') ) : ?>
    <?php $backgroundImage = get_field('background_image'); ?>
    style="background-image: url('<?php echo $backgroundImage["url"]; ?>');"
  <?php endif; ?>
  >

  <?php if ( have_rows('background_video') ) : ?>

    <video poster="<?php echo get_field('background_image') ? esc_url( get_field('background_image')['url'] ) : get_the_post_thumbnail_url(); ?>" id="bgvid" playsinline autoplay muted loop>

      <?php
      while ( have_rows('background_video') ) :
        the_row();
        $video = esc_url( get_sub_field('video_file') );
        if ( $video ) : ?>

          <source src="<?php echo $video; ?>"
                  type="video/<?php echo pathinfo ( parse_url( $video, PHP_URL_PATH ), PATHINFO_EXTENSION ); // Returns file extension of the video ?>">

        <?php
        endif;
      endwhile;
      ?>

    </video>

  <?php endif; ?>
  <div class="overlay"></div>
  <div class="header-container">
    <div class="row">
      <div class="medium-10 large-9 medium-centered columns">

        <?php get_template_part( 'partials/header/header', 'content' ); ?>

      </div>
    </div>
  </div><!--header-container-->
</section>
