<?php
// Set up structure for Resources page content
if ( is_page_template( $template = 'page-templates/page-resources.php' ) ) {
  $title_container_open = '<div class="row"><div class="columns medium-8 large-6">';
  $title_container_close = '</div>';
  $img_container_open = '<div class="columns medium-4 large-6">';
  $img_container_close = '</div></div>';
  $header_img = get_the_post_thumbnail();
  $header_img = $img_container_open . $header_img . $img_container_close;
}

// Set up title
$title_class = 'page-title';
$title_class = ' class="' . $title_class . '"';
$title_id = 'page-title';
$title_id = ' id="' . $title_id . '"';
$title_atts = $title_id . $title_class;
$before_title = '<h1' . $title_atts . '>';
$after_title = '</h1>';
$title = get_the_archive_title();

if ( is_archive() || is_home() || is_category() || is_tag() || is_taxonomy() ) :

  // Do nothing

elseif ( is_single() ) :

  $before_title = '<h2' . $title_atts . '>';
  $after_title = '</h2>';

elseif ( is_404() ) :

  $title = __( 'Page Not Found', 'lifted' );

elseif ( get_field('alt_page_title') ) :

  $title = esc_html__( get_field('alt_page_title'), 'lifted' );

else :

  $title = get_the_title();

endif;

$title = $before_title . $title . $after_title;
$title = $title_container_open . $title . $title_container_close;

echo $title; echo $header_img;
