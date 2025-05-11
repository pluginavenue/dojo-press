  </div> 

 <footer class="bg-gray-100 dark:bg-[var(--color-bg-dark)] text-gray-700 dark:text-white">
  <section class="py-12 bg-[var(--color-bg-dark)] text-white text-center">
  <div class="container mx-auto px-4">
    <p class="text-lg">This section uses the admin-defined dark mode background color.</p>
  </div>
</section>  
  <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
      
      <!-- Site Info -->
      <div>
        <h3 class="text-xl font-semibold mb-2"><?php bloginfo('name'); ?></h3>
        <p class="text-sm">Dedicated to the art of judo and the development of our students — on and off the mat.</p>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-xl font-semibold mb-2">Quick Links</h3>
        <ul class="space-y-1">
          <li><a href="<?php echo home_url('/'); ?>" class="hover:underline">Home</a></li>
          <li><a href="<?php echo home_url('/about'); ?>" class="hover:underline">About</a></li>
          <li><a href="<?php echo home_url('/schedule'); ?>" class="hover:underline">Schedule</a></li>
          <li><a href="<?php echo home_url('/contact'); ?>" class="hover:underline">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h3 class="text-xl font-semibold mb-2">Contact</h3>
        <p class="text-sm">Denver Judo<br>123 Main St<br>Denver, CO 80202</p>
        <p class="mt-2 text-sm">Email: <a href="mailto:info@denverjudo.com" class="hover:underline">info@denverjudo.com</a></p>
      </div>
    </div>

    <div class="bg-gray-200 dark:bg-gray-900 text-center py-4 text-sm text-gray-600 dark:text-gray-400">
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
