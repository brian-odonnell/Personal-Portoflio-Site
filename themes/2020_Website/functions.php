<?php

$theme_version = '1.0.0';

/**
 * INCLUDES
 */
$theme_setup = get_template_directory() . '/inc/theme_setup.php';
if ( is_readable( $theme_setup ) ) {
	require_once $theme_setup;
}

$widgets_setup = get_template_directory() . '/inc/widgets.php';
if ( is_readable( $widgets_setup ) ) {
	require_once $widgets_setup;
}

$menu_setup = get_template_directory() . '/inc/menus.php';
if ( is_readable( $menu_setup ) ) {
	require_once $menu_setup;
}

$custom_post_types = get_template_directory() . '/inc/post_types.php';
if ( is_readable( $custom_post_types ) ) {
	require_once $custom_post_types;
}

$custom_walker = get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
if ( is_readable( $custom_walker ) ) {
	require_once $custom_walker;
}

$acf_custom_blocks = get_template_directory() . '/inc/acf_custom_blocks.php';
if ( is_readable( $acf_custom_blocks ) ) {
	require_once $acf_custom_blocks;
}

/**
 * Loading All CSS Stylesheets and Javascript Files
 *
 * @since v1.0
 */
function hanson_theme_scripts_loader() {
	global $theme_version;

	// 1. Styles
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, $theme_version, 'all' );
	// wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', false, $theme_version, 'all' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/app.css', false, $theme_version, 'all' );
	wp_enqueue_style( 'mainMap', get_template_directory_uri() . '/assets/css/app.css.map', false, $theme_version, 'all' );



	// 2. Scripts

	// Slider not working (BS working?)
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), $theme_version, true );

	// Modal not working (BS not working?)
	// wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/bootstrap.js', false, $theme_version, true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/global.js', false, $theme_version, true );



	// 3. Comments script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hanson_theme_scripts_loader', 'wp_add_inline_script' );




//TODO: Not sure if we want to keep this or move it
//used in archive loop to go to older pages
if ( ! function_exists( 'hanson_theme_content_nav' ) ) :
	/**
	 * Display a navigation to next/previous pages when applicable
	 *
	 */
	function hanson_theme_content_nav( $nav_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<div id="<?php echo $nav_id; ?>" class="d-flex mb-4 justify-content-between">
				<div><?php next_posts_link( '<span aria-hidden="true">&larr;</span> ' . __( 'Older posts', 'hanson-theme' ) ); ?></div>
				<div><?php previous_posts_link( __( 'Newer posts', 'hanson-theme' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?></div>
			</div><!-- /.d-flex -->
		<?php
		else :
			echo '<div class="clearfix"></div>';
		endif;
	}
endif; // content navigation
//TODO: Not sure if we want to keep this or move it
//used in archive loop to go to older pages

// Custom Post Type Start
function create_posttype() {
	register_post_type( 'work',
		array(
			'labels' => array(
				'name' => __('Work'),
				'singular_name' => __('Work')
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'work'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor')
		)
	);

	register_post_type( 'photography',
		array(
			'labels' => array(
				'name' => __('Photography'),
				'singular_name' => __('Photography')
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'photography'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor')
		)
	);

	register_post_type( 'jobs',
	array(
		'labels' => array(
			'name' => __('Jobs'),
			'singular_name' => __('Jobs')
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'jobs'),
		'show_in_rest' => true,
		'supports' => array('title', 'editor')
	)
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
// Custom Post Type End
