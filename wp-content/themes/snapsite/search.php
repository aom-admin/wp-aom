<?php get_header(); ?>

<section class="main-content" role="region">

  <div class="row">

    <div class="medium-7 large-8 columns">

      <main id="main" role="main">

        <h2><?php printf( esc_html__( 'Search Results for "%s"', 'lifted' ), get_search_query() ); ?></h2>

        <?php if ( have_posts() ) :

          while ( have_posts() ) : the_post();

            get_template_part( 'content', get_post_format() );

          endwhile;

        else :

          get_template_part( 'content', 'none' );

        endif; ?>

      </main>

      <?php get_template_part( 'partials/nav', 'posts' ); ?>

    </div><!-- .columns -->

    <div class="medium-5 large-4 columns">

      <aside class="resources-sidebar sidebar" role="complimentary">

        <?php get_sidebar(); ?>

      </aside>

    </div><!-- .columns -->

  </div><!--end of row-->

</section>

<?php get_footer(); ?>
