<?php
/**
 * The Template for displaying Author pages.
 */

	get_header();


	if ( have_posts() ) :
			
		/* Queue the first post, that way we know
		* what author we're dealing with (if that is the case).
		*
		* We reset this later so we can run the loop
		* properly with a call to rewind_posts().
		*/
		the_post();

		?>
		
		<h1>Author Archives: <?php echo ( get_the_author() ); ?></h1>
	
		<?php
		/**
		 * Author description
		 */

		if ( get_the_author_meta( 'description' ) ) : ?>
			 
			<div class="row">

				<div class="col-sm-12">
					<h2>
						<?php
							echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'hanson_theme_author_bio_avatar_size', 48 ) ) . '&nbsp;';
							printf( 'About %s', get_the_author() );
						?>
					</h2>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div>
				
			</div>			 

			<hr>

		<?php endif; 
		
		/* Since we called the_post() above, we need to
		* rewind the loop back to the beginning that way
		* we can run the loop properly, in full.
		*/
		rewind_posts();
		
		get_template_part( 'archive', 'loop' );
		
	else :
		
		// 404
		get_template_part( 'content', 'none' );

	endif;

	wp_reset_postdata(); // end of the loop.

	
	get_footer(); 

?>