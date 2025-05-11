<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<?php
  $theme_mode = get_theme_mod('dojopress_mode', 'dark');
  $body_class = $theme_mode === 'dark' ? 'dark' : '';
?>
<body <?php body_class($body_class); ?> data-theme-mode="<?php echo esc_attr($theme_mode); ?>">

<header class="site-header">
  <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
    <div class="branding">
      <a href="<?php echo home_url(); ?>" class="flex items-center space-x-2">
        <?php
        if (has_custom_logo()) {
          the_custom_logo();
        }
        if (!has_custom_logo() || get_theme_mod('dojopress_show_title', true)) {
          echo '<span class="branding">' . get_bloginfo('name') . '</span>';
        }
        ?>
      </a>
    </div>

    <nav class="hidden md:flex space-x-6 ml-auto">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => false,
        'items_wrap' => '<ul class="menu">%3$s</ul>',
      ]);
      ?>
    </nav>

    <?php if (defined('DOJOPRESS_PRO')) : ?>
      <?php if ($theme_mode === 'auto') : ?>
        <button class="theme-toggle hidden md:inline-flex items-center text-2xl p-2 rounded transition-colors text-gray-900 dark:text-white" aria-label="Toggle Theme">
          <svg class="theme-icon w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="..." />
          </svg>
        </button>
      <?php endif; ?>
    <?php endif; ?>

    <button id="mobile-menu-button">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <div id="mobile-menu">
    <nav>
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => false,
        'items_wrap' => '%3$s',
      ]);
      ?>
    </nav>
  </div>
</header>


<!-- Site Content Wrapper -->
<div class="pt-20">