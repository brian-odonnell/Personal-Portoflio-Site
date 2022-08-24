<?php
/**
 * The Template for displaying all single posts.
 */

	get_header();
 
 
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<h1><?php the_title(); ?></h1>
				
				<p>This is single-news.php.  This is a stripped down template for a CPT. See single.php if you want blog features.</p>
						
				<?php the_content(); ?>
				
			</div>

			<?php
		endwhile;
	endif;
	
	wp_reset_postdata(); // end of the loop.


	get_footer(); 

?>