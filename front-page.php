<?php
get_header();
?>

<main class="bg-[var(--color-bg-dark)] text-gray-100">

  <!-- Hero Section -->
  <?php
    $heading          = get_theme_mod('dojopress_hero_heading', 'Welcome to Our Dojo');
    $subheading       = get_theme_mod('dojopress_hero_subheading', 'Train. Grow. Excel.');
    $text_color       = get_theme_mod('dojopress_hero_text_color', '#ffffff');
    $overlay_color    = get_theme_mod('dojopress_hero_overlay_color', 'rgba(0,0,0,0.5)');
    $bg_image         = get_theme_mod('dojopress_hero_background_image');
    $bg_image_mobile  = get_theme_mod('dojopress_hero_background_image_mobile');
    $min_height       = get_theme_mod('dojopress_hero_min_height', 75);
    $padding_top      = get_theme_mod('dojopress_hero_padding_top', 0);
    $padding_bottom   = get_theme_mod('dojopress_hero_padding_bottom', 0);
    $heading_size     = get_theme_mod('dojopress_hero_heading_size', 48);
    $heading_weight   = get_theme_mod('dojopress_hero_heading_weight', '700');
    $sub_size         = get_theme_mod('dojopress_hero_subheading_size', 24);
    $hero_font_family = get_theme_mod('dojopress_hero_font_family', 'system-ui');
  ?>

  <section class="relative w-full bg-cover bg-center observed" style="background-image: url('<?php echo esc_url($bg_image); ?>'); min-height: <?php echo absint($min_height); ?>vh; padding-top: <?php echo absint($padding_top); ?>px; padding-bottom: <?php echo absint($padding_bottom); ?>px;">
    <div class="absolute inset-0" style="background-color: <?php echo esc_attr($overlay_color); ?>;"></div>
    <div class="relative z-10 flex items-center justify-center min-h-[<?php echo absint($min_height); ?>vh] px-4 text-center">
      <div class="hero-content max-w-4xl mx-auto" style="font-family: <?php echo esc_attr($hero_font_family); ?>; color: <?php echo esc_attr($text_color); ?>;">
        <h1 class="text-4xl md:text-6xl font-bold text-center" style="font-size: <?php echo esc_attr($heading_size); ?>px; font-weight: <?php echo esc_attr($heading_weight); ?>;">
          <?php echo esc_html($heading); ?>
        </h1>
        <p class="mt-4 text-xl md:text-2xl text-center" style="font-size: <?php echo esc_attr($sub_size); ?>px;">
          <?php echo esc_html($subheading); ?>
        </p>
      </div>
    </div>
  </section>

  <!-- SVG Accent Separator -->
  <svg class="w-full h-12" viewBox="0 0 1440 100" preserveAspectRatio="none">
    <path d="M0,0L1440,100L1440,0L0,0Z" fill="var(--color-accent)"></path>
  </svg>

  <!-- Dynamic Front Page Sections -->
  <?php
  $sections = new WP_Query([
    'post_type' => 'front_section',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
  ]);

  if ($sections->have_posts()) :
    while ($sections->have_posts()) : $sections->the_post();
      $image = get_the_post_thumbnail_url(get_the_ID(), 'full');

      $bg_dark = get_post_meta(get_the_ID(), 'section_background_color_dark', true);
      $text_dark = get_post_meta(get_the_ID(), 'section_text_color_dark', true);

      if (!$bg_dark) $bg_dark = '#000000';
      if (!$text_dark) $text_dark = '#ffffff';
  ?>
    <section class="py-16 opacity-0 transition-opacity duration-700 ease-in-out observed" style="background-color: <?php echo esc_attr($bg_dark); ?>; color: <?php echo esc_attr($text_dark); ?>;">
      <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-stretch">
          <?php if ($image) : ?>
            <div class="md:w-1/2 w-full">
              <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" />
            </div>
          <?php endif; ?>
          <div class="md:w-1/2 w-full px-6 py-8">
            <h2 class="text-3xl font-semibold mb-4 text-center"><?php the_title(); ?></h2>
            <div class="text-lg leading-relaxed">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
    endwhile;
    wp_reset_postdata();
  endif;
  ?>

</main>

<?php get_footer(); ?>
