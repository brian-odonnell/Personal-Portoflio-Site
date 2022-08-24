<?php
/**
 * The Template used to display Tag Archive pages
 */

	get_header();
	

	if ( have_posts() ) : ?>
	 
		<h1><?php echo( 'Tag: ' . single_tag_title( '', false ) ); ?></h1>

		<?php
		
		$tag_description = tag_description();
		
		if ( ! empty( $tag_description ) ) :
			echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
		endif;
	 
		get_template_part( 'archive', 'loop' );
 	
 	else : 
		// 404
		get_template_part( 'content', 'none' );
	
	endif;

	wp_reset_postdata(); // end of the loop.


	get_footer(); 

?>