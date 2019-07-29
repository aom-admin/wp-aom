<?php
/**
 * Add notice for old browsers to the header.
 */
function snapsite_action_before() {

  $ie_notice = "<!--[if lt IE 7]>\r\n";
  $ie_notice .= '<p class="chromeframe">';
  $ie_notice .= sprintf(
    __( 'You are using an %1$soutdated%2$s browser. Please %3$supgrade your browser%4$s or %5$sactivate Google Chrome Frame%6$s to improve your experience.', 'lifted' ),
    '<strong>', '</strong>',
    '<a href="http://browsehappy.com/" target="_blank" rel="external">', '</a>',
    '<a href="http://www.google.com/chromeframe/?redirect=true" target="_blank" rel="external">', '</a>'
  );
  $ie_notice .= '</p>';
  $ie_notice .= "\r\n<![endif]-->\r\n";

  echo $ie_notice;
}
add_action( 'before', 'snapsite_action_before', 10, 0 );

/**
 * Add meta tags to the header.
 */
function snapsite_meta_head() {

  $meta_tags = "<meta charset='" . get_bloginfo( 'charset' ) . "'>\r\n";
  $meta_tags .= "<meta http-equiv='x-ua-compatible' content='ie=edge'>\r\n";
  $meta_tags .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>\r\n";
  $meta_tags .= "<link rel='profile' href='http://gmpg.org/xfn/11'>\r\n";

  echo $meta_tags;
}
add_action( 'wp_head', 'snapsite_meta_head', 1, 1 );

/**
 * Helper function to fetch the Google fonts array.
 *
 * @param     bool      $normalize Whether or not to return a normalized array. Default 'true'.
 * @return    array
 *
 * @access    public
 */
/*function snapsite_fetch_google_fonts( $normalize = false ) {

  $force_rebuild = true;
  if ( $force_rebuild || empty( $snapsite_google_fonts ) ) {
    $snapsite_google_fonts = array();
    // API url and key
    $snapsite_google_fonts_api_url = apply_filters( 'snapsite_google_fonts_api_url', 'https://www.googleapis.com/webfonts/v1/webfonts' );
    $snapsite_google_fonts_api_key = 'AIzaSyC2V7kuKUJOKvo3177goR6ML5njFDE9AVE';
    // API arguments
    $snapsite_google_fonts_fields = apply_filters( 'snapsite_google_fonts_fields', array( 'family', 'variants', 'subsets' ) );
    $snapsite_google_fonts_sort   = apply_filters( 'snapsite_google_fonts_sort', 'alpha' );
    // Initiate API request
    $snapsite_google_fonts_query_args = array(
      'key'    => $snapsite_google_fonts_api_key,
      'fields' => 'items(' . implode( ',', $snapsite_google_fonts_fields ) . ')',
      'sort'   => $snapsite_google_fonts_sort
    );
    // Build and make the request
    $snapsite_google_fonts_query = esc_url_raw( add_query_arg( $snapsite_google_fonts_query_args, $snapsite_google_fonts_api_url ) );
    $snapsite_google_fonts_response = wp_safe_remote_get( $snapsite_google_fonts_query, array( 'sslverify' => false, 'timeout' => 15 ) );
    // Continue if we got a valid response
    if ( 200 == wp_remote_retrieve_response_code( $snapsite_google_fonts_response ) ) {
      if ( $response_body = wp_remote_retrieve_body( $snapsite_google_fonts_response ) ) {
        // JSON decode the response body and cache the result
        $snapsite_google_fonts_data = json_decode( trim( $response_body ), true );
        if ( is_array( $snapsite_google_fonts_data ) && isset( $snapsite_google_fonts_data['items'] ) ) {
          $snapsite_google_fonts = $snapsite_google_fonts_data['items'];

          // Normalize the array key
          $snapsite_google_fonts_tmp = array();
          foreach ( $snapsite_google_fonts as $key => $value ) {
            $id = remove_accents( $value['family'] );
            $id = strtolower( $id );
            $id = preg_replace( '/[^a-z0-9_\-]/', '', $id );
            $snapsite_google_fonts_tmp[$id] = $value;
          }

          $snapsite_google_fonts = $snapsite_google_fonts_tmp;
          set_theme_mod( 'snapsite_google_fonts', $snapsite_google_fonts );
          set_transient( $snapsite_google_fonts_cache_key, $snapsite_google_fonts, WEEK_IN_SECONDS );
        }
      }
    }
  }
  return $normalize ? snapsite_normalize_google_fonts( $snapsite_google_fonts ) : $snapsite_google_fonts;
}*/


//List archives by year, then month
// Referenced in sidebar-blog.php
function wp_custom_archive($args = '') {
    global $wpdb, $wp_locale;

    $defaults = array(
        'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if ( '' != $limit ) {
        $limit = absint($limit);
        $limit = ' LIMIT '.$limit;
    }

    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;

    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';

    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';

    if ( !$archive_date_format_over_ride ) {
        $archive_day_date_format = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format = get_option('date_format');
    }

    //filters
    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters('customarchives_join', "", $r);

    $output = '<ul>';

        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        $key = md5($query);
        $cache = wp_cache_get( 'wp_custom_archive' , 'general');
        if ( !isset( $cache[ $key ] ) ) {
            $arcresults = $wpdb->get_results($query);
            $cache[ $key ] = $arcresults;
            wp_cache_set( 'wp_custom_archive', $cache, 'general' );
        } else {
            $arcresults = $cache[ $key ];
        }
        if ( $arcresults ) {
            $afterafter = $after;
            foreach ( (array) $arcresults as $arcresult ) {
                $url = get_month_link( $arcresult->year, $arcresult->month );
                $year_url = get_year_link($arcresult->year);
                /* translators: 1: month name, 2: 4-digit year */
                $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
                $year_text = sprintf('%d', $arcresult->year);
                if ( $show_post_count )
                    $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;
                $year_output = get_archives_link($year_url, $year_text, $format, '<span class="year">', '</span>');
                $output .= ( $arcresult->year != $temp_year ) ? $year_output : '';
                $output .= get_archives_link($url, $text, $format, $before, $after);

                $temp_year = $arcresult->year;
            }
        }

    $output .= '</ul>';

    if ( $echo )
        echo $output;
    else
        return $output;
}


//hide Content Editor for specific templates on backend
add_action( 'admin_head', 'hide_editor' );
function hide_editor() {
    $template_file = basename( get_page_template() );
    if($template_file == 'page-contact.php'){
        remove_post_type_support('page', 'editor');
    }
}