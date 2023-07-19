<div class="testimonial<?php echo get_sub_field('alt_layout') === true ? ' alt' : ''; ?>" itemscope="itemscope" itemtype="http://schema.org/Review"<?php echo get_sub_field('alt_layout') === true ? ' data-equalizer-watch' : ''; ?>>

  <?php if ( get_sub_field('alt_layout') === true ) : ?>

    <div class="row">
      <div class="columns large-11 medium-centered">
        <?php $image = get_sub_field("image"); ?>
        <div class="headshot">
          <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php esc_attr_e( $image['alt'], 'lifted' ); ?>" />
        </div>
        <div class="content">
          <p class="text-white" itemprop="reviewBody"><?php
            // Construct testimonial content
            $testimonial  = '&#8220;';
            // Trim trailing white space
            $testimonial .= rtrim( esc_html__( get_sub_field('testimonial'), 'lifted' ), ' ' );
            $testimonial .= '&#8221;';
            echo $testimonial;
          ?></p>
          <p class="name" itemprop="name" rel="author"><?php echo esc_html( get_sub_field('name') ); ?></p>
          <p class="position text-white" itemprop="sourceOrganization"><?php echo esc_html( get_sub_field('description') ); ?></p>
        </div>
      </div>
    </div>

  <?php else : ?>

    <div class="row expanded collapse">
      <?php $image = get_sub_field("image"); ?>
      <div class="left-half columns medium-6"
           style="background-image: url('<?php echo esc_url( $image['url'] ); ?>');"
           role="img"
           aria-label="<?php esc_attr_e( $image['alt'], 'lifted' ); ?>"
           data-equalizer-watch
           itemprop="image">
      </div><!--left-half-->

      <div class="right-half columns medium-6" data-equalizer-watch>
        <div class="constrained-content">
          <p class="text-white" itemprop="reviewBody"><?php
            // Construct testimonial content
            $testimonial  = '&#8220;';
            // Trim trailing white space
            $testimonial .= rtrim( esc_html__( get_sub_field('testimonial'), 'lifted' ), ' ' );
            $testimonial .= '&#8221;';
            echo $testimonial;
          ?></p>
          <p class="name" itemprop="name" rel="author"><?php echo esc_html( get_sub_field('name') ); ?></p>
          <p class="position text-white" itemprop="sourceOrganization"><?php echo esc_html( get_sub_field('description') ); ?></p>
        </div>
      </div><!--right-half-->

    </div><!-- .row -->

  <?php endif; ?>

</div><!--testimonial-->
