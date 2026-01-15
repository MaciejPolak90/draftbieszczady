<?php get_header(); ?>
<main id="main-content">
  <section class="container-narrow mx-auto px-4 py-16">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_title('<h1 class="font-display text-3xl md:text-4xl mb-8">', '</h1>');
        echo '<div class="prose max-w-none">';
        the_content();
        echo '</div>';
      endwhile;
    else :
      echo '<p>Nie znaleziono treści.</p>';
    endif;
    ?>
  </section>
</main>
<?php get_footer(); ?>
