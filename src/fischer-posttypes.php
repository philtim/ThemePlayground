<?php

/**
 * Plugin Name: Fischer Custom Post Types and Taxonomies
 * Description: A plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: Philipp Timmalog <phil@t7lab.com>
 */

function fischer_custom_posttypes() {
  // ------ MASTHEAD
  $labels = array(
    'name' => 'Masthead',
    'singular_name' => 'Masthead',
    'menu_name' => 'Add Masthead',
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
    'menu_position' => 2,
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


add_action( 'init', 'fischer_custom_posttypes' );


function fischer_rewrite_flush() {
  fischer_custom_posttypes();
  flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'fischer_rewrite_flush()');
