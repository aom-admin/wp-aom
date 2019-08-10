<?php
// Team Post Type
add_action( 'init', 'snapsite_post_type_team' );

function snapsite_post_type_team() {

  $labels = array(
    'name'                => _x( 'Team Members', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Team Member', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Team Members', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Team Member', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Team Member', 'snapsite' ),
    'new_item'            => __( 'New Team Member', 'snapsite' ),
    'edit_item'           => __( 'Edit Team Member', 'snapsite' ),
    'view_item'           => __( 'View Team Member', 'snapsite' ),
    'all_items'           => __( 'All Team Members', 'snapsite' ),
    'search_items'        => __( 'Search Team Members', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Team Members:', 'snapsite' ),
    'not_found'           => __( 'No Team Members found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Team Members found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'supports'            => array( 'title', 'thumbnail' ),
    'menu_icon'           => 'dashicons-groups'
  );
  register_post_type( 'team', $args );
}

// Product Post Type
add_action( 'init', 'snapsite_post_type_product' );

function snapsite_post_type_product() {

  $labels = array(
    'name'                => _x( 'Products', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Product', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Products', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Product', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Product', 'snapsite' ),
    'new_item'            => __( 'New Product', 'snapsite' ),
    'edit_item'           => __( 'Edit Product', 'snapsite' ),
    'view_item'           => __( 'View Product', 'snapsite' ),
    'all_items'           => __( 'All Products', 'snapsite' ),
    'search_items'        => __( 'Search Products', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Products:', 'snapsite' ),
    'not_found'           => __( 'No Products found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Products found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'editor', 'snapsite' ),
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title', 'editor', 'thumbnail'),
    'menu_icon'           => 'dashicons-edit',
    'taxonomies'          => array( 'category' )
  );
  register_post_type( 'product', $args );
}

// // Event Post Type
// add_action( 'init', 'snapsite_post_type_event' );

// function snapsite_post_type_event() {

//   $labels = array(
//     'name'                => _x( 'Events', 'post type general name', 'snapsite' ),
//     'singular_name'       => _x( 'Event', 'post type singular name', 'snapsite' ),
//     'menu_name'           => _x( 'Events', 'admin menu', 'snapsite' ),
//     'name_admin_bar'      => _x( 'Event', 'add new on admin bar', 'snapsite' ),
//     'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
//     'add_new_item'        => __( 'Add New Event', 'snapsite' ),
//     'new_item'            => __( 'New Event', 'snapsite' ),
//     'edit_item'           => __( 'Edit Event', 'snapsite' ),
//     'view_item'           => __( 'View Event', 'snapsite' ),
//     'all_items'           => __( 'All Events', 'snapsite' ),
//     'search_items'        => __( 'Search Events', 'snapsite' ),
//     'parent_item_colon'   => __( 'Parent Events:', 'snapsite' ),
//     'not_found'           => __( 'No Events found.', 'snapsite' ),
//     'not_found_in_trash'  => __( 'No Events found in Trash.', 'snapsite' )
//   );
//   $args = array(
//     'labels'              => $labels,
//     'description'         => __( 'Description.', 'snapsite' ),
//     'public'              => false,
//     'publicly_queryable'  => true,
//     'show_ui'             => true,
//     'show_in_menu'        => true,
//     'has_archive'         => false,
//     'hierarchical'        => false,
//     'menu_position'       => null,
//     'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
//     'menu_icon'           => 'dashicons-calendar-alt'
//   );
//   register_post_type( 'event', $args );
// }

// Video Post Type
/* add_action( 'init', 'snapsite_post_type_video' );

function snapsite_post_type_video() {

  $labels = array(
    'name'                => _x( 'Videos', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Video', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Videos', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Video', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Video', 'snapsite' ),
    'new_item'            => __( 'New Video', 'snapsite' ),
    'edit_item'           => __( 'Edit Video', 'snapsite' ),
    'view_item'           => __( 'View Video', 'snapsite' ),
    'all_items'           => __( 'All Videos', 'snapsite' ),
    'search_items'        => __( 'Search Videos', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Videos:', 'snapsite' ),
    'not_found'           => __( 'No Videos found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Videos found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title' ),
    'menu_icon'           => 'dashicons-format-video'
  );
  register_post_type( 'video', $args );
} */

// Case Study Post Type
/* add_action( 'init', 'snapsite_post_type_casestudy' );

function snapsite_post_type_casestudy() {

  $labels = array(
    'name'                => _x( 'Case Studies', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Case Study', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Case Studies', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Case Study', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Case Study', 'snapsite' ),
    'new_item'            => __( 'New Case Study', 'snapsite' ),
    'edit_item'           => __( 'Edit Case Study', 'snapsite' ),
    'view_item'           => __( 'View Case Study', 'snapsite' ),
    'all_items'           => __( 'All Case Studies', 'snapsite' ),
    'search_items'        => __( 'Search Case Studies', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Case Studies:', 'snapsite' ),
    'not_found'           => __( 'No Case Studies found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Case Studies found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title' ),
    'menu_icon'           => 'dashicons-media-text'
  );
  register_post_type( 'case-study', $args );
} */

// Project Post Type
/* add_action( 'init', 'snapsite_post_type_project' );

function snapsite_post_type_project() {

  $labels = array(
    'name'                => _x( 'Projects', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Project', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Projects', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Project', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Project', 'snapsite' ),
    'new_item'            => __( 'New Project', 'snapsite' ),
    'edit_item'           => __( 'Edit Project', 'snapsite' ),
    'view_item'           => __( 'View Project', 'snapsite' ),
    'all_items'           => __( 'All Projects', 'snapsite' ),
    'search_items'        => __( 'Search Projects', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Projects:', 'snapsite' ),
    'not_found'           => __( 'No Projects found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Projects found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title' ),
    'menu_icon'           => 'dashicons-edit'
  );
  register_post_type( 'project', $args );
} */

// Testimonial Post Type
/* add_action( 'init', 'snapsite_post_type_testimonial' );

function snapsite_post_type_testimonial() {

  $labels = array(
    'name'                => _x( 'Testimonials', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Testimonial', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Testimonial', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Testimonial', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Testimonial', 'snapsite' ),
    'new_item'            => __( 'New Testimonial', 'snapsite' ),
    'edit_item'           => __( 'Edit Testimonial', 'snapsite' ),
    'view_item'           => __( 'View Testimonial', 'snapsite' ),
    'all_items'           => __( 'All Testimonials', 'snapsite' ),
    'search_items'        => __( 'Search Testimonials', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Testimonials:', 'snapsite' ),
    'not_found'           => __( 'No Testimonials found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Testimonials found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title' ),
    'menu_icon'           => 'dashicons-admin-comments'
  );
  register_post_type( 'testimonial', $args );
} */

// Career Post Type
/* add_action( 'init', 'snapsite_post_type_career' );

function snapsite_post_type_career() {

  $labels = array(
    'name'                => _x( 'Careers', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Career', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Career', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Career', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Career', 'snapsite' ),
    'new_item'            => __( 'New Career', 'snapsite' ),
    'edit_item'           => __( 'Edit Career', 'snapsite' ),
    'view_item'           => __( 'View Career', 'snapsite' ),
    'all_items'           => __( 'All Careers', 'snapsite' ),
    'search_items'        => __( 'Search Careers', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Careers:', 'snapsite' ),
    'not_found'           => __( 'No Careers found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Careers found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title' ),
    'menu_icon'           => 'dashicons-clipboard'
  );
  register_post_type( 'career', $args );
} */

// Location Post Type
/* add_action( 'init', 'snapsite_post_type_location' );

function snapsite_post_type_location() {

  $labels = array(
    'name'                => _x( 'Locations', 'post type general name', 'snapsite' ),
    'singular_name'       => _x( 'Location', 'post type singular name', 'snapsite' ),
    'menu_name'           => _x( 'Location', 'admin menu', 'snapsite' ),
    'name_admin_bar'      => _x( 'Location', 'add new on admin bar', 'snapsite' ),
    'add_new'             => _x( 'Add New', 'location', 'snapsite' ),
    'add_new_item'        => __( 'Add New Location', 'snapsite' ),
    'new_item'            => __( 'New Location', 'snapsite' ),
    'edit_item'           => __( 'Edit Location', 'snapsite' ),
    'view_item'           => __( 'View Location', 'snapsite' ),
    'all_items'           => __( 'All Locations', 'snapsite' ),
    'search_items'        => __( 'Search Locations', 'snapsite' ),
    'parent_item_colon'   => __( 'Parent Locations:', 'snapsite' ),
    'not_found'           => __( 'No Locations found.', 'snapsite' ),
    'not_found_in_trash'  => __( 'No Locations found in Trash.', 'snapsite' )
  );
  $args = array(
    'labels'              => $labels,
    'description'         => __( 'Description.', 'snapsite' ),
    'public'              => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title' ),
    'menu_icon'           => 'dashicons-location'
  );
  register_post_type( 'location', $args );
} */
