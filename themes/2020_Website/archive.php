<?php
/**
 * The Template for displaying Archive pages.
 */

	get_header();


	if ( have_posts() ) : ?>
 
		<h1>
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'hanson-theme' ), '<span>' . get_the_date() . '</span>' ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s', 'hanson-theme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'hanson-theme' ) ) . '</span>' ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s', 'hanson-theme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'hanson-theme' ) ) . '</span>' ); ?>
			<?php else : ?>
				<?php 
					$postType = get_queried_object();
					if ( $postType ) {
						echo esc_html($postType->labels->singular_name); 
					} else {
						echo 'Archives';
					}
				?>
			<?php endif; ?>
		</h1>

		<p>This is archive.php</p> 

		<?php
		get_template_part( 'archive', 'loop' );
	
	else :
		
		// 404
		get_template_part( 'content', 'none' );
		
	endif;
	
	wp_reset_postdata(); // end of the loop.
	
	
	get_footer(); 

?>