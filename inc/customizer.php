<?php
    // Exit if accessed directly
    if (!defined('ABSPATH')) exit;

    add_action('customize_register', function($wp_customize) {
        $wp_customize->add_section('dojopress_theme_mode', [
            'title' => __('Theme Mode', 'dojopress'),
            'priority' => 30,
        ]);

        $wp_customize->add_setting('dojopress_mode', [
            'default' => 'auto',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_mode', [
            'label' => __('Default Theme Mode', 'dojopress'),
            'section' => 'dojopress_theme_mode',
            'type' => 'radio',
            'choices' => [
            'auto' => 'Allow user toggle (default)',
            'light' => 'Force light mode',
            'dark'  => 'Force dark mode',
            ],
        ]);
    

        $wp_customize->add_section('dojopress_colors', [
            'title'    => __('Theme Colors', 'dojopress'),
            'priority' => 31,
        ]);

        $wp_customize->add_setting('dojopress_primary_color', [
            'default'           => '#dc2626',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dojopress_primary_color', [
            'label'   => __('Primary Accent Color', 'dojopress'),
            'section' => 'dojopress_colors',
        ]));

        $wp_customize->add_setting('dojopress_dark_bg', [
            'default'           => '#111827',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dojopress_dark_bg', [
            'label'   => __('Dark Mode Background', 'dojopress'),
            'section' => 'dojopress_colors',
        ]));

        $wp_customize->add_setting('dojopress_site_font_family', [
            'default' => 'system-ui',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_site_font_family', [
            'label' => __('Site Font Family', 'dojopress'),
            'section' => 'dojopress_theme_mode', // or a separate general section if preferred
            'type' => 'select',
            'choices' => [
                'system-ui'    => 'System UI',
                'sans-serif'   => 'Sans Serif',
                'serif'        => 'Serif',
                'monospace'    => 'Monospace',
                'Georgia, serif' => 'Georgia',
                '"Times New Roman", serif' => 'Times New Roman',
                'Arial, sans-serif' => 'Arial',
                '"Helvetica Neue", sans-serif' => 'Helvetica Neue',
            ],
        ]);

        // === Font Options ===
        $wp_customize->add_section('dojopress_fonts', [
            'title' => __('Fonts', 'dojopress'),
            'priority' => 32,
        ]);

        $google_fonts = [
            'system-ui' => 'System Default',
            'Inter' => 'Inter',
            'Lato' => 'Lato',
            'Open Sans' => 'Open Sans',
            'Roboto' => 'Roboto',
            'Nunito' => 'Nunito',
            'Playfair Display' => 'Playfair Display',
            'Montserrat' => 'Montserrat',
            'Raleway' => 'Raleway',
            'Oswald' => 'Oswald',
            'Roboto Slab' => 'Roboto Slab',
        ];

        $wp_customize->add_setting('dojopress_site_font_family', [
            'default' => 'system-ui',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control('dojopress_site_font_family', [
            'label' => __('Site Font (Body Text)', 'dojopress'),
            'section' => 'dojopress_fonts',
            'type' => 'select',
            'choices' => $google_fonts,
        ]);

        $wp_customize->add_setting('dojopress_heading_font_family', [
            'default' => 'system-ui',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control('dojopress_heading_font_family', [
            'label' => __('Heading Font (H1–H6)', 'dojopress'),
            'section' => 'dojopress_fonts',
            'type' => 'select',
            'choices' => $google_fonts,
        ]);

        // === Extra Typography Controls ===
        $wp_customize->add_section('dojopress_typography_extras', [
            'title' => __('Font Sizes & Weights', 'dojopress'),
            'priority' => 33,
        ]);

        $wp_customize->add_setting('dojopress_nav_font_size', [
            'default' => '0.95rem',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('dojopress_nav_font_size', [
            'label' => __('Nav Font Size', 'dojopress'),
            'section' => 'dojopress_typography_extras',
            'type' => 'text',
        ]);

        $wp_customize->add_setting('dojopress_nav_font_weight', [
            'default' => '500',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('dojopress_nav_font_weight', [
            'label' => __('Nav Font Weight', 'dojopress'),
            'section' => 'dojopress_typography_extras',
            'type' => 'text',
        ]);

        $wp_customize->add_setting('dojopress_button_font_size', [
            'default' => '1rem',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('dojopress_button_font_size', [
            'label' => __('Button Font Size', 'dojopress'),
            'section' => 'dojopress_typography_extras',
            'type' => 'text',
        ]);

        $wp_customize->add_setting('dojopress_button_font_weight', [
            'default' => '600',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('dojopress_button_font_weight', [
            'label' => __('Button Font Weight', 'dojopress'),
            'section' => 'dojopress_typography_extras',
            'type' => 'text',
        ]);

        $wp_customize->add_setting('dojopress_show_site_title', [
            'default' => true,
            'sanitize_callback' => 'wp_validate_boolean',
        ]);

        $wp_customize->add_control('dojopress_show_site_title', [
            'label' => __('Show Site Title Next to Logo', 'dojopress'),
            'section' => 'title_tagline',
            'type' => 'checkbox',
        ]);
    });

    function dojopress_customize_hero($wp_customize) {
         $wp_customize->add_section('dojopress_hero_settings', [
            'title'    => __('Hero Settings', 'dojopress'),
            'priority' => 30,
            'transport' => 'postMessage',
        ]);

        // === Hero Background Image ===
        $wp_customize->add_setting('dojopress_hero_background_image', [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
            'dojopress_hero_background_image',
            [
                'label' => __('Hero Background Image', 'dojopress'),
                'section' => 'dojopress_hero_settings', // You can change this to 'hero_settings' if you want to organize better later
                'settings' => 'dojopress_hero_background_image',
            ]
        ));

        // Hero Heading
        $wp_customize->add_setting('dojopress_hero_heading', [
            'default' => 'Welcome to Our Dojo',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_heading', [
            'label' => __('Hero Heading', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'text',
        ]);

        // Hero Subheading
        $wp_customize->add_setting('dojopress_hero_subheading', [
            'default' => 'Train. Grow. Excel.',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_subheading', [
            'label' => __('Hero Subheading', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'text',
        ]);

        // Hero Text Color
        $wp_customize->add_setting('dojopress_hero_text_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'dojopress_hero_text_color',
            [
                'label' => __('Hero Text Color', 'dojopress'),
                'section' => 'dojopress_hero_settings',
            ]
        ));

        $wp_customize->add_setting('dojopress_hero_overlay_color', [
            'default' => 'rgba(0,0,0,0.5)',
            'sanitize_callback' => 'sanitize_text_field', // rgba — so not hex
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_overlay_color', [
            'label' => __('Hero Overlay Color (rgba)', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'text',
        ]);

        $wp_customize->add_setting('dojopress_hero_background_image_mobile', [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'dojopress_hero_background_image_mobile',
            [
                'label' => __('Hero Background Image (Mobile)', 'dojopress'),
                'section' => 'dojopress_hero_settings',
                'settings' => 'dojopress_hero_background_image_mobile',
            ]
        ));

        // === Hero Min Height (vh) ===
        $wp_customize->add_setting('dojopress_hero_min_height', [
            'default' => 75,
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_min_height', [
            'label' => __('Hero Section Min Height (vh)', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'number',
            'input_attrs' => [
                'min' => 30,
                'max' => 100,
                'step' => 5,
            ],
        ]);

        // === Hero Top Padding (px) ===
        $wp_customize->add_setting('dojopress_hero_padding_top', [
            'default' => 100,
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_padding_top', [
            'label' => __('Hero Top Padding (px)', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'number',
            'input_attrs' => [
                'min' => 0,
                'max' => 300,
                'step' => 10,
            ],
        ]);

        // === Hero Bottom Padding (px) ===
        $wp_customize->add_setting('dojopress_hero_padding_bottom', [
            'default' => 100,
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_padding_bottom', [
            'label' => __('Hero Bottom Padding (px)', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'number',
            'input_attrs' => [
                'min' => 0,
                'max' => 300,
                'step' => 10,
            ],
        ]);

        // === Hero Heading Font Size ===
        $wp_customize->add_setting('dojopress_hero_heading_size', [
            'default' => 48,
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_heading_size', [
            'label' => __('Hero Heading Font Size (px)', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'number',
            'input_attrs' => [
                'min' => 24,
                'max' => 100,
                'step' => 2,
            ],
        ]);

        // === Hero Subheading Font Size ===
        $wp_customize->add_setting('dojopress_hero_subheading_size', [
            'default' => 24,
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_subheading_size', [
            'label' => __('Hero Subheading Font Size (px)', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'number',
            'input_attrs' => [
                'min' => 14,
                'max' => 48,
                'step' => 1,
            ],
        ]);

        // === Hero Heading Font Weight ===
        $wp_customize->add_setting('dojopress_hero_heading_weight', [
            'default' => '700',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_heading_weight', [
            'label' => __('Hero Heading Font Weight', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'select',
            'choices' => [
                '300' => 'Light',
                '400' => 'Normal',
                '500' => 'Medium',
                '600' => 'Semi-Bold',
                '700' => 'Bold',
                '800' => 'Extra Bold',
                '900' => 'Black',
            ],
        ]);

        // === Hero Font Family ===
        $wp_customize->add_setting('dojopress_hero_font_family', [
            'default' => 'system-ui',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_hero_font_family', [
            'label' => __('Hero Font Family', 'dojopress'),
            'section' => 'dojopress_hero_settings',
            'type' => 'select',
            'choices' => [
                'system-ui'    => 'System UI',
                'sans-serif'   => 'Sans Serif',
                'serif'        => 'Serif',
                'monospace'    => 'Monospace',
                'Georgia, serif' => 'Georgia',
                '"Times New Roman", serif' => 'Times New Roman',
                'Arial, sans-serif' => 'Arial',
                '"Helvetica Neue", sans-serif' => 'Helvetica Neue',
            ],
        ]);

        // === Typography Settings Section ===
        $wp_customize->add_section('dojopress_typography', [
            'title'    => __('Typography', 'dojopress'),
            'priority' => 35,
        ]);

        // === Site Font Family (body text) ===
        $wp_customize->add_setting('dojopress_site_font_family', [
            'default'           => 'system-ui',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_site_font_family', [
            'label'   => __('Site Font Family (Body Text)', 'dojopress'),
            'section' => 'dojopress_typography',
            'type'    => 'select',
            'choices' => [
                'system-ui' => 'System UI',
                'sans-serif' => 'Sans Serif',
                'serif' => 'Serif',
                'monospace' => 'Monospace',
                'Georgia, serif' => 'Georgia',
                '"Times New Roman", serif' => 'Times New Roman',
                'Arial, sans-serif' => 'Arial',
                '"Helvetica Neue", sans-serif' => 'Helvetica Neue',
            ],
        ]);

        // === Heading Font Family (H1–H6) ===
        $wp_customize->add_setting('dojopress_heading_font_family', [
            'default'           => 'system-ui',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ]);

        $wp_customize->add_control('dojopress_heading_font_family', [
            'label'   => __('Heading Font Family (H1–H6)', 'dojopress'),
            'section' => 'dojopress_typography',
            'type'    => 'select',
            'choices' => [
                'system-ui' => 'System UI',
                'sans-serif' => 'Sans Serif',
                'serif' => 'Serif',
                'monospace' => 'Monospace',
                'Georgia, serif' => 'Georgia',
                '"Times New Roman", serif' => 'Times New Roman',
                'Arial, sans-serif' => 'Arial',
                '"Helvetica Neue", sans-serif' => 'Helvetica Neue',
            ],
        ]);

        $wp_customize->add_setting('dojopress_header_bg_color', [
            'default'   => '#111827',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'dojopress_header_bg_color',
            [
                'label'   => __('Header Background Color', 'dojopress'),
                'section' => 'colors',
                'settings'=> 'dojopress_header_bg_color',
            ]
        ));
    }
    add_action('customize_register', 'dojopress_customize_hero');
?>