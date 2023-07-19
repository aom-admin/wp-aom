<?php
// Set up title
$title_atts = ' id="page-title" class="page-title"';
$before_title = '<h1' . $title_atts . 'style="color: ' . '#fff' . ';">';
$after_title = '</h1>';
$title = get_the_archive_title();

if ( is_category() || is_tag() ) :

  // Do nothing
elseif ( is_home() || is_archive() ) :
  $title = get_field('blog_header_title','option');

elseif ( is_single() ) :

  $before_title = '<h2' . $title_atts . '>';
  $after_title = '</h2>';

elseif ( is_404() ) :

  $title = __( 'Page Not Found', 'snapsite' );

elseif ( get_field('alt_page_title') ) :

  $title = esc_html__( get_field('alt_page_title'), 'snapsite' );

else :

  $title = get_the_title();

endif;

// Override title if custom field is filled out
if ( get_field('page_heading') ) {
  $title = esc_html( get_field('page_heading') );
}

$title = $before_title . $title . $after_title;
// $title = '<div class="row"><div class="columns medium-8 large-6">' . $title . '</div>';

if ( get_field('pre_heading') ) {
  $title = '<div class="pre-heading">' . esc_html( get_field('pre_heading') ) . '</div>' . $title;
}

// Get subtitle
if ( get_field('page_heading_content') ) {
  $title .= get_field('page_heading_content');
}

// Print to page
echo $title;

// Create video play button
if ( get_field('video_player') && get_field('video_id') ) {
  $play_button = '<svg width="100" height="100"><image xlink:href="' . get_template_directory_uri() . '/assets/img/button_play.svg" src="' . get_template_directory_uri() . '/assets/img/button_play.png" width="100" height="100" /></svg>';
  /**
   * Vimeo IDs are always numeric, YouTube IDs are not.
   * Check to see if ID is numeric to determine its source.
   */
  if ( is_numeric( get_field('video_id') ) ) {
    $link = '//vimeo.com/' . esc_attr( get_field('video_id') );
  } else {
    $link = '//www.youtube.com/watch?v=' . esc_attr( get_field('video_id') );
  }
  $play_button = '<a href="' . $link . '" data-lity>' . $play_button . '</a>';

  // Print to page
  echo $play_button;
}
