<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index
 *
 */

	get_header();
 
?>

	<div class="row">		 

		<div class="col-md-12">

			<h1><?php single_post_title(); ?></h1>
			
			<p>This is index.php. I am the Blog template.</p>

			<?php
				get_template_part( 'archive', 'loop' );
			?>
		</div>
		
	</div>

<?php get_footer(); ?>