<?php
/**
 * The Template for displaying Category Archive pages.
 */

	get_header();


	if ( have_posts() ) : ?>		
	 
		<h1>Category Archives: <?php echo single_cat_title() ?></h1>
		
		<?php

			$category_description = category_description();
		
			if ( ! empty( $category_description ) ) :
				echo ('<p>' . $category_description . '</p>');
			endif;
		 
			get_template_part( 'archive', 'loop' );
	
	else :

		// 404
		get_template_part( 'content', 'none' );

	endif;

	wp_reset_postdata(); // end of the loop.


	get_footer(); 

?>