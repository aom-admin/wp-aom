<?php

$primary_color = get_field('primary_color','option');
$secondary_color = get_field('secondary_color','option');
/**
 * Retrieve header logo.
 */
function snapsite_header_logo( $frontpage_tag = 'h1', $frontpage_link = false, array $srcset = null ) {

  $logo_image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' );
  $open_tag = '<' . $frontpage_tag . ' class="site-id" itemscope itemtype="http://schema.org/Organization">';
  $close_tag = '</' . $frontpage_tag . '>';
  $srcset_value = '';
  if ( $srcset ) {
    $count = count( $srcset );
    $i = 1;
    foreach ( $srcset as $key => $value ) {
      $srcset_value .= $value . ' ' . $key;
      if ( $i < $count ) {
        $srcset_value .= ', ';
      }
      $i++;
    }
    $srcset_value = ' srcset="' . $srcset_value . '"';
  }
  $site_logo = '<img id="site-logo"
                     class="site-logo"
                     src="' . esc_url( $logo_image[0] ) . '"' . $srcset_value . '
                     itemprop="logo"
                     alt="" />';
  if ( ! is_front_page() || $frontpage_link == true ) {
    $open_link = '<a href="' . esc_url( home_url() ) . '" rel="home" itemprop="url">';
    $close_link = '</a>';
  }
  if ( ! is_front_page() && $frontpage_tag != 'div' ) {
    $open_tag = str_replace( $frontpage_tag, 'div', $open_tag );
    $close_tag = str_replace( $frontpage_tag, 'div', $close_tag );
  }
  echo $open_tag . $open_link . $site_logo;
  echo '<span class="screen-reader-text">';
  esc_attr( bloginfo( 'name' ) );
  echo '</span>';
  echo $close_link . $close_tag;
}

/**
 * Customize the_archive_title
 */
add_filter( 'get_the_archive_title', function ( $title ) {

  if ( is_home() || is_single() ) {
    $title = _x( 'News', 'Archive of all news posts', 'snapsite' );
  }
  return $title;

} );

/**
 * Add classes to adjacent post links
 */
add_filter( 'next_posts_link_attributes', 'snapsite_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'snapsite_posts_link_attributes' );

function snapsite_posts_link_attributes() {

  if ( doing_filter('next_posts_link_attributes') ) {
    $suffix = 'next';
  } else {
    $suffix = 'prev';
  }
  return 'class="post-nav-link ' . $suffix . '"';
}

/**
 * Modify permalink if blog entry links externally
 */
function snapsite_blog_link( $id = 0 ) {

  $external_link = get_field( 'external_link', $id );
  if ( $external_link ) {
    $link = get_field( 'link', $id );
  } else {
    $link = get_the_permalink( $id );
  }

  return $link;
}

function snapsite_blog_atts( $id = 0 ) {

  $external_link = get_field( 'external_link', $id );
  $link_atts = ' class="entry-more"';
  if ( $external_link ) {
    $link_atts .= ' target="_blank"';
  }

  return $link_atts;
}

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string Modified "read more" excerpt string.
 */
function snapsite_excerpt_more( $more ) {

  $link  = ' <a href="' . esc_url( snapsite_blog_link() ) . '"' . snapsite_blog_atts() . '>';
  $link .= '… ';
  $link .= '<span class="entry-more-text">' . __( 'Read More', 'snapsite' ) . '</span>';
  $link .= '</a>';

  return $link;
}
add_filter( 'excerpt_more', 'snapsite_excerpt_more' );

/**
 * Retrieve list of districts with a shortcode.
 */
function snapsite_show_districts( $atts ) {

  $args = array(
    'post_type'         => 'member',
    'posts_per_page'    => -1,
    'order'             => 'ASC'
  );
  $loop = new WP_Query($args);
  if ( $loop->have_posts() ) {
    $output = '<div class="row medium-up-2">';
    while ( $loop->have_posts() ) {
      $loop->the_post();
      $output .= '<hgroup class="column">';
      $output .= '<h4>' . get_the_title() . '</h4>';
      $output .= '<h5>' . _x(
        get_field('number_of_schools') . ' schools',
        'This district has '. get_field('number_of_schools') . ' schools.',
        'snapsite'
      ) . '</h5>';
      $output .= '</hgroup>';
    }
    $output .= '</div>';
  }
  wp_reset_postdata();

  return $output;
}

add_shortcode( 'show_districts', 'snapsite_show_districts' );

/**
 * Construct attributes for the subpage header section element.
 */
function snapsite_page_header_atts() {

  /**
   * Get the template slug and store it in a variable.
   * Good for use if you want to create unique elements on specific pages
   * templates without creating new files.
   */
  $template_dir    = 'page-templates/';
  $template_prefix = 'page-';
  $search          = array( $template_dir, $template_prefix, '.php' );
  $page_name = str_replace( $search, '', get_page_template_slug() );

  /**
   * Switch statements set up in case you want to customize the $page_name
   * variable using something other than the slug.
   */
  /*switch ( get_page_template_slug() ) :
    case $template_dir . $template_prefix . 'about.php' :
      $page_name = 'about-page';
      break;
    case $template_dir . $template_prefix . 'team.php' :
      $page_name = 'our-team';
      break;
    default :
      $page_name = $page_name;
      break;
  endswitch;*/

  // Set up background image
  if ( get_field('background_image') ) :
    $background = get_field('background_image');

  elseif ( get_the_post_thumbnail() ) :
    $background = array(
      'url'   => get_the_post_thumbnail_url(),
      'alt'   => get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true ),
    );

  else :
    $background = array(
      'url'   => get_template_directory_uri() . '/assets/img/header_page.jpg',
      'alt'   => sprintf( __( '%s Page Background', 'snapsite' ), get_bloginfo('name') ),
    );

  endif;

  $section_style = ' style="';

  $section_style .= $background && empty( have_rows('background_video') ) ? 'background-image: url(\'' . esc_url( $background['url'] ) . '\');' : null;
  if ( get_field('background_color') ) {
    $section_style .= 'background-color: ' . esc_attr( get_field('background_color') ) . ';';
  }
  $section_style .= '"';

  // Set up Aria attributes
  $section_aria = ' role="region"';
  $section_aria .= ' aria-labelledby="page-title"';
  /*if ( $background ) {
    $section_aria = ' role="img"';
    $section_aria .= ' aria-label="' . esc_attr__( $background['alt'], 'snapsite' ) . '"';
  } else {
    $section_aria = ' role="region"';
    $section_aria .= ' aria-labelledby="page-title"';
  }*/

  // Create section classes
  $section_class  = 'page-header text-center ';
  $section_class .= $page_name;
  $section_class .= get_field('dark_background') ? ' dark' : '';
  $section_class = 'class="' . $section_class . '"';

  // Print section attributes
  echo $section_class . $section_style . $section_aria;
}
