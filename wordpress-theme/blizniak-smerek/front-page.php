
<?php
/**
 * Front page template.
 *
 * @package blizniak-smerek
 */

get_header();

$brand         = bws_get_mod( 'brand_name', 'Bliźniak w Smereku' );
$hero_title    = bws_get_mod( 'hero_title', 'Bliźniak w Smereku — rodzinny wypoczynek w Bieszczadach' );
$hero_lead     = bws_get_mod( 'hero_lead', 'Połówka domu na wyłączność. Do 5 osób + 2 miejsca na narożniku w salonie. Kominek, 2 łazienki, kuchnia, altana z grillem. Wi-Fi i parking w cenie.' );
$price_text    = bws_get_mod( 'price', '450 zł / doba' );
$address       = bws_get_mod( 'address', 'Smerek 79, Bieszczady' );
$phone         = bws_get_mod( 'phone', '+48 514 995 497' );
$whatsapp      = bws_get_mod( 'whatsapp', '+48 514 995 497' );
$rules_text    = bws_get_mod( 'rules', 'Miejsce dla osób szukających spokoju — bez imprez.' );
$animals_text  = bws_get_mod( 'animals', 'Zwierzęta dozwolone, mile widziane 🐾' );
$layout_desc   = bws_get_mod( 'layout_desc', 'Przestronne wnętrza na dwóch poziomach — idealne dla rodziny. Do 5 osób + 2 miejsca na narożniku w salonie.' );
$location_desc = bws_get_mod( 'location_desc', 'Smerek to malownicza wioska u podnóża Połoniny Wetlińskiej. Świetna baza wypadowa na bieszczadzkie szlaki i spokojny wypoczynek.' );
$maps_link     = bws_get_mod( 'maps_link', 'https://www.google.com/maps/search/?api=1&query=Smerek+79+Bieszczady' );

$hero_image_id  = (int) bws_get_mod( 'hero_image', 0 );
$hero_image_url = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'full' ) : BWS_THEME_URI . '/assets/house-exterior-ubzMzI8n.jpg';

$price_number = preg_replace( '/[^0-9,\.]/', '', $price_text );
$price_number = $price_number ? $price_number : '450';
$price_suffix = trim( str_replace( $price_number, '', $price_text ) );

$sent_status = isset( $_GET['sent'] ) ? sanitize_text_field( wp_unslash( $_GET['sent'] ) ) : '';

$gallery_filters = array(
	'all'      => 'Wszystko',
	'salon'    => 'Salon i kominek',
	'kuchnia'  => 'Kuchnia i jadalnia',
	'pokoje'   => 'Pokoje',
	'lazienki' => 'Łazienki',
	'altana'   => 'Altana i grill',
	'okolica'  => 'Okolica i szlaki',
	'taras'    => 'Taras (wkrótce)',
);

$gallery_items = array();
$gallery_query = new WP_Query(
	array(
		'post_type'      => 'bs_photo',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	)
);

if ( $gallery_query->have_posts() ) {
	while ( $gallery_query->have_posts() ) {
		$gallery_query->the_post();
		$thumb = get_the_post_thumbnail_url( get_the_ID(), 'bws_gallery' );
		$thumb = $thumb ? $thumb : BWS_THEME_URI . '/assets/house-exterior-ubzMzI8n.jpg';

		$terms      = get_the_terms( get_the_ID(), 'bs_photo_category' );
		$categories = array( 'all' );

		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$categories[] = $term->slug;
			}
		}

		$gallery_items[] = array(
			'src'        => $thumb,
			'alt'        => get_the_title(),
			'caption'    => get_the_title(),
			'categories' => array_unique( $categories ),
		);
	}
}
wp_reset_postdata();

$map_embed_src = 'https://www.google.com/maps?q=' . rawurlencode( $address ) . '&output=embed';

?>

