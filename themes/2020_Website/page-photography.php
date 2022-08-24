<?php
/**
 * Template Name: Photography
 * Description: Photography page template
 *
 */

	get_header();
?>

<main data-router-wrapper>
	<div data-router-view="photography" id="page" class="photo">
		<div class="photo__container">
			<div class="container">
				<div class="row">
					<div class="photo__intro" data-aos="fade-up">
						<h1>Photography</h1>
					</div>

					<?php
						$args = array(
							'post_type' => array('photography'),
							'post_status' => array('publish'),
							'nopaging' => true,
							'order' => 'DESC',
							'meta_key' => 'date',
							'orderby' => 'meta_value',
						);
						$photography = new WP_Query($args);
					?>

					<?php if ($photography->have_posts()) { ?>
						<div class="photo__gallery">
							<?php while ($photography->have_posts()) {
								$photography->the_post(); ?>

								<div class="photo__item" data-aos="fade-up">
									<a href="<?php echo get_permalink(); ?>" alt="" class="internal-link">
									<div class="photo__image">
										<?php
											$rows = get_field('images');
											$count = 1;
											if($rows) {
												foreach($rows as $row) {
													if ($count == 1) {
														$image1 = $row['image'];
														$count++;
													} else if ($count == 2) {
														$image2 = $row['image'];
														$count++;
													} else if($count == 3) {
														$image3 = $row['image'];
														break;
													}
												}
											}
										?>
										<?php
											$size = 'medium';
											$topClass = "photo__top";
											$middleOffset = (rand(1, 5));
											$middleClass = "photo__middle photo__middle--" . $middleOffset;
											$bottomOffset = $middleOffset = (rand(1, 5));
											$bottomClass = "photo__bottom photo__bottom--" . $bottomOffset;
										?>
										<?php echo wp_get_attachment_image( $image3, $size, "", ["class" => $bottomClass] ); ?>
										<?php echo wp_get_attachment_image( $image2, $size, "", ["class" => $middleClass] ); ?>
										<?php echo wp_get_attachment_image( $image1, $size, "", ["class" => $topClass] ); ?>
									</div>
									<div class="photo__description">
										<h3><?php the_field('title'); ?></h3>
									</div>
									</a>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
