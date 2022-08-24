<?php
/**
 * Template Name: Work
 * Description: Work page template
 *
 */

	get_header();
?>

<main data-router-wrapper>
	<div data-router-view="work" id="page" class="work">
		<div class="work__container">
			<div class="container">
				<div class="row">
					<div class="work__intro" data-aos="fade-up">
						<h1>Work</h1>
					</div>

					<div class="work__gallery">

						<?php
							$args = array(
								'post_type' => array('work'),
								'post_status' => array('publish'),
								'nopaging' => true,
								'meta_key' => 'date',
								'orderby' => 'meta_value',
								'order' => 'DESC'
							);
							$work = new WP_Query($args);
						?>

						<?php if ($work->have_posts()) {
							while ($work->have_posts()) {
								$work->the_post(); ?>

								<div class="work__item" data-aos="fade-up">
									<a href="<?php echo get_permalink(); ?>" alt="<?php the_field('client'); ?>" class="internal-link">
										<div class="work__image">
											<?php
												$rows = get_field('images');
												if($rows) {
													foreach($rows as $row) {
														$size = "medium";
														$image = $row['image'];
														echo wp_get_attachment_image( $image, $size );
														break;
													}
												}
											?>
										</div>
										<div class="work__description">
											<h3 class="feature__title"><?php if (get_field('shortened_client')) { the_field('shortened_client'); } else { the_field('client'); } ?></h3>
											<h6><?php the_field('project_title'); ?></h6>
										</div>
									</a>
								</div>
							<?php }
						} ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
