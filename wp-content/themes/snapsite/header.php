<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
if( get_field('primary_color','option') ):
	$GLOBALS['primarycolor'] = get_field('primary_color','option');
else:
	$GLOBALS['primarycolor'] = 'inherit';
endif;
if( get_field('secondary_color','option') ):
	$GLOBALS['secondarycolor'] = get_field('secondary_color','option');
else:
	$GLOBALS['secondarycolor'] = 'inherit';
endif;
?>
<script src="https://use.typekit.net/tde4fxj.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php wp_head(); // Please do not load stylesheets here. Use inc/functions-scripts.php ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>

<div class="off-canvas-wrapper">

  <a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'snapsite' ); ?></a>

  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

    <?php get_template_part( 'partials/header/nav', 'main-small' ); ?>

    <div class="off-canvas-content" data-off-canvas-content>

      <?php get_template_part( 'partials/header/masthead' ); ?>

      <div id="site-content">
        <?php
        if( is_home() || is_archive() ) :
          get_template_part( 'partials/header/header', 'blog' );
        elseif( is_single() ) :
          get_template_part( 'partials/header/header', 'blog-single' );
        else :
          get_template_part( 'partials/header/header', 'page' );
        endif; ?>
