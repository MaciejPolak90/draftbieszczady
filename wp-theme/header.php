<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="site-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent py-5">
    <div class="container-narrow mx-auto px-4 flex items-center justify-between">
      <a href="#" class="font-display text-xl md:text-2xl font-semibold transition-colors text-primary-foreground">Bliźniak w Smereku</a>
      <nav class="hidden lg:flex items-center gap-6">
        <a href="#udogodnienia" class="text-sm font-medium transition-colors hover:text-primary text-primary-foreground/90">Udogodnienia</a>
        <a href="#galeria" class="text-sm font-medium transition-colors hover:text-primary text-primary-foreground/90">Galeria</a>
        <a href="#lokalizacja" class="text-sm font-medium transition-colors hover:text-primary text-primary-foreground/90">Lokalizacja</a>
        <a href="#cennik" class="text-sm font-medium transition-colors hover:text-primary text-primary-foreground/90">Cennik</a>
        <a href="#kontakt" class="text-sm font-medium transition-colors hover:text-primary text-primary-foreground/90">Kontakt</a>
      </nav>
      <div class="hidden lg:flex items-center gap-3">
        <a href="tel:+48514995497" class="btn-honey flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92V21a2 2 0 0 1-2.18 2A19.72 19.72 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a2 2 0 0 1 2 1.72c.13 1.13.37 2.23.72 3.28a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c1.05.35 2.15.59 3.28.72A2 2 0 0 1 22 16.92z"></path></svg>Zadzwoń</a>
      </div>
      <!-- Mobile menu toggle i menu można dodać w przyszłości -->
    </div>
  </header>
