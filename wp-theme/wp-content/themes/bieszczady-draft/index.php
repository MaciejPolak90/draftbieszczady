<?php get_header(); ?>
<main id="main-content">
  <section class="relative h-screen w-full overflow-hidden">
    <div class="absolute inset-0">
      <img src="/wp-content/themes/bieszczady-draft/assets/house-exterior.jpg" alt="Bliźniak w Smereku - widok zewnętrzny domu" class="h-full w-full object-cover" />
      <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
    </div>
    <div class="relative z-10 flex h-full flex-col items-center justify-center px-4">
      <h1 class="font-display text-4xl md:text-6xl lg:text-7xl text-white text-center drop-shadow-lg">Bliźniak w Smereku</h1>
      <p class="mt-4 text-lg md:text-xl text-white/90 text-center drop-shadow">Bieszczady</p>
    </div>
    <button class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center text-white/80 hover:text-white transition-colors animate-bounce" aria-label="Przewiń w dół" onclick="document.getElementById('details').scrollIntoView({behavior: 'smooth'});">
      <span class="text-sm mb-2">Odkryj więcej</span>
      <!-- Ikona strzałki w dół SVG -->
      <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
    </button>
  </section>
  <!-- Kolejne sekcje: Details, Features, Layout, Gallery, Pets, Pricing, Location, Contact, FAQ -->
  <section id="details" class="bg-background py-16 md:py-24"><div class="container-narrow mx-auto px-4"><!-- ...tu wstaw kolejne sekcje... --></div></section>
</main>
<?php get_footer(); ?>
