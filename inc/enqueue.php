<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

function dojopress_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // ✅ Enqueue compiled CSS
    wp_enqueue_style(
        'dojo-style',
        get_template_directory_uri() . '/dist/style.css',
        [],
        $theme_version
    );

    // ✅ Enqueue compiled JS (with jQuery as a dependency)
    wp_enqueue_script(
        'dojo-script',
        get_template_directory_uri() . '/dist/js.js',
        ['jquery'], // ✅ ensure jQuery is loaded first
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'dojopress_enqueue_assets');

function dojopress_customize_preview_js() {
    wp_enqueue_script(
        'dojopress-customizer',
        get_template_directory_uri() . '/dist/js.js',
        ['jquery', 'customize-preview'], // ✅ jQuery + Customizer support
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('customize_preview_init', 'dojopress_customize_preview_js');
