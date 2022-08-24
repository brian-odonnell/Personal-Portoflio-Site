<?php
/**
 * Nav menus
 *
 */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'top-menu' => 'Top Navigation Menu',
		'main-menu' => 'Main Navigation Menu',		
		'footer-menu' => 'Footer Menu'
	) );
}
