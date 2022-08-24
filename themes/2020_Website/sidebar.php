<?php
/**
 * Sidebar Template
 */

// If Blog landing, Single or Archive (Category, Tag, Author or a Date based page)
if ( is_active_sidebar( 'sidebar_widget_area' ) || is_home() || is_archive() || is_single() ) : ?>

	<div id="sidebar" class="col-sm-12 order-sm-last col-md-4 order-md-first">
		
		<?php if ( is_active_sidebar( 'sidebar_widget_area' ) ) : ?>

			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar_widget_area' ); ?>
			</div>
			
		<?php endif; ?>

		<?php if ( is_home() || is_archive() || is_single() ) : ?>
			  
			<h3>Recent Posts</h3>
			
			<?php
				$args = array(  
					'post_type' => get_post_type(),
					'post_status' => 'publish',
					'posts_per_page' => 5
				);
				$recentposts_query = new WP_Query(  $args );
				$output = '<ul class="recentposts">';
				$month_check = null;
				
				if ( $recentposts_query->have_posts() ) :
					
					while ( $recentposts_query->have_posts() ) :
						$recentposts_query->the_post();
						$output .= '<li>';
							// Show monthly archive and link to months
							$month = get_the_date( 'F, Y' );
							if ( $month !== $month_check ) :
								$output .= '<a href="' . get_month_link( get_the_date( 'Y' ), get_the_date( 'm' ) ) . '" title="' . get_the_date( 'F, Y' ) . '">' . $month . '</a>';
							endif;
							$month_check = $month;

						$output .= '<h4><a href="' . get_the_permalink() . '" title="' . sprintf( __( 'Permalink to %s', 'hanson-theme' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">' . get_the_title() . '</a></h4>';
						$output .= '</li>';
					endwhile;

				endif;

				wp_reset_postdata(); // end of the loop.

			$output .= '</ul>';
			
			echo $output; 

			//Begin category output
			$taxonomy_objects = get_object_taxonomies( get_post_type(), 'names' );

			if ( ! empty( $taxonomy_objects ) ) { ?>

				<h3>Categories</h3>

				<?php
			    $category = $taxonomy_objects[0]; 

				$terms = get_terms( array(
				    'taxonomy' => $category
				) ); 

				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				    
				    $term_list = '<ul class="term-archive">';
				    
				    foreach ( $terms as $term ) {					         
				        $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a></li>';
				    }

				    echo $term_list . '</ul>';
				}
			}?>
		
		<?php endif; ?>
		
	</div>

<?php endif; ?>