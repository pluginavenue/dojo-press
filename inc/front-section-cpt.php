<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

add_action('init', function () {
    register_post_type('front_section', [
        'labels' => [
            'name' => 'Front Page Sections',
            'singular_name' => 'Front Page Section',
            'add_new_item' => 'Add New Section',
            'edit_item' => 'Edit Section',
            'new_item' => 'New Section',
            'view_item' => 'View Section',
            'search_items' => 'Search Sections',
        ],
        'public' => true,
        'has_archive' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-layout',
       'supports' => ['title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
        'show_in_rest' => true,
        'rewrite' => false,
    ]);
});
