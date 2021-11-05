<?php
/**
 * Theme functions and definitions
 *
 * @package Gutener Education
 */

require get_stylesheet_directory() . '/inc/customizer/customizer.php';
require get_stylesheet_directory() . '/inc/customizer/loader.php';

if ( ! function_exists( 'gutener_education_enqueue_styles' ) ) :
	/**
	 @since Gutener Education 1.0.0
	 */
	function gutener_education_enqueue_styles() {
		wp_enqueue_style( 'gutener-education-style-parent', get_template_directory_uri() . '/style.css', array(
			'bootstrap',
			'slick',
			'slicknav',
			'slick-theme',
			'fontawesome',
			'gutener-blocks',
			'gutener-google-font'
		) );

		wp_enqueue_style( 'gutener-education-google-fonts', "https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap", false );
		wp_enqueue_style( 'gutener-education-google-fonts-two', "https://fonts.googleapis.com/css2?family=Anton&display=swap", false );
	}

endif;
add_action( 'wp_enqueue_scripts', 'gutener_education_enqueue_styles', 1 );

function gutener_education_setup() {
	remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'gutener_education_setup', 99 );

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );