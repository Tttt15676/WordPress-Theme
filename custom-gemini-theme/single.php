<?php
/**
 * The template for displaying all single posts
 *
 * @package Custom_Gemini_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<span class="posted-on">
						<?php echo esc_html( get_the_date() ); ?>
					</span>
					<span class="byline">
						<?php esc_html_e( 'by', 'custom-gemini-theme' ); ?> <?php the_author(); ?>
					</span>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			<?php endif; ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'custom-gemini-theme' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<footer class="entry-footer">
				<?php
				$custom_gemini_categories_list = get_the_category_list( ', ' );
				if ( $custom_gemini_categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'custom-gemini-theme' ) . '</span>', wp_kses_post( $custom_gemini_categories_list ) );
				}

				$custom_gemini_tags_list = get_the_tag_list( '', ', ' );
				if ( $custom_gemini_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'custom-gemini-theme' ) . '</span>', wp_kses_post( $custom_gemini_tags_list ) );
				}
				?>
			</footer>
		</article>

		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile;
	?>
</main>

<?php
get_footer();
