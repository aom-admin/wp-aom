<?php get_header(); ?>
<?php
//variables set in functions-layout.php, pulls from Theme Options set by user
global $primary_color;
global $secondary_color;
?>
<?php if ( get_sidebar() && get_field('show_sidebar') ) : ?>

  <div class="grid-container">
    <div class="grid-x">
      <div class="medium-7 large-8 cell">
        <main id="main" role="main">
          <?php get_template_part( 'partials/content', 'page' ); ?>
      </main>
    </div><!-- .cell -->
    <div class="medium-5 large-4 cell">
      <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
      </aside>
    </div><!-- .cell -->
  </div><!-- .grid-x -->
</div><!-- .grid-container-->

<?php else : ?>

  <main id="main" role="main">
    <?php get_template_part( 'partials/content', 'page' ); ?>
  </main>

<?php endif; ?>

<?php get_footer(); ?>
