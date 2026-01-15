<?php
/**
 * Fallback template.
 *
 * @package blizniak-smerek
 */

get_header();
?>

<main class="section-padding">
	<div class="container-narrow mx-auto">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'card-warm p-6' ); ?>>
					<h1 class="font-display text-3xl mb-4"><?php the_title(); ?></h1>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="card-warm p-6 text-center">
				<h2 class="font-display text-2xl mb-2">Nic tu jeszcze nie ma</h2>
				<p class="text-muted-foreground">Ustaw statyczną stronę główną lub dodaj treść.</p>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