<main class="pb-20 lg:pb-0">
	<section class="relative h-screen w-full overflow-hidden">
		<div class="absolute inset-0">
			<img
				src="<?php echo esc_url( $hero_image_url ); ?>"
				alt="<?php echo esc_attr( $brand ); ?>"
				class="h-full w-full object-cover"
			/>
			<div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50 overlay-gradient"></div>
		</div>

		<div class="relative z-10 flex h-full flex-col items-center justify-center px-4 text-center">
			<h1 class="font-display text-4xl md:text-6xl lg:text-7xl text-white drop-shadow-lg">
				<?php echo esc_html( $hero_title ); ?>
			</h1>
			<p class="mt-4 text-lg md:text-xl text-white/90 max-w-3xl drop-shadow text-balance">
				<?php echo wp_kses_post( $hero_lead ); ?>
			</p>
		</div>

		<button
			class="bws-scroll-indicator absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center text-white/80 hover:text-white transition-colors animate-bounce"
			data-scroll-target="#details"
		>
			<span class="text-sm mb-2">Odkryj więcej</span>
			<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
			</svg>
		</button>
	</section>
	<section id="details" class="bg-background py-16 md:py-24">
		<div class="container-narrow mx-auto px-4">
			<div class="max-w-4xl mx-auto text-center">
				<div class="inline-block mb-6">
					<span class="bg-primary text-primary-foreground px-6 py-3 rounded-full text-xl md:text-2xl font-bold shadow-card">
						<?php echo esc_html( $price_text ); ?>
					</span>
				</div>

				<h2 class="font-display text-3xl md:text-4xl lg:text-5xl text-foreground mb-6">
					Rodzinny wypoczynek w Bieszczadach
				</h2>

				<p class="text-lg md:text-xl text-muted-foreground mb-10 max-w-3xl mx-auto leading-relaxed">
					<?php echo wp_kses_post( $hero_lead ); ?>
				</p>

				<div class="flex flex-col sm:flex-row gap-4 justify-center mb-10">
					<a class="btn-honey text-lg px-8 py-6 inline-flex items-center justify-center" href="#kontakt" data-scroll-link>
						Sprawdź dostępność
					</a>
					<a
						class="inline-flex items-center justify-center text-lg px-8 py-6 border border-primary rounded-xl text-primary hover:bg-primary hover:text-primary-foreground transition-colors"
						href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"
					>
						<svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.08 4.18 2 2 0 014.06 2h3a2 2 0 012 1.72c.12.86.37 1.7.72 2.49a2 2 0 01-.45 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.79.35 1.63.6 2.49.72A2 2 0 0122 16.92z" />
						</svg>
						Zadzwoń
					</a>
				</div>

				<div class="flex flex-wrap items-center justify-center gap-4 mb-12 text-muted-foreground">
					<span class="text-sm">Szybki kontakt:</span>
					<a
						href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $whatsapp ) ); ?>"
						class="flex items-center gap-2 hover:text-primary transition-colors"
						target="_blank"
						rel="noopener noreferrer"
					>
						<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor">
							<path d="M16 3a13 13 0 00-11 19.94L3 29l6.2-1.94A13 13 0 1016 3zm0 2a11 11 0 110 22 10.9 10.9 0 01-5.1-1.27l-.37-.2-3.65 1.15 1.18-3.55-.24-.37A11 11 0 0116 5zm-2.25 5c-.21 0-.53.08-.85.4-.3.3-.9.88-.9 2.12 0 1.24.92 2.44 1.05 2.6.12.16 1.8 2.88 4.3 3.9 2.13.85 2.57.7 3.04.66.47-.05 1.5-.61 1.71-1.2.21-.6.21-1.11.15-1.21-.06-.11-.24-.18-.5-.3-.27-.1-1.59-.78-1.84-.87-.24-.1-.4-.15-.58.15-.18.3-.69.87-.84 1.05-.16.16-.31.18-.58.06-.27-.11-1.14-.42-2.17-1.34-.8-.71-1.34-1.6-1.5-1.86-.16-.27-.02-.41.1-.53.1-.1.24-.27.36-.4.12-.12.16-.2.25-.34.08-.15.04-.28-.02-.4-.05-.12-.58-1.4-.8-1.9-.21-.5-.43-.43-.58-.44z"/>
						</svg>
						WhatsApp
					</a>
					<a
						href="sms:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"
						class="flex items-center gap-2 hover:text-primary transition-colors"
					>
						<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
						</svg>
						SMS
					</a>
					<span class="font-medium text-foreground"><?php echo esc_html( $phone ); ?></span>
				</div>

				<?php
				$amenities = array(
					array( 'label' => '2 pokoje', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h14a2 2 0 012 2v10H3V7zm5 10v-4h8v4" />' ),
					array( 'label' => '2 łazienki', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14a4 4 0 10-8 0m8 0V9a4 4 0 018 0v5m-8 0h8m0 0a4 4 0 108 0" />' ),
					array( 'label' => 'Kominek', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3c1 1.5 1 3 0 4.5C10.5 9 9 11 9 13.5a3 3 0 006 0c0-1.5-.5-2.5-1.5-3.5 2 1 3.5 3 3.5 5.5a5 5 0 11-10 0C7 11 9 7.5 12 3z" />' ),
					array( 'label' => 'Kuchnia', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 3h16M9 7v13m6-13v13M6 7h12l-1 10H7L6 7z" />' ),
					array( 'label' => 'Altana z grillem', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l7 4v8l-7 4-7-4V8l7-4z" />' ),
					array( 'label' => 'Wi-Fi', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.5 9.5a15 15 0 0119 0M6 13a9 9 0 0112 0M10.5 16.5a3 3 0 013 0" />' ),
					array( 'label' => 'Parking', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 6h7a4 4 0 010 8H5V6zm7 4a2 2 0 00-2-2H7v4h3a2 2 0 002-2z" />' ),
					array( 'label' => 'Zwierzęta OK', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12c0-3 2-5 4-5s4 2 4 5-2 5-4 5-4-2-4-5zm16 0c0-3-2-5-4-5s-4 2-4 5 2 5 4 5 4-2 4-5z" />' ),
				);
				?>

				<div class="flex flex-wrap justify-center gap-3">
					<?php foreach ( $amenities as $amenity ) : ?>
						<div class="icon-badge">
							<svg class="h-4 w-4 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<?php echo $amenity['icon']; ?>
							</svg>
							<span><?php echo esc_html( $amenity['label'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<section id="udogodnienia" class="section-padding bg-cream">
		<div class="container-narrow mx-auto">
			<div class="text-center mb-12">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Najważniejsze dla rodziny
				</h2>
				<p class="text-muted-foreground text-lg max-w-2xl mx-auto">
					Wszystko, czego potrzebujesz na rodzinny wypoczynek w górach
				</p>
			</div>

			<?php
			$features = array(
				array(
					'title'       => 'Dom na wyłączność',
					'description' => 'Cała połówka bliźniaka tylko dla Twojej rodziny',
					'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h5v-6h6v6h5V10" />',
				),
				array(
					'title'       => '2 łazienki',
					'description' => 'Dwie pełne łazienki z prysznicem i ogrzewaniem',
					'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14a4 4 0 10-8 0m8 0V9a4 4 0 018 0v5m-8 0h8m0 0a4 4 0 108 0" />',
				),
				array(
					'title'       => 'Kominek',
					'description' => 'Przytulne wieczory przy ogniu w przestronnym salonie',
					'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3c1 1.5 1 3 0 4.5C10.5 9 9 11 9 13.5a3 3 0 006 0c0-1.5-.5-2.5-1.5-3.5 2 1 3.5 3 3.5 5.5a5 5 0 11-10 0C7 11 9 7.5 12 3z" />',
				),
				array(
					'title'       => 'Altana + grill',
					'description' => 'Duża wiata z rusztem do grillowania na świeżym powietrzu',
					'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l7 4v8l-7 4-7-4V8l7-4z" />',
				),
				array(
					'title'       => 'Wi-Fi',
					'description' => 'Bezprzewodowy internet w cenie pobytu',
					'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.5 9.5a15 15 0 0119 0M6 13a9 9 0 0112 0M10.5 16.5a3 3 0 013 0" />',
				),
				array(
					'title'       => 'Parking',
					'description' => 'Prywatne miejsce parkingowe przy domu',
					'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 6h7a4 4 0 010 8H5V6zm7 4a2 2 0 00-2-2H7v4h3a2 2 0 002-2z" />',
				),
			);
			?>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php foreach ( $features as $index => $feature ) : ?>
					<div class="card-warm p-6 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1" style="animation-delay: <?php echo esc_attr( $index * 0.1 ); ?>s">
						<div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
							<svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<?php echo $feature['icon']; ?>
							</svg>
						</div>
						<h3 class="font-display text-xl text-foreground mb-2">
							<?php echo esc_html( $feature['title'] ); ?>
						</h3>
						<p class="text-muted-foreground">
							<?php echo esc_html( $feature['description'] ); ?>
						</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section class="section-padding">
		<div class="container-narrow mx-auto">
			<div class="text-center mb-12">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Układ domu i wyposażenie
				</h2>
				<p class="text-muted-foreground text-lg max-w-2xl mx-auto">
					<?php echo wp_kses_post( $layout_desc ); ?>
				</p>
			</div>

			<?php
			$rooms = array(
				array(
					'title' => 'Piętro',
					'items' => array(
						'Pokój 3-osobowy: 1 łóżko podwójne + 1 pojedyncze',
						'Pokój 2-osobowy: 1 łóżko podwójne',
						'Drewniany sufit i widok na świerki',
					),
					'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7l8-4 8 4v10a2 2 0 01-2 2h-4v-6H10v6H6a2 2 0 01-2-2V7z" />',
				),
				array(
					'title' => 'Parter',
					'items' => array(
						'Duży salon z kominkiem i TV',
						'Narożnik rozkładany dla 2 osób',
						'Jadalnia przy kuchni',
					),
					'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M4 8h16a1 1 0 011 1v7H3V9a1 1 0 011-1zm2 7v2m12-2v2" />',
				),
				array(
					'title' => 'Kuchnia',
					'items' => array(
						'W pełni wyposażona kuchnia',
						'Zmywarka i pralka',
						'Piekarnik, płyta gazowa, mikrofalówka',
					),
					'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 3h16M9 7v13m6-13v13M6 7h12l-1 10H7L6 7z" />',
				),
				array(
					'title' => 'Łazienki',
					'items' => array(
						'2 pełne łazienki z prysznicem',
						'Ogrzewanie podłogowe',
						'Ręczniki i środki czystości',
					),
					'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14a4 4 0 10-8 0m8 0V9a4 4 0 018 0v5m-8 0h8m0 0a4 4 0 108 0" />',
				),
				array(
					'title' => 'Na zewnątrz',
					'items' => array(
						'Duża altana z rusztem do grillowania',
						'Taras (zdjęcia wkrótce)',
						'Parking przy domu',
					),
					'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l7 4v8l-7 4-7-4V8l7-4z" />',
				),
			);
			?>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php foreach ( $rooms as $index => $room ) : ?>
					<div class="card-warm p-6 <?php echo $index === count( $rooms ) - 1 && count( $rooms ) % 3 !== 0 ? 'md:col-span-2 lg:col-span-1' : ''; ?>">
						<div class="flex items-center gap-3 mb-4">
							<div class="w-10 h-10 rounded-lg bg-secondary flex items-center justify-center">
								<svg class="w-5 h-5 text-wood" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<?php echo $room['icon']; ?>
								</svg>
							</div>
							<h3 class="font-display text-xl text-foreground">
								<?php echo esc_html( $room['title'] ); ?>
							</h3>
						</div>
						<ul class="space-y-2">
							<?php foreach ( $room['items'] as $item ) : ?>
								<li class="flex items-start gap-2 text-muted-foreground">
									<span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 shrink-0"></span>
									<?php echo esc_html( $item ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="mt-8 p-4 bg-secondary/50 rounded-xl text-center">
				<p class="text-muted-foreground">
					<strong class="text-foreground">Pojemność:</strong> do 5 osób (+ 2 na narożniku w salonie)
				</p>
			</div>
		</div>
	</section>
	<section id="galeria" class="section-padding bg-cream">
		<div class="container-narrow mx-auto">
			<div class="text-center mb-8">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Galeria
				</h2>
				<p class="text-muted-foreground text-lg max-w-2xl mx-auto">
					Zobacz jak wygląda nasz dom — przytulne wnętrza i piękna okolica
				</p>
			</div>

			<div class="flex flex-wrap justify-center gap-2 mb-8">
				<?php foreach ( $gallery_filters as $slug => $label ) : ?>
					<button
						class="bws-filter px-4 py-2 rounded-full text-sm font-medium transition-all <?php echo 'all' === $slug ? 'bg-primary text-primary-foreground shadow-soft' : 'bg-card text-muted-foreground hover:bg-secondary hover:text-foreground'; ?>"
						data-filter="<?php echo esc_attr( $slug ); ?>"
					>
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php if ( empty( $gallery_items ) ) : ?>
				<div class="bws-gallery-empty card-warm p-8 text-center mb-8">
					<svg class="w-12 h-12 text-muted-foreground/40 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4 4 4 4-4 4 4V6a2 2 0 00-2-2H6a2 2 0 00-2 2v10z" />
					</svg>
					<h3 class="font-display text-xl text-foreground mb-2">Dodaj zdjęcia do galerii</h3>
					<p class="text-muted-foreground">
						Użyj typu wpisu „Galeria” i przypisz kategorie (Salon, Kuchnia, Pokoje, Łazienki, Altana, Okolica). Filtr „Taras (wkrótce)” wyświetla się zawsze jako placeholder.
					</p>
				</div>
			<?php endif; ?>

			<div class="bws-gallery-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
				<?php foreach ( $gallery_items as $item ) : ?>
					<button
						class="bws-gallery-item group relative aspect-[4/3] overflow-hidden rounded-2xl card-warm cursor-pointer"
						data-categories="<?php echo esc_attr( implode( ',', $item['categories'] ) ); ?>"
						data-src="<?php echo esc_url( $item['src'] ); ?>"
						data-caption="<?php echo esc_attr( $item['caption'] ); ?>"
						data-alt="<?php echo esc_attr( $item['alt'] ); ?>"
					>
						<img
							src="<?php echo esc_url( $item['src'] ); ?>"
							alt="<?php echo esc_attr( $item['alt'] ); ?>"
							class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
						/>
						<div class="absolute inset-0 bg-gradient-to-t from-foreground/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
						<div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
							<p class="text-primary-foreground text-sm font-medium">
								<?php echo esc_html( $item['caption'] ); ?>
							</p>
						</div>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="bws-taras-placeholder card-warm p-12 text-center mt-4 hidden">
				<svg class="w-16 h-16 text-muted-foreground/30 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
					<circle cx="12" cy="12" r="3" stroke-width="2" />
					<path stroke-width="2" d="M3 5h18M3 19h18M5 12h2m10 0h2" />
				</svg>
				<h3 class="font-display text-xl text-foreground mb-2">
					Duży taras — zdjęcia wkrótce
				</h3>
				<p class="text-muted-foreground">
					Aktualizujemy galerię. Wkrótce dodamy zdjęcia przestronnego tarasu.
				</p>
			</div>

			<div class="bws-lightbox fixed inset-0 z-[100] bg-foreground/95 flex items-center justify-center p-4 hidden">
				<button class="bws-lightbox-close absolute top-4 right-4 p-2 text-primary-foreground hover:text-primary transition-colors">
					<svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
				<div class="max-w-5xl max-h-[90vh] relative">
					<img class="bws-lightbox-image max-w-full max-h-[85vh] object-contain rounded-lg" src="" alt="" />
					<p class="bws-lightbox-caption text-center text-primary-foreground/80 mt-4 text-lg"></p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-padding">
		<div class="container-narrow mx-auto">
			<div class="card-warm overflow-hidden">
				<div class="grid md:grid-cols-2 gap-0">
					<div class="relative aspect-[4/3] md:aspect-auto">
						<img
							src="<?php echo esc_url( BWS_THEME_URI . '/assets/gazebo-dog-DEuZX4zu.jpg' ); ?>"
							alt="Pies w altanie"
							class="w-full h-full object-cover"
						/>
					</div>
					<div class="p-8 md:p-12 flex flex-col justify-center">
						<div class="flex items-center gap-3 mb-4">
							<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
								<svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12c0-3 2-5 4-5s4 2 4 5-2 5-4 5-4-2-4-5zm16 0c0-3-2-5-4-5s-4 2-4 5 2 5 4 5 4-2 4-5z" />
								</svg>
							</div>
							<svg class="w-5 h-5 text-destructive" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
								<path d="M12 21s-6.4-4.35-9.33-9.1C.9 9.45 2.46 4.5 7.2 4.5c2.07 0 3.36 1.3 4.8 3 1.44-1.7 2.73-3 4.8-3 4.74 0 6.3 4.95 4.53 7.4C18.4 16.65 12 21 12 21Z" />
							</svg>
						</div>
						<h2 class="font-display text-2xl md:text-3xl text-foreground mb-4">
							Zwierzęta mile widziane
						</h2>
						<p class="text-lg text-muted-foreground mb-4">
							<?php echo wp_kses_post( $animals_text ); ?>
						</p>
						<p class="text-muted-foreground">
							Rozumiemy, że zwierzak to członek rodziny. U nas Twój pupil może cieszyć się
							przestrzenią ogrodu i wspólnymi spacerami po bieszczadzkich szlakach.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="cennik" class="section-padding bg-cream">
		<div class="container-narrow mx-auto">
			<div class="text-center mb-12">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Cennik i zasady
				</h2>
			</div>

			<div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
				<div class="card-warm p-8 text-center relative overflow-hidden">
					<div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-primary to-honey-dark"></div>

					<div class="mb-6">
						<span class="text-muted-foreground text-lg">cena za dobę</span>
						<div class="flex items-baseline justify-center gap-1 mt-2">
							<span class="font-display text-5xl md:text-6xl text-foreground"><?php echo esc_html( $price_number ); ?></span>
							<span class="text-2xl text-muted-foreground"><?php echo esc_html( $price_suffix ? $price_suffix : 'zł / doba' ); ?></span>
						</div>
						<p class="text-muted-foreground mt-2">za całą połówkę domu</p>
					</div>

					<?php
					$included = array(
						'Wi-Fi',
						'Parking',
						'Pościel i ręczniki',
						'Drewno do kominka',
						'Środki czystości',
					);
					?>

					<div class="border-t border-border pt-6 mb-6">
						<p class="font-medium text-foreground mb-4">W cenie:</p>
						<ul class="space-y-2">
							<?php foreach ( $included as $item ) : ?>
								<li class="flex items-center gap-2 text-muted-foreground">
									<svg class="w-5 h-5 text-forest shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
									</svg>
									<?php echo esc_html( $item ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="border-t border-border pt-6">
						<p class="text-foreground mb-2">
							<strong>Pojemność:</strong> do 5 osób
						</p>
						<p class="text-muted-foreground text-sm">
							+ 2 osoby na narożniku w salonie
						</p>
					</div>
				</div>

				<div class="card-warm p-8">
					<div class="flex items-center gap-3 mb-6">
						<svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856C18.403 19 19 18.403 19 17.778V6.222C19 5.597 18.403 5 17.778 5H6.222C5.597 5 5 5.597 5 6.222v11.556C5 18.403 5.597 19 6.222 19z" />
						</svg>
						<h3 class="font-display text-xl text-foreground">Zasady rezerwacji</h3>
					</div>

					<?php
					$rules = array(
						'Rezerwacja tylko przez telefon, SMS lub WhatsApp',
						'Zaliczka przy rezerwacji',
						$rules_text,
					);
					?>

					<ul class="space-y-4 mb-8">
						<?php foreach ( $rules as $rule ) : ?>
							<li class="flex items-start gap-3 text-muted-foreground">
								<span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 shrink-0"></span>
								<?php echo wp_kses_post( $rule ); ?>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="bg-secondary/50 rounded-xl p-4 mb-6">
						<p class="text-sm text-muted-foreground">
							<strong class="text-foreground">Nie używamy Booking ani Airbnb.</strong>
							Kontaktuj się z nami bezpośrednio — odpowiadamy szybko!
						</p>
					</div>

					<a class="btn-honey w-full inline-flex items-center justify-center" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
						<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.08 4.18 2 2 0 014.06 2h3a2 2 0 012 1.72c.12.86.37 1.7.72 2.49a2 2 0 01-.45 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.79.35 1.63.6 2.49.72A2 2 0 0122 16.92z" />
						</svg>
						Zadzwoń i zarezerwuj
					</a>
				</div>
			</div>
		</div>
	</section>
	<section id="lokalizacja" class="section-padding">
		<div class="container-narrow mx-auto">
			<div class="text-center mb-12">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Lokalizacja
				</h2>
				<p class="text-muted-foreground text-lg max-w-2xl mx-auto">
					Spokojna okolica i świetna baza na szlaki
				</p>
			</div>

			<div class="card-warm overflow-hidden">
				<div class="grid md:grid-cols-2">
					<div class="relative aspect-[4/3] md:aspect-auto bg-secondary">
						<iframe
							src="<?php echo esc_url( $map_embed_src ); ?>"
							width="100%"
							height="100%"
							style="border:0; min-height:300px;"
							allowfullscreen
							loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"
							title="Mapa lokalizacji"
							class="absolute inset-0"
						></iframe>
					</div>

					<div class="p-8 md:p-12 flex flex-col justify-center">
						<div class="flex items-start gap-4 mb-6">
							<div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
								<svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4.35 8-11a8 8 0 10-16 0c0 6.65 8 11 8 11z" />
								</svg>
							</div>
							<div>
								<h3 class="font-display text-xl text-foreground mb-1">
									<?php echo esc_html( $address ); ?>
								</h3>
								<p class="text-muted-foreground">
									Bieszczady, województwo podkarpackie
								</p>
							</div>
						</div>

						<div class="space-y-4 text-muted-foreground mb-8">
							<?php echo wpautop( wp_kses_post( $location_desc ) ); ?>
							<p>Maksymalnie 5 osób + 2 na narożniku w salonie.</p>
						</div>

						<a class="btn-outline-warm w-fit inline-flex items-center" href="<?php echo esc_url( $maps_link ); ?>" target="_blank" rel="noopener noreferrer">
							<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
							Otwórz w Google Maps
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="kontakt" class="section-padding bg-cream">
		<div class="container-narrow mx-auto">
			<div class="text-center mb-12">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Sprawdź dostępność
				</h2>
				<p class="text-muted-foreground text-lg max-w-2xl mx-auto">
					Napisz ile osób i czy przyjeżdżacie z pupilem — odpowiemy z potwierdzeniem dostępności
				</p>
			</div>

			<?php if ( '1' === $sent_status || '0' === $sent_status ) : ?>
				<div class="card-warm p-4 mb-8 <?php echo '1' === $sent_status ? 'border-forest/40 bg-secondary/60' : 'border-destructive/40 bg-destructive/10'; ?>">
					<p class="<?php echo '1' === $sent_status ? 'text-forest' : 'text-destructive'; ?> font-medium">
						<?php echo '1' === $sent_status ? 'Dziękujemy! Wiadomość została wysłana. Odezwę się najszybciej, jak to możliwe.' : 'Ups! Coś poszło nie tak. Spróbuj ponownie lub zadzwoń.'; ?>
					</p>
				</div>
			<?php endif; ?>

			<div class="grid lg:grid-cols-5 gap-8">
				<div class="lg:col-span-3 card-warm p-6 md:p-8">
					<form action="<?php echo esc_url( get_permalink() ); ?>" method="post" class="space-y-6">
						<div class="grid sm:grid-cols-2 gap-4">
							<div class="space-y-2">
								<label class="flex items-center gap-2 font-medium">
									<svg class="w-4 h-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.88 6.197 9 9 0 015.12 17.804z" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
									</svg>
									Imię
								</label>
								<input class="w-full rounded-md border border-border bg-background px-3 py-2" type="text" name="bws_name" placeholder="Jan" required />
							</div>
							<div class="space-y-2">
								<label class="flex items-center gap-2 font-medium">
									<svg class="w-4 h-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.08 4.18 2 2 0 014.06 2h3a2 2 0 012 1.72c.12.86.37 1.7.72 2.49a2 2 0 01-.45 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.79.35 1.63.6 2.49.72A2 2 0 0122 16.92z" />
									</svg>
									Telefon
								</label>
								<input class="w-full rounded-md border border-border bg-background px-3 py-2" type="tel" name="bws_phone" placeholder="+48 123 456 789" required />
							</div>
						</div>

						<div class="grid sm:grid-cols-2 gap-4">
							<div class="space-y-2">
								<label class="flex items-center gap-2 font-medium">
									<svg class="w-4 h-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
									</svg>
									Od
								</label>
								<input class="w-full rounded-md border border-border bg-background px-3 py-2" type="date" name="bws_date_from" required />
							</div>
							<div class="space-y-2">
								<label class="flex items-center gap-2 font-medium">
									<svg class="w-4 h-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
									</svg>
									Do
								</label>
								<input class="w-full rounded-md border border-border bg-background px-3 py-2" type="date" name="bws_date_to" required />
							</div>
						</div>

						<div class="grid sm:grid-cols-2 gap-4 items-end">
							<div class="space-y-2">
								<label class="flex items-center gap-2 font-medium">
									<svg class="w-4 h-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-4 4.01 4.01 0 00-3 1.35" />
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20H4v-2a4 4 0 015-4 4.01 4.01 0 013 1.35" />
										<circle cx="9" cy="7" r="4" stroke-width="2" />
										<circle cx="17" cy="7" r="4" stroke-width="2" />
									</svg>
									Liczba osób
								</label>
								<input class="w-full rounded-md border border-border bg-background px-3 py-2" type="number" min="1" max="7" name="bws_guests" placeholder="np. 4" required />
							</div>
							<label class="flex items-center gap-3 h-10 cursor-pointer">
								<input type="checkbox" name="bws_pet" class="h-4 w-4 rounded border-border text-primary focus:ring-primary" />
								<span class="flex items-center gap-2">
									<svg class="w-4 h-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12c0-3 2-5 4-5s4 2 4 5-2 5-4 5-4-2-4-5zm16 0c0-3-2-5-4-5s-4 2-4 5 2 5 4 5 4-2 4-5z" />
									</svg>
									Przyjeżdżam ze zwierzęciem
								</span>
							</label>
						</div>

						<div class="space-y-2">
							<label class="font-medium">Wiadomość (opcjonalnie)</label>
							<textarea class="w-full rounded-md border border-border bg-background px-3 py-2 min-h-[100px]" name="bws_message" placeholder="Dodatkowe pytania lub informacje..."></textarea>
						</div>

						<input type="text" name="bws_hp" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />
						<?php wp_nonce_field( 'bws_contact_form', 'bws_contact_nonce' ); ?>

						<button type="submit" class="btn-honey w-full text-base py-6 inline-flex items-center justify-center">
							<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2L11 13" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2l-7 20-4-9-9-4 20-7z" />
							</svg>
							Wyślij zapytanie
						</button>
					</form>
				</div>

				<div class="lg:col-span-2 space-y-6">
					<div class="card-warm p-6 md:p-8 text-center">
						<p class="text-muted-foreground mb-2">Zadzwoń lub napisz</p>
						<a
							href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"
							class="font-display text-2xl md:text-3xl text-foreground hover:text-primary transition-colors block mb-6"
						>
							<?php echo esc_html( $phone ); ?>
						</a>

						<div class="space-y-3">
							<a class="btn-honey w-full inline-flex items-center justify-center" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
								<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.08 4.18 2 2 0 014.06 2h3a2 2 0 012 1.72c.12.86.37 1.7.72 2.49a2 2 0 01-.45 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.79.35 1.63.6 2.49.72A2 2 0 0122 16.92z" />
								</svg>
								Zadzwoń
							</a>
							<a class="btn-outline-warm w-full inline-flex items-center justify-center" href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $whatsapp ) ); ?>" target="_blank" rel="noopener noreferrer">
								<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor">
									<path d="M16 3a13 13 0 00-11 19.94L3 29l6.2-1.94A13 13 0 1016 3zm0 2a11 11 0 110 22 10.9 10.9 0 01-5.1-1.27l-.37-.2-3.65 1.15 1.18-3.55-.24-.37A11 11 0 0116 5zm-2.25 5c-.21 0-.53.08-.85.4-.3.3-.9.88-.9 2.12 0 1.24.92 2.44 1.05 2.6.12.16 1.8 2.88 4.3 3.9 2.13.85 2.57.7 3.04.66.47-.05 1.5-.61 1.71-1.2.21-.6.21-1.11.15-1.21-.06-.11-.24-.18-.5-.3-.27-.1-1.59-.78-1.84-.87-.24-.1-.4-.15-.58.15-.18.3-.69.87-.84 1.05-.16.16-.31.18-.58.06-.27-.11-1.14-.42-2.17-1.34-.8-.71-1.34-1.6-1.5-1.86-.16-.27-.02-.41.1-.53.1-.1.24-.27.36-.4.12-.12.16-.2.25-.34.08-.15.04-.28-.02-.4-.05-.12-.58-1.4-.8-1.9-.21-.5-.43-.43-.58-.44z"/>
								</svg>
								WhatsApp
							</a>
							<a class="w-full inline-flex items-center justify-center border-2 border-secondary text-secondary-foreground rounded-xl px-6 py-3 hover:bg-secondary transition-colors" href="sms:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
								<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
								</svg>
								SMS
							</a>
						</div>
					</div>

					<div class="bg-secondary/50 rounded-xl p-6 text-center">
						<p class="text-sm text-muted-foreground">
							Odpowiadamy zazwyczaj w ciągu kilku godzin.
							Jeśli zależy Ci na czasie — zadzwoń!
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-padding">
		<div class="container-narrow mx-auto max-w-3xl">
			<div class="text-center mb-12">
				<h2 class="font-display text-3xl md:text-4xl text-foreground mb-4">
					Często zadawane pytania
				</h2>
			</div>

			<div class="space-y-4">
				<?php
				$faqs = array(
					array(
						'q' => 'Czy zwierzęta są akceptowane?',
						'a' => 'Tak! Zwierzęta są u nas mile widziane. Rozumiemy, że pupil to członek rodziny. Prosimy tylko o informację przy rezerwacji.',
					),
					array(
						'q' => 'Ile osób może nocować?',
						'a' => 'Dom pomieści komfortowo do 5 osób (2 pokoje na piętrze). Dodatkowo 2 osoby mogą spać na rozkładanym narożniku w salonie — razem max. 7 osób.',
					),
					array(
						'q' => 'Czy jest Wi-Fi i parking?',
						'a' => 'Tak, bezprzewodowy internet oraz prywatne miejsce parkingowe są w cenie pobytu.',
					),
					array(
						'q' => 'Czy są 2 łazienki?',
						'a' => 'Tak, w domu znajdują się 2 pełne łazienki z prysznicem i ogrzewaniem. Dla rodziny z dziećmi to ogromna wygoda!',
					),
					array(
						'q' => 'Jak zarezerwować pobyt?',
						'a' => 'Rezerwujemy tylko bezpośrednio — przez telefon, SMS lub WhatsApp. Nie korzystamy z Booking ani Airbnb. Zadzwoń lub napisz na ' . esc_html( $phone ) . '.',
					),
				);
				foreach ( $faqs as $faq ) :
					?>
					<div class="card-warm px-6 py-5 border-0">
						<button class="bws-accordion-trigger w-full flex items-center justify-between text-left font-display text-lg hover:text-primary transition-colors" type="button" data-accordion-toggle>
							<span><?php echo esc_html( $faq['q'] ); ?></span>
							<svg class="w-5 h-5 text-muted-foreground transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
							</svg>
						</button>
						<div class="bws-accordion-content text-muted-foreground pt-3 text-base hidden">
							<?php echo wp_kses_post( $faq['a'] ); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
$schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'LodgingBusiness',
	'name'        => $brand,
	'image'       => $hero_image_url,
	'url'         => home_url(),
	'address'     => array(
		'@type'           => 'PostalAddress',
		'streetAddress'   => $address,
		'addressLocality' => 'Bieszczady',
		'addressCountry'  => 'PL',
	),
	'telephone'   => $phone,
	'priceRange'  => $price_text,
	'description' => wp_strip_all_tags( $hero_lead ),
);
?>
<script type="application/ld+json">
<?php echo wp_json_encode( $schema ); ?>
</script>

<?php
get_footer();
