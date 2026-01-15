<?php
/**
 * Theme header.
 *
 * @package blizniak-smerek
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-background text-foreground antialiased' ); ?>>
<?php wp_body_open(); ?>

<div id="root" class="hidden" aria-hidden="true"></div>

<?php
$brand = bws_get_mod( 'brand_name', 'Bliźniak w Smereku' );
$phone = bws_get_mod( 'phone', '+48 514 995 497' );

$nav_items = array(
	array(
		'label' => 'Udogodnienia',
		'href'  => '#udogodnienia',
	),
	array(
		'label' => 'Galeria',
		'href'  => '#galeria',
	),
	array(
		'label' => 'Lokalizacja',
		'href'  => '#lokalizacja',
	),
	array(
		'label' => 'Cennik',
		'href'  => '#cennik',
	),
	array(
		'label' => 'Kontakt',
		'href'  => '#kontakt',
	),
);
?>

<header class="bws-header fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent py-5">
	<div class="container-narrow mx-auto px-4 flex items-center justify-between">
		<a
			href="<?php echo esc_url( home_url( '/' ) ); ?>"
			class="bws-brand font-display text-xl md:text-2xl font-semibold transition-colors text-primary-foreground"
		>
			<?php echo esc_html( $brand ); ?>
		</a>

		<nav class="hidden lg:flex items-center gap-6">
			<?php foreach ( $nav_items as $item ) : ?>
				<a
					href="<?php echo esc_attr( $item['href'] ); ?>"
					class="bws-nav-link text-sm font-medium transition-colors hover:text-primary text-primary-foreground/90"
					data-scroll-link
				>
					<?php echo esc_html( $item['label'] ); ?>
				</a>
			<?php endforeach; ?>
		</nav>

		<div class="hidden lg:flex items-center gap-3">
			<a class="btn-honey inline-flex items-center" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
				<svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.08 4.18 2 2 0 014.06 2h3a2 2 0 012 1.72c.12.86.37 1.7.72 2.49a2 2 0 01-.45 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.79.35 1.63.6 2.49.72A2 2 0 0122 16.92z" />
				</svg>
				Zadzwoń
			</a>
		</div>

		<button
			type="button"
			class="bws-menu-toggle lg:hidden p-2 rounded-lg transition-colors text-primary-foreground hover:bg-primary-foreground/10"
			aria-expanded="false"
			aria-controls="bws-mobile-menu"
		>
			<span class="sr-only">Menu</span>
			<svg class="bws-icon-open w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
			</svg>
			<svg class="bws-icon-close w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>
	</div>

	<div
		id="bws-mobile-menu"
		class="bws-mobile-menu hidden lg:hidden absolute top-full left-0 right-0 bg-card shadow-elevated border-b border-border"
	>
		<nav class="container-narrow mx-auto px-4 py-4 flex flex-col gap-2">
			<?php foreach ( $nav_items as $item ) : ?>
				<a
					href="<?php echo esc_attr( $item['href'] ); ?>"
					class="bws-nav-link block text-foreground font-medium py-3 px-4 rounded-xl hover:bg-muted transition-colors"
					data-scroll-link
				>
					<?php echo esc_html( $item['label'] ); ?>
				</a>
			<?php endforeach; ?>
		</nav>
	</div>
</header>
