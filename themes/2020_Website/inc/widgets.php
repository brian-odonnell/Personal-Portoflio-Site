<?php
/**
 * Init Widget areas
 *
 */
function hanson_theme_widgets_init() {
	// Area 1
	register_sidebar( array(
		'name' => 'Sidebar Widget Area',
		'id' => 'sidebar_widget_area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) ); 

	// Area 3
	register_sidebar( array(
		'name' => 'Footer Widget Area',
		'id' => 'footer_widget_area',
		'before_widget' => '<div class="footer_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'hanson_theme_widgets_init' );
