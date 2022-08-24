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
				
				<p>This is single.php. This template has all of the fun things you may need for blog like features.</p>
						 
				<?php

					if ( has_post_thumbnail() ) :
						echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
					endif;
				 
				 	the_content();
					
				?> 
				 
				<hr>
				
				<?php
				
					$category_list = get_the_category_list(', ');
					$tag_list = get_the_tag_list( '', ', ');

					if ( '' !== $tag_list ) {
						$utility_text = 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
					} elseif ( '' !== $category_list ) {
						$utility_text = 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
					} else {
						$utility_text = 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
					}
					
					printf(
						$utility_text,
						$category_list,
						$tag_list,
						esc_url( get_the_permalink() ),
						the_title_attribute( 'echo=0' ),
						get_the_author(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
					);
				?>
				
				<hr> 						 
				
			</div>

			<?php					 
				
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;				

		endwhile;
	endif;

	wp_reset_postdata(); // end of the loop.
 

	$count_posts = wp_count_posts();

	if ( $count_posts->publish > '1' ) : ?>
		<div class="post-navigation d-flex justify-content-between">
			<div><?php previous_post_link( '%link', '<span aria-hidden="true">&larr;</span> ' . __( 'Previous Post', 'hanson-theme' ) ); ?></div>
			<div><?php next_post_link( '%link', __( 'Next Post', 'hanson-theme' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?></div>
		</div><!-- /.post-navigation -->
	<?php 

	endif; 
	
	
	get_footer(); 

?>