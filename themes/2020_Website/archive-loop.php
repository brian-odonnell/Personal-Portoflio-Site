<?php
/**
 * The template for displaying the archive loop
 */
?>

<?php hanson_theme_content_nav( 'nav-above' ); ?>

<p>This is archive-loop.php</p>

<div class="row">
	<?php
		/* Start the Loop */
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
			 
				?> 

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6' ); ?>>
					<div class="card mb-4">
						<div class="card-body">

							<h2 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php printf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

							<?php if ( 'post' === get_post_type() ) : ?>
								<div class="card-text">
									<?php								 

										$num_comments = get_comments_number();
										if ( comments_open() && $num_comments >= 1 ) :
											echo ' <a href="' . get_comments_link() . '" class="badge badge-pill badge-secondary float-right" title="' . 

											esc_attr( sprintf( _n( '%s Comment', '%s Comments', $num_comments ), $num_comments ) ) 

											. '">' . $num_comments . '</a>';
										endif;

									?>
								</div>
							<?php endif; ?>

							<div class="card-text">
								<?php
									if ( has_post_thumbnail() ) :
										echo '<div class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</div>';
									endif;
								  
									the_excerpt(); 
								?> 
							</div>

							<a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">more</a>

						</div> 
 
					</div>
				</article>

			<?php 	
			endwhile;
		endif;

		wp_reset_postdata(); // end of the loop.
	?>
</div>

<?php hanson_theme_content_nav( 'nav-below' ); ?>