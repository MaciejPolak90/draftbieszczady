(() => {
  const getOffset = () => {
    const fallback = (typeof window.bwsTheme?.headerOffset === 'number') ? window.bwsTheme.headerOffset : 96;
    const header = document.querySelector('.bws-header');
    return header ? header.getBoundingClientRect().height + 8 : fallback;
  };

  const smoothScrollTo = (target) => {
    const element = typeof target === 'string' ? document.querySelector(target) : target;
    if (!element) return;
    const top = element.getBoundingClientRect().top + window.scrollY - getOffset();
    window.scrollTo({ top, behavior: 'smooth' });
  };

  document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.bws-header');
    const brand = document.querySelector('.bws-brand');
    const navLinks = document.querySelectorAll('.bws-nav-link');
    const menuToggle = document.querySelector('.bws-menu-toggle');
    const mobileMenu = document.querySelector('.bws-mobile-menu');
    const openIcon = menuToggle?.querySelector('.bws-icon-open');
    const closeIcon = menuToggle?.querySelector('.bws-icon-close');
    const scrollLinks = document.querySelectorAll('[data-scroll-link]');
    const scrollTargets = document.querySelectorAll('[data-scroll-target]');
    const filters = document.querySelectorAll('.bws-filter');
    const galleryItems = document.querySelectorAll('.bws-gallery-item');
    const placeholder = document.querySelector('.bws-taras-placeholder');
    const emptyState = document.querySelector('.bws-gallery-empty');
    const lightbox = document.querySelector('.bws-lightbox');
    const lightboxImg = lightbox?.querySelector('.bws-lightbox-image');
    const lightboxCaption = lightbox?.querySelector('.bws-lightbox-caption');
    const lightboxClose = lightbox?.querySelector('.bws-lightbox-close');
    const accordionTriggers = document.querySelectorAll('[data-accordion-toggle]');
    const contactSection = document.getElementById('kontakt');

    const updateHeader = () => {
      if (!header) return;
      const scrolled = window.scrollY > 50;
      header.classList.toggle('bg-transparent', !scrolled);
      header.classList.toggle('py-5', !scrolled);
      header.classList.toggle('bg-card/95', scrolled);
      header.classList.toggle('backdrop-blur-md', scrolled);
      header.classList.toggle('shadow-soft', scrolled);
      header.classList.toggle('py-3', scrolled);
      if (brand) {
        brand.classList.toggle('text-primary-foreground', !scrolled);
        brand.classList.toggle('text-foreground', scrolled);
      }
      navLinks.forEach((link) => {
        link.classList.toggle('text-primary-foreground/90', !scrolled);
        link.classList.toggle('text-foreground', scrolled);
      });
      if (menuToggle) {
        menuToggle.classList.toggle('text-primary-foreground', !scrolled);
        menuToggle.classList.toggle('text-foreground', scrolled);
        menuToggle.classList.toggle('hover:bg-primary-foreground/10', !scrolled);
        menuToggle.classList.toggle('hover:bg-muted', scrolled);
      }
    };

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    let menuOpen = false;
    const setMenuState = (open) => {
      menuOpen = open;
      if (menuToggle) {
        menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      }
      if (mobileMenu) {
        mobileMenu.classList.toggle('hidden', !open);
      }
      if (openIcon && closeIcon) {
        openIcon.classList.toggle('hidden', open);
        closeIcon.classList.toggle('hidden', !open);
      }
    };

    menuToggle?.addEventListener('click', () => setMenuState(!menuOpen));

    const handleScrollLink = (event, targetSelector) => {
      event.preventDefault();
      if (!targetSelector) return;
      smoothScrollTo(targetSelector);
      setMenuState(false);
    };

    scrollLinks.forEach((link) => {
      link.addEventListener('click', (event) => {
        handleScrollLink(event, link.getAttribute('href'));
      });
    });

    scrollTargets.forEach((button) => {
      const target = button.getAttribute('data-scroll-target');
      button.addEventListener('click', (event) => handleScrollLink(event, target));
    });

    const params = new URLSearchParams(window.location.search);
    if (params.get('sent') && contactSection) {
      setTimeout(() => smoothScrollTo(contactSection), 400);
    }

    const setFilterClasses = (button, active) => {
      button.classList.toggle('bg-primary', active);
      button.classList.toggle('text-primary-foreground', active);
      button.classList.toggle('shadow-soft', active);
      button.classList.toggle('bg-card', !active);
      button.classList.toggle('text-muted-foreground', !active);
    };

    const applyFilter = (filter) => {
      let visibleCount = 0;
      filters.forEach((btn) => {
        setFilterClasses(btn, btn.dataset.filter === filter);
      });

      galleryItems.forEach((item) => {
        const categories = (item.dataset.categories || '').split(',').map((cat) => cat.trim());
        const shouldShow = filter === 'all' || categories.includes(filter);
        const hideForTaras = filter === 'taras';
        const visible = shouldShow && !hideForTaras;
        item.classList.toggle('hidden', !visible);
        if (visible) {
          visibleCount += 1;
        }
      });

      if (placeholder) {
        placeholder.classList.toggle('hidden', filter !== 'taras');
      }

      if (emptyState) {
        if (galleryItems.length === 0) {
          emptyState.classList.remove('hidden');
        } else {
          const showEmpty = visibleCount === 0 && filter !== 'taras';
          emptyState.classList.toggle('hidden', !showEmpty);
        }
      }
    };

    if (filters.length) {
      applyFilter('all');
      filters.forEach((btn) => {
        btn.addEventListener('click', () => applyFilter(btn.dataset.filter || 'all'));
      });
    } else if (emptyState && galleryItems.length) {
      emptyState.classList.add('hidden');
    }

    const openLightbox = (item) => {
      if (!lightbox || !lightboxImg || !lightboxCaption) return;
      lightboxImg.src = item.dataset.src || '';
      lightboxImg.alt = item.dataset.alt || '';
      lightboxCaption.textContent = item.dataset.caption || '';
      lightbox.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    };

    const closeLightbox = () => {
      if (!lightbox) return;
      lightbox.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    };

    galleryItems.forEach((item) => {
      item.addEventListener('click', () => openLightbox(item));
    });

    lightboxClose?.addEventListener('click', closeLightbox);
    lightbox?.addEventListener('click', (event) => {
      if (event.target === lightbox) {
        closeLightbox();
      }
    });

    accordionTriggers.forEach((trigger) => {
      trigger.addEventListener('click', () => {
        const content = trigger.parentElement?.querySelector('.bws-accordion-content');
        const isOpen = trigger.classList.toggle('is-open');
        if (content) {
          content.classList.toggle('hidden', !isOpen);
        }
      });
    });
  });
})();
