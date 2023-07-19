<?php
/**
 * Template Name: Content Blocks Template
 */
get_header();
?>

<?php
//variables set in functions-layout.php, pulls from Theme Options set by user
global $primary_color;
global $secondary_color;
?>


  <main id="main" role="main">
    <?php get_template_part( 'partials/content', 'page' ); ?>
  </main>


<?php get_footer(); ?>

