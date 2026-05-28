<?php
/**
 * Custom Gemini Theme functions and definitions
 *
 * @package Custom_Gemini_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'custom_gemini_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function custom_gemini_setup() {
		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails (Featured Images)
		add_theme_support( 'post-thumbnails' );

		// Register a primary navigation menu
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'custom-gemini-theme' ),
			)
		);

		// Switch default core markup for search form, comment form, gallery, and caption to output valid HTML5
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'custom_gemini_setup' );

/**
 * Enqueue scripts and styles safely.
 */
function custom_gemini_scripts() {
	// Enqueue the primary stylesheet (style.css)
	wp_enqueue_style(
		'custom-gemini-style',
		get_stylesheet_uri(),
		array(),
		'1.0.0'
	);

	// Enqueue the primary JavaScript file
	wp_enqueue_script(
		'custom-gemini-script',
		get_theme_file_uri( '/assets/js/main.js' ),
		array(),
		'1.0.0',
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'custom_gemini_scripts' );
