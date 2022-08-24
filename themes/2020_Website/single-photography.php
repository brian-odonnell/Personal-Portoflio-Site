<?php get_header(); ?>

<?php $title = get_the_title(); ?>

<main data-router-wrapper>
	<div data-router-view="<?php echo $title ?>" id="page" class="<?php echo $title ?>">
		<div class="showcase__container">
			<div class="container">
				<div class="row">
					<div class="showcase__breadcrumbs" data-aos="fade-up">
						<p>/  <a href="/photography">Photography</a>  /  <?php the_field('title'); ?></p>
					</div>

					<div class="showcase__intro" data-aos="fade-up">
						<h1><?php the_field('title'); ?></h1>
					</div>
				</div>

				<div class="row">
					<div class="showcase__content">
						<div class="showcase__info" data-aos="fade-up">
							<ul>
								<?php if (get_field('date')): ?>
									<li><span class="info__label">Date Taken:</span> <span class="info__detail"><?php the_field('date'); ?><?php if (get_field('end_date')) {?> - <?php the_field('end_date'); } ?></span></li>
								<?php endif; ?>
								<?php if (get_field('location')): ?>
									<li><span class="info__label">Location:</span> <span class="info__detail"><?php the_field('location'); ?></span></li>
								<?php endif; ?>
								<?php if (get_field('time_of_day')): ?>
									<li><span class="info__label">Time of Day:</span> <span class="info__detail"><?php the_field('time_of_day'); ?></span></li>
								<?php endif; ?>
								<li><span class="info__label">Camera:</span> <span class="info__detail"><?php the_field('camera'); ?></span></li>
								<?php if (get_field('lenses')): ?>
									<li><span class="info__label">Lenses:</span> <span class="info__detail"><?php the_field('lenses'); ?></span></li>
								<?php endif; ?>
								<?php if (get_field('details')) {
									$rows = get_field('details');
									if($rows) {
										foreach($rows as $row) {
											if ($row['label']):
												echo '<li><span class="info__label">' . $row['label'] . ':</span> <span class="info__detail">' . $row['detail'] . '</span></li>';
											endif;
										}
									}
								} ?>
								<?php if (get_field('flickr_link')) { ?>
									<li><span class="info__label">Full Gallery:</span> <a href="<?php the_field('flickr_link'); ?>" target="_blank">Flickr</a></li>
								<?php } ?>
							</ul>
							<?php if (get_field('description')) { ?>
								<div class="info__description">
									<p class="info__description-label">Description:</p>
									<?php the_field('description'); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="showcase__gallery">
						<?php
							$rows = get_field('images');
							$totalCount = count($rows);
							$count = 1;
						?>
						<?php if( have_rows('images') ): ?>
							<?php while( have_rows('images') ) : the_row(); ?>
							<?php
								$image = get_sub_field('image');
								$size = 'medium';
								$subjectLocation = get_sub_field('subject_location');
								$subjectLocationClass = 'showcase__gallery-img--' . $subjectLocation;
							?>
								<div class="showcase__gallery-img <?php echo $subjectLocationClass; ?>" data-bs-toggle="modal" data-bs-target="#img-<?php echo get_row_index(); ?>">
									<?php echo wp_get_attachment_image( $image, $size ); ?>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php
							$rows = get_field('images');
							$totalCount = count($rows);
							$count = 1;
						?>
						<?php if( have_rows('images') ): ?>
							<?php while( have_rows('images') ) : the_row(); ?>
							<?php
								$image = get_sub_field('image');
								$size = 'large';
							?>
								<div class="modal fade" id="img-<?php echo get_row_index(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<div class="modal__close" data-bs-dismiss="modal" aria-label="Close">
													<span class="circle"></span>
													<span class="line-1"></span>
													<span class="line-2"></span>
												</div>
											</div>
											<div class="modal-body">
												<?php echo wp_get_attachment_image( $image, $size ); ?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<div class="showcase__slider showcase__slider--photo" data-aos="fade-up">
						<?php
							$totalCount = count($rows);
							$count = 1;
						?>
						<?php if( have_rows('images') ): ?>
							<div class="swiper mySwiper--photography">
								<div class="swiper-wrapper">
									<?php while( have_rows('images') ) : the_row(); ?>
									<?php
										$image = get_sub_field('image');
										$size = 'medium';
									?>
										<div class="swiper-slide">
											<div class="img-container">
												<?php if ($row['caption']) { ?>
													<div class="caption"><?php echo $row['caption'] ?></div>
												<?php } ?>
												<?php echo wp_get_attachment_image( $image, $size ); ?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


<?php get_footer(); ?>
