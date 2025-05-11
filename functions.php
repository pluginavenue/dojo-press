<?php
if (!defined('ABSPATH')) exit;

// === Define Pro Version Flag ===
//define('DOJOPRESS_PRO', true);

// Theme setup
require_once get_template_directory() . '/inc/setup.php';

// Scripts and styles
require_once get_template_directory() . '/inc/enqueue.php';

// Customizer for light/dark theme toggle
require_once get_template_directory() . '/inc/customizer.php';

// Front Page Section custom post type
require_once get_template_directory() . '/inc/front-section-cpt.php';

// Inline styles from Customizer
add_action('wp_head', function () {
    $primary             = get_theme_mod('dojopress_primary_color', '#dc2626');
    $dark_bg             = get_theme_mod('dojopress_dark_bg', '#111827');
    $site_font           = get_theme_mod('dojopress_site_font_family', 'system-ui');
    $heading_font        = get_theme_mod('dojopress_heading_font_family', 'system-ui');
    $nav_font_size       = get_theme_mod('dojopress_nav_font_size', '0.95rem');
    $nav_font_weight     = get_theme_mod('dojopress_nav_font_weight', '500');
    $button_font_size    = get_theme_mod('dojopress_button_font_size', '1rem');
    $button_font_weight  = get_theme_mod('dojopress_button_font_weight', '600');
    $header_bg = get_theme_mod('dojopress_header_bg_color', '#111827');

    echo "<style>
      :root {
        --color-accent: {$primary};
        --font-family-site: {$site_font};
        --font-family-heading: {$heading_font};
      }
      body,
      button,
      .wp-block-button__link,
      nav,
      .site-header,
      .site-footer {
        font-family: '{$site_font}', sans-serif;
      }
      button,
      .wp-block-button__link {
        font-size: {$button_font_size};
        font-weight: {$button_font_weight};
      }
      nav a {
        font-size: {$nav_font_size};
        font-weight: {$nav_font_weight};
      }
      h1, h2, h3, h4, h5, h6 {
        font-family: '{$heading_font}', sans-serif;
      }
      .dark {
        --color-bg-dark: {$dark_bg};
      }
        .site-header {
        background-color: {$header_bg};
        }
    </style>";
});

// Preload font styles to optimize rendering
add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
});

// Load Google Fonts based on Customizer selections
add_action('wp_enqueue_scripts', function () {
    $fonts = [];

    $site_font    = get_theme_mod('dojopress_site_font_family', 'system-ui');
    $heading_font = get_theme_mod('dojopress_heading_font_family', 'system-ui');

    $google_fonts = ['Inter', 'Lato', 'Open Sans', 'Roboto', 'Nunito', 'Playfair Display', 'Montserrat', 'Raleway', 'Oswald', 'Roboto Slab'];

    foreach ([$site_font, $heading_font] as $font) {
        if (in_array($font, $google_fonts) && !in_array($font, $fonts)) {
            $fonts[] = str_replace(' ', '+', $font) . ':wght@400;600;700';
        }
    }

    if (!empty($fonts)) {
        wp_enqueue_style(
            'dojopress-google-fonts',
            'https://fonts.googleapis.com/css2?' . http_build_query(['family' => implode('&family=', $fonts), 'display' => 'swap']),
            [],
            null
        );
    }
});

// Disable Gutenberg on the front page for compatibility
add_filter('use_block_editor_for_post', function ($use_block_editor, $post) {
    if ($post && $post->ID === get_option('page_on_front')) {
        return false;
    }
    return $use_block_editor;
}, 10, 2);
