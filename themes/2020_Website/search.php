<?php
/**
 * The Template for displaying Search Results pages.
 */

	get_header();


	if ( have_posts() ) : ?>
		
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'hanson-theme' ), get_search_query() ); ?></h1>

		<?php
	
		get_template_part( 'archive', 'loop' );
	
	else : ?>
	
		<h1 class="entry-title">Nothing Found</h1>
				
		<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		
		<?php 

		get_search_form();  
			
	endif;
		
	wp_reset_postdata(); // end of the loop.
	
	
	get_footer(); 

?>