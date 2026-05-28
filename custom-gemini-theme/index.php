<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Custom_Gemini_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="page-header">
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

		<?php
		// Start the Loop.
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post' ); ?>>
				
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php
							the_post_thumbnail(
								'large',
								array(
									'alt' => the_title_attribute(
										array(
											'echo' => false,
										)
									),
								)
							);
							?>
						</a>
					</div>
				<?php endif; ?>

				<header class="entry-header">
					<?php
					the_title(
						sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h2>'
					);
					?>
				</header>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>

			</article>
			<?php
		endwhile;

		// Standard posts navigation.
		the_posts_navigation(
			array(
				'prev_text' => esc_html__( 'Older posts', 'custom-gemini-theme' ),
				'next_text' => esc_html__( 'Newer posts', 'custom-gemini-theme' ),
			)
		);

	else :
		?>
		<section class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'custom-gemini-theme' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'custom-gemini-theme' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>
		<?php
	endif;
	?>
</main>

<?php
get_footer();
