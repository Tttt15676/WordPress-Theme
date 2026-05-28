<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Custom_Gemini_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<span class="copyright">
				&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
			</span>
			<span class="theme-info">
				<?php
				/* translators: %s: Theme name */
				printf( esc_html__( 'Theme: %s', 'custom-gemini-theme' ), 'Custom Gemini Theme' );
				?>
			</span>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
