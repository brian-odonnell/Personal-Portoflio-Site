<?php
/**
 * Template Name: About
 * Description: About page template
 *
 */

	get_header();
?>

<main data-router-wrapper>
	<div data-router-view="about" id="page" class="about">
		<div class="about__container">
			<div class="container">
				<div class="row">
					<div data-aos="fade-up" class="page-intro">
						<h1>About Me</h1>
					</div>
				</div>

				<div class="row bio">
					<div class="bio__summary">
						<div data-aos="fade-up">
							<?php if (get_field('bio_photo')) { ?>
								<img src="<?php the_field('bio_photo'); ?>" class="bio__image">
							<?php } ?>
							<?php the_field('bio'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container--gray" data-aos="fade-up">
				<div class="container">
					<div class="row">
						<div class="stats">
							<?php $rows = get_field('fun_facts');
							if($rows) {
								foreach($rows as $row) { ?>
									<div class="stats__item">
										<i class="fas fa-<?php echo $row['fa_icon'] ?>"></i>
										<h4><?php echo $row['fact'] ?></h4>
									</div>
								<?php }
							} ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row job-history">
					<?php
						$args = array(
							'post_type' => array('jobs'),
							'post_status' => array('publish'),
							'nopaging' => true,
							'meta_key' => 'sort_order',
							'order' => 'DEC',
							'orderby' => 'meta_value'
						);
						$jobs = new WP_Query($args);
					?>

					<?php if ($jobs->have_posts()) {
						while ($jobs->have_posts()) {
							$jobs->the_post(); ?>
							<div class="job" data-aos="fade-up">
								<div class="job__container">
									<div class="job__details" data-bs-toggle="modal" data-bs-target="#<?php the_field('identifier'); ?>">
										<h6><?php the_field('start_date'); ?> - <?php the_field('end_date'); ?></h6>
										<h3><?php the_field('title'); ?></h3>
										<h5><?php the_field('company'); ?></h5>
										<div class="icon">
											<span class="icon__copy">More Info</span>
											<i class="fas fa-arrow-right"></i>
										</div>
									</div>
									<div class="job__marker"></div>
								</div>
								<div class="job__spacer"></div>
							</div>
						<?php }
					} ?>
					<?php wp_reset_query(); ?>
				</div>

				<?php if(get_field('resume')) { ?>
					<div class="row resume">
						<div data-aos="fade-up">
							<a href="<?php the_field('resume'); ?>" target="_blank" class="button button--blue">Full Resume</a>
						</div>
					</div>
				<?php } ?>

				<div class="row skills">
					<?php $rows = get_field('skills');
					if($rows) {
						foreach($rows as $row) { ?>
							<div class="skill" data-aos="fade-up">
								<i class="fas fa-<?php echo $row['fa_icon'] ?>"></i>
								<h4><?php echo $row['title'] ?></h4>
								<p><?php echo $row['snippet'] ?></p>
							</div>
						<?php }
					} ?>
				</div>

				<?php if (have_rows('full_skill_list')): ?>
				<div class="row skill-list">
					<div class="accordion skill-list__accordion" id="accordionExample">
						<div class="accordion-item skill-list__accordion-item">
							<h2 class="accordion-header skill-list__accordion-header" id="headingOne">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									<span>Full Skills List</span>
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								<div class="accordion-body skill-list__accordion-body">
									<p class="skill-list__disclaimer">I have worked with the below concepts, languages, and programs in a variety of capacities ranging from just a general exposure to daily use.</p>
									<ul class="skill-list__list">
										<?php while (have_rows('full_skill_list')): the_row(); ?>
											<li class="skill-list__item"><?php echo get_sub_field('list_item') ?></li>
										<?php endwhile; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php
			$args = array(
				'post_type' => array('jobs'),
				'post_status' => array('publish'),
				'nopaging' => true,
				'meta_key' => 'sort_order',
				'order' => 'ASC',
				'orderby' => 'meta_value'
			);
			$jobs = new WP_Query($args);
		?>

		<?php if ($jobs->have_posts()) {
			while ($jobs->have_posts()) {
				$jobs->the_post(); ?>

				<div class="modal fade" id="<?php the_field('identifier'); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="modal__header">
									<h3><?php the_field('title'); ?></h3>
									<h5><?php the_field('company'); ?></h5>
								</div>
								<div class="modal__close" data-bs-dismiss="modal" aria-label="Close">
									<span class="circle"></span>
									<span class="line-1"></span>
									<span class="line-2"></span>
								</div>
							</div>
							<div class="modal-body">
								<p class="modal-body__label">Details:</p>
								<?php the_field('description'); ?>
								<p class="modal-body__label">Primary Tasks:</p>
								<ul>
									<?php if (have_rows('tasks')):
										while (have_rows('tasks')): the_row(); ?>
											<li><?php the_sub_field('task_item'); ?></li>
										<?php endwhile;
									endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<?php }
			} ?>
		<?php wp_reset_query(); ?>
	</div>
</main>

<?php get_footer(); ?>
