<?php
/**
 * Footer template.
 *
 * @package blizniak-smerek
 */

$brand   = bws_get_mod( 'brand_name', 'Bliźniak w Smereku' );
$address = bws_get_mod( 'address', 'Smerek 79, Bieszczady' );
$phone   = bws_get_mod( 'phone', '+48 514 995 497' );
$whats   = bws_get_mod( 'whatsapp', '+48 514 995 497' );
?>

<footer class="bg-foreground text-primary-foreground py-12">
	<div class="container-narrow mx-auto px-4 text-center">
		<h3 class="font-display text-2xl mb-2"><?php echo esc_html( $brand ); ?></h3>
		<p class="text-primary-foreground/70 mb-4">
			<?php echo esc_html( $address ); ?>
		</p>
		<p class="text-primary-foreground/70 mb-6">
			<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>" class="hover:text-primary transition-colors">
				<?php echo esc_html( $phone ); ?>
			</a>
		</p>
		<div class="flex items-center justify-center gap-1 text-sm text-primary-foreground/50">
			<span>Stworzone z</span>
			<svg class="w-4 h-4 text-destructive fill-destructive" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path d="M12 21s-6.4-4.35-9.33-9.1C.9 9.45 2.46 4.5 7.2 4.5c2.07 0 3.36 1.3 4.8 3 1.44-1.7 2.73-3 4.8-3 4.74 0 6.3 4.95 4.53 7.4C18.4 16.65 12 21 12 21Z" />
			</svg>
			<span>w Bieszczadach</span>
		</div>
	</div>
</footer>

<?php if ( is_front_page() ) : ?>
	<div class="bws-mobile-bar fixed bottom-0 left-0 right-0 z-50 lg:hidden bg-card/95 backdrop-blur-md border-t border-border shadow-elevated">
		<div class="grid grid-cols-3 divide-x divide-border">
			<a
				href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"
				class="flex flex-col items-center justify-center gap-1 py-3 text-foreground hover:bg-muted transition-colors"
			>
				<svg class="w-5 h-5 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.08 4.18 2 2 0 014.06 2h3a2 2 0 012 1.72c.12.86.37 1.7.72 2.49a2 2 0 01-.45 2.11l-1.27 1.27a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.79.35 1.63.6 2.49.72A2 2 0 0122 16.92z" />
				</svg>
				<span class="text-xs font-medium">Zadzwoń</span>
			</a>
			<a
				href="https://wa.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $whats ) ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				class="flex flex-col items-center justify-center gap-1 py-3 text-foreground hover:bg-muted transition-colors"
			>
				<svg class="w-5 h-5 text-forest" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor">
					<path d="M16 3a13 13 0 00-11 19.94L3 29l6.2-1.94A13 13 0 1016 3zm0 2a11 11 0 110 22 10.9 10.9 0 01-5.1-1.27l-.37-.2-3.65 1.15 1.18-3.55-.24-.37A11 11 0 0116 5zm-2.25 5c-.21 0-.53.08-.85.4-.3.3-.9.88-.9 2.12 0 1.24.92 2.44 1.05 2.6.12.16 1.8 2.88 4.3 3.9 2.13.85 2.57.7 3.04.66.47-.05 1.5-.61 1.71-1.2.21-.6.21-1.11.15-1.21-.06-.11-.24-.18-.5-.3-.27-.1-1.59-.78-1.84-.87-.24-.1-.4-.15-.58.15-.18.3-.69.87-.84 1.05-.16.16-.31.18-.58.06-.27-.11-1.14-.42-2.17-1.34-.8-.71-1.34-1.6-1.5-1.86-.16-.27-.02-.41.1-.53.1-.1.24-.27.36-.4.12-.12.16-.2.25-.34.08-.15.04-.28-.02-.4-.05-.12-.58-1.4-.8-1.9-.21-.5-.43-.43-.58-.44z"/>
				</svg>
				<span class="text-xs font-medium">WhatsApp</span>
			</a>
			<a
				href="sms:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"
				class="flex flex-col items-center justify-center gap-1 py-3 text-foreground hover:bg-muted transition-colors"
			>
				<svg class="w-5 h-5 text-honey" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
				</svg>
				<span class="text-xs font-medium">SMS</span>
			</a>
		</div>
	</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
