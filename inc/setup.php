<?php
    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;
    
    add_action('after_setup_theme', function () {
        add_theme_support('align-wide');
        register_nav_menus([
            'primary' => __('Primary Menu', 'dojopress'),
        ]);
        add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        ]);
    });
function dojopress_enqueue_styles() {
    wp_enqueue_style(
        'dojopress-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'dojopress_enqueue_styles');

  ?>