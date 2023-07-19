<?php
/**
 * Template Name: About Template
 */
get_header();
?>




<?php
$events_placement = get_field('events_placement');
?>
  <main id="main" role="main">
    <?php if($events_placement == 'bottom') : ?>
      <div class="events-bottom">
        <?php include(locate_template('partials/section-page-content.php')); ?>

            <div class="row">
              <div class="small-12 column text-center title-container our-team">
                <h3></h3>
              </div><!--cell-->
            </div><!--grid-x-->

          <?php
          $args = array(
            'post_type' => 'team',
            'posts_per_page' => -1
          );
          // The Query
          $query = new WP_Query( $args );

          // The Loop
          if ( $query->have_posts() ) : ?>
            <div class="row small-up-1 medium-up-3 large-up-4 events-blocks team-section">
            <?php while ( $query->have_posts() ) :
              $query->the_post(); ?>
              <?php
              $teamImage = get_the_post_thumbnail_url(); ?>
              <div class="column column-block">
                <div class="image-container">
                  <img src="<?php echo $teamImage; ?>">
                  <div class="overlay"></div>
                  <?php
                  $bio = get_field('bio');
                  if( !empty($bio) ) : ?>
                    <p class="bio"><?php echo esc_html( $bio ); ?></p>
                  <?php endif; ?>
                </div><!-- .image-container -->
                <h5 class="name"><?php the_title(); ?></h5>
              </div>
            <?php endwhile; ?>
            </div><!-- .row -->
            <?php wp_reset_postdata();
          else :
            // no posts found
          endif; ?>
          <?php if( have_rows('events') ): ?>
            <div class="row">
              <div class="small-12 column text-center title-container events-title-container">
                <h3>Upcoming Events</h3>
              </div><!--cell-->
            </div><!--grid-x-->
            <div class="events-bottom-container">
          <?php while ( have_rows('events') ) : the_row(); ?>
            <div class="single-event" style="border-bottom: 2px solid #b2b2b2;">
              <div class="row">
                <div class="small-12 column text-center title-container">
                  <?php
                  $event_date = get_sub_field('event_date');
                  $date = new DateTime($event_date);
                  if( !empty($event_date) ) : ?>
                    <h4 style="color: #fff;"><?php echo $date->format('M j'); ?></h4>
                  <?php endif; ?>
                  <?php
                  $title = get_sub_field('title');
                  if( !empty($title) ) : ?>
                    <h5><?php echo esc_html( $title ); ?></h5>
                  <?php endif; ?>
                  <?php
                  $description = get_sub_field('description');
                  if( !empty($description) ) : ?>
                    <p class="description"><?php echo esc_html( $description ); ?></p>
                  <?php endif; ?>
                  <?php
                  $link = get_sub_field('link');
                  if( !empty($link) ) : ?>
                    <p class="description"><a href="<?php echo esc_html( $link ); ?>" target="_blank">Learn More</a></p>
                  <?php endif; ?>
                   <?php if( !empty($link) || !empty($description)) : ?>
                     <div class="arrow-container">
                      <i class="fa fa-angle-down" aria-hidden="true" style="color: <?php echo $primary_color; ?>"></i>
                    </div><!-- arrow-container -->
                  <?php endif; ?>

                </div><!--cell-->
              </div><!--row-->
           </div><!-- single-event -->
          <?php endwhile; ?>
          </div><!--events-bottom-container-->
         <?php else :
            // no rows found
         endif; ?>
      </div><!--events-bottom-->
    <?php else: ?>
      <div class="events-side">
        <section class="page-content padded extra" role="region">
          <div class="row">
            <div class="small-12 medium-8 large-8 column text-center main-section-left">
              <article <?php post_class(); ?> id="post-<?php the_ID(); ?>" role="article">
                <div class="entry-content">
                  <?php the_content(); ?>
                </div>
              </article>
              <h2 class="our-team-title">Our Team</h2>
              <?php
              $args = array(
                'post_type' => 'team',
                'posts_per_page' => -1
              );
              // The Query
              $query = new WP_Query( $args );

              // The Loop
              if ( $query->have_posts() ) : ?>
                <div class="row small-up-1 medium-up-2 large-up-2 events-blocks team-section">
                <?php while ( $query->have_posts() ) :
                  $query->the_post(); ?>
                  <?php
                  $teamImage = get_the_post_thumbnail_url(); ?>
                  <div class="column column-block">
                    <div class="image-container">
                      <img src="<?php echo $teamImage; ?>">
                      <div class="overlay"></div>
                      <?php
                      $bio = get_field('bio');
                      if( !empty($bio) ) : ?>
                        <p class="bio"><?php echo esc_html( $bio ); ?></p>
                      <?php endif; ?>
                    </div><!-- .image-container -->
                    <h5 class="name"><?php the_title(); ?></h5>
                  </div>
                <?php endwhile; ?>
                </div><!-- .row -->
                <?php wp_reset_postdata();
              else :
                // no posts found
              endif; ?>
            </div><!--column-->
            <div class="small-12 medium-4 column event-sidebar">
              <?php if( have_rows('events') ): ?>
                <h2>Upcoming Events</h2>
              <?php while ( have_rows('events') ) : the_row(); ?>
                <div class="single-event">
                  <div class="row">
                    <div class="small-12 column event-container">
                      <?php
                      $event_date = get_sub_field('event_date');
                      $date = new DateTime($event_date);
                      if( !empty($event_date) ) : ?>
                        <div class="date-container">
                          <h4 class="month"><?php echo $date->format('M'); ?></h4>
                          <h4 class="day" style="color: <?php echo $primary_color; ?>"><?php echo $date->format('j'); ?></h4>
                        </div><!-- date-container -->
                      <?php endif; ?>
                      <div class="text-container">
                      <?php
                      $title = get_sub_field('title');
                      $link = get_sub_field('link');
                      if( !empty($link) ) : ?>
                        <a href="<?php echo esc_html( $link ); ?>" target="_blank"><h5><?php echo esc_html( $title ); ?></h5></a>
                        <?php else : ?>
                          <h5><?php echo esc_html( $title ); ?></h5>
                      <?php endif; ?>
                    </div><!--text-container-->
                    </div><!--cell-->
                  </div><!--row-->
               </div><!-- single-event -->
              <?php endwhile; ?>
             <?php else :
                // no rows found
             endif; ?>
             <?php if(get_field('newsletter_subscribe')) : ?>
               <section class="newsletter-subscribe padded">
                <div class="row">
                  <div class="columns small-12">
                    <h2>Subscribe to our newsletter</h2>
                    <?php echo do_shortcode( '[contact-form-7 id="268" title="Newsletter Subscribe"]' ); ?>
                    <div class="button-container">
                      <a class="button" style="background-color: <?php echo $GLOBALS['primarycolor']; ?>; border-bottom-color: <?php echo $GLOBALS['secondarycolor']; ?>;">Subscribe</a>
                    </div><!--button-container-->
                  </div>
                </div>
              </section>
              <script type="text/javascript">
              jQuery(document).ready(function($) {
                $('.newsletter-subscribe .button').click(function() {
                  event.preventDefault();
                  $( '.newsletter-subscribe .wpcf7-form-control.wpcf7-submit' ).trigger( 'click' );
                });
              });
              </script>
            <?php endif; ?>

            </div><!--column-->
          </div><!--row-->
        </section>
      </div><!-- events-side -->
    <?php endif; ?>
  </main>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.single-event').click(function(event){
      console.log('click');
      $(this).toggleClass('active');
    });

  });
</script>
<?php get_footer(); ?>