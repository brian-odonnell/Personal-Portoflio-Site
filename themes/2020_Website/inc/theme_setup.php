<?php 
/**
 * General Theme Settings
 *
 */
if ( ! function_exists( 'hanson_theme_setup_theme' ) ) :
	function hanson_theme_setup_theme() {

		// Theme Support
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Date/Time Format
		$theme_dateformat = get_option( 'date_format' );
		$theme_timeformat = 'H:i';

		// Default Attachment Display Settings
		update_option( 'image_default_align', 'none' );
		update_option( 'image_default_link_type', 'none' );
		update_option( 'image_default_size', 'large' );

		// Custom CSS-Styles of Wordpress Gallery
		add_filter( 'use_default_gallery_style', '__return_false' );

	}
	add_action( 'after_setup_theme', 'hanson_theme_setup_theme' );
endif;


/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 *
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 */
		do_action( 'wp_body_open' );
	}
endif;


/**
 * Test if a page is a blog page
 * if ( is_blog() ) { ... }
 *
 */
function is_blog() {
	global $post;
	$posttype = get_post_type( $post );
	
	return ( ( is_archive() || is_author() || is_category() || is_single() || ( is_tag() && ( 'post' === $posttype ) ) ) ? true : false );
} 

/**
 * Responsive oEmbed filter: http://getbootstrap.com/components/#responsive-embed
 * Allow browsers to determine video or slideshow dimensions based on the width of 
 * their containing block by creating an intrinsic ratio that will properly 
 * scale on any device.
 */
function hanson_theme_oembed_filter( $html ) {
	$return = '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	return $return;
}
add_filter( 'embed_oembed_html', 'hanson_theme_oembed_filter', 10, 4 );