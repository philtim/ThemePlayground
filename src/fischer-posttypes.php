<?php

/**
 * Plugin Name: Fischer Custom Post Types and Taxonomies
 * Description: A plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: fischerwerke GmbH & Co. KG
 */

function fischer_posttypes_masthead() {
  /*
   * Masthead: First section of one pager
   */
  $labels = array(
    'name' => 'Masthead',
    'singular_name' => 'Masthead',
    'menu_name' => 'Masthead',
    'menu_admin_bar' => 'All Mastheads',
    'add_new' => 'Add Masthead',
    'add_new_item' => 'Add Masthead',
    'new_item' => 'New Masthead',
    'edit_item' => 'Edit Masthead',
    'view_item' => 'View Masthead',
    'all_items' => 'View Masthead',
    'search_items' => 'Search Mastheads',
    'parent_item_colon' => 'Parent Masthead',
    'not_found' => 'No Mastheads found',
    'not_found_in_trash' => 'No Mastheads found in trash'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-welcome-view-site',
    'query_var' => true,
    'rewrite' => array('slug' => 'mastheads'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type( 'masthead', $args );
}

function fischer_posttypes_truckstops() {
  /*
   * Truckstops: Section to show dates and locations of the truck tour
   */
  $labels = array(
    'name' => 'Truckstops',
    'singular_name' => 'Truckstops',
    'menu_name' => 'Truckstop',
    'menu_admin_bar' => 'All Truckstops',
    'add_new' => 'Add Truckstop',
    'add_new_item' => 'Add Truckstop',
    'new_item' => 'New Truckstop',
    'edit_item' => 'Edit Truckstop',
    'view_item' => 'View Truckstop',
    'all_items' => 'View Truckstop',
    'search_items' => 'Search Truckstops',
    'parent_item_colon' => 'Parent Truckstop',
    'not_found' => 'No Truckstops found',
    'not_found_in_trash' => 'No Truckstops found in trash'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-calendar-alt',
    'query_var' => true,
    'rewrite' => array('slug' => 'truckstops'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => array('title')
    // TODO (Philipp Timmalog): Add acf for location input
  );
  register_post_type( 'truckstops', $args );
}

function fischer_posttypes_truckinformation() {
  /*
   * Truckinformation: General information about the fischer truck tour
   */
  $labels = array(
    'name' => 'Truckinformation',
    'singular_name' => 'Truckinformation',
    'menu_name' => 'Truckinformation',
    'menu_admin_bar' => 'All Truckinformation',
    'add_new' => 'Add Truckinformation',
    'add_new_item' => 'Add Truckinformation',
    'new_item' => 'New Truckinformation',
    'edit_item' => 'Edit Truckinformation',
    'view_item' => 'View Truckinformation',
    'all_items' => 'View Truckinformation',
    'search_items' => 'Search Truckinformation',
    'parent_item_colon' => 'Parent Truckinformation',
    'not_found' => 'No Truckinformation found',
    'not_found_in_trash' => 'No Truckinformation found in trash'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-info',
    'query_var' => true,
    'rewrite' => array('slug' => 'truckinformation'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type( 'truckinformation', $args );
}

function fischer_posttypes_truckexperience() {
  /*
   * Truckexperience: Interactive elements for discovering the fischer truck
   */
  $labels = array(
    'name' => 'Truckexperience',
    'singular_name' => 'Truckexperience',
    'menu_name' => 'Truckexperience',
    'menu_admin_bar' => 'All Truckexperience',
    'add_new' => 'Add Truckexperience',
    'add_new_item' => 'Add Truckexperience',
    'new_item' => 'New Truckexperience',
    'edit_item' => 'Edit Truckexperience',
    'view_item' => 'View Truckexperience',
    'all_items' => 'View Truckexperience',
    'search_items' => 'Search Truckexperience',
    'parent_item_colon' => 'Parent Truckexperience',
    'not_found' => 'No Truckexperience found',
    'not_found_in_trash' => 'No Truckexperience found in trash'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-performance',
    'query_var' => true,
    'rewrite' => array('slug' => 'truckexperience'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type( 'truckexperience', $args );
}

function fischer_posttypes_socialFeed() {
  /*
   * Socialfeed: Page with all kinds of social feeds
   */
  $labels = array(
    'name' => 'Socialfeed',
    'singular_name' => 'Socialfeed',
    'menu_name' => 'Socialfeeds',
    'menu_admin_bar' => 'All Socialfeeds',
    'add_new' => 'Add Socialfeed',
    'add_new_item' => 'Add Socialfeed',
    'new_item' => 'New Socialfeed',
    'edit_item' => 'Edit Socialfeed',
    'view_item' => 'View Socialfeed',
    'all_items' => 'View Socialfeeds',
    'search_items' => 'Search Socialfeeds',
    'parent_item_colon' => 'Parent Socialfeed',
    'not_found' => 'No Socialfeed found',
    'not_found_in_trash' => 'No Socialfeed found in trash'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-share',
    'query_var' => true,
    'rewrite' => array('slug' => 'socialfeed'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type( 'socialfeed', $args );
}

function fischer_posttypes_contest() {
  /*
   * Contest: Linkout to dedicated contest page
   */
  $labels = array(
    'name' => 'Contest',
    'singular_name' => 'Contest',
    'menu_name' => 'Contest',
    'menu_admin_bar' => 'All Contests',
    'add_new' => 'Add Contest',
    'add_new_item' => 'Add Contest',
    'new_item' => 'New Contest',
    'edit_item' => 'Edit Contest',
    'view_item' => 'View Contest',
    'all_items' => 'View Contests',
    'search_items' => 'Search Contests',
    'parent_item_colon' => 'Parent Contest',
    'not_found' => 'No Contests found',
    'not_found_in_trash' => 'No Contests found in trash'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-awards',
    'query_var' => true,
    'rewrite' => array('slug' => 'contest'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type( 'contest', $args );
}


add_action( 'init', 'fischer_posttypes_masthead' );
add_action( 'init', 'fischer_posttypes_truckstops' );
add_action( 'init', 'fischer_posttypes_truckinformation' );
add_action( 'init', 'fischer_posttypes_truckexperience' );
add_action( 'init', 'fischer_posttypes_socialfeed' );
add_action( 'init', 'fischer_posttypes_contest' );


function fischer_rewrite_flush() {
  fischer_posttypes_masthead();
  fischer_posttypes_truckstops();
  fischer_posttypes_truckinformation();
  fischer_posttypes_truckexperience();
  fischer_posttypes_socialfeed();
  fischer_posttypes_contest();
  flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'fischer_rewrite_flush()');
