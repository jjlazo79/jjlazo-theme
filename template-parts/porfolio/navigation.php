<?php
$prev = get_previous_post();
$next = get_next_post();
?>

<?php if ($prev || $next) { ?>

	<nav class="c-project-navigation" role="navigation">
		<h2 class="u-screen-reader-text"><?php esc_attr_e('Post Navigation', 'jjlazo'); ?></h2>
		<div class="c-project-navigation__links o-row">

			<?php if ($prev) { ?>
				<div class="o-row__column o-row__column--span-12 o-row__column--span-6@medium">
					<div class="c-project-navigation__prev">
						<a class="c-project-navigation__link o-row" href="<?php the_permalink($prev->ID) ?>">
							<?php if (has_post_thumbnail($prev->ID)) { ?>
								<div class="c-project-navigation__thumbnail o-row__column--span-6">
									<?php echo get_the_post_thumbnail($prev->ID, 'thumbnail'); ?>
								</div>
							<?php } ?>
							<div class="c-project-navigation__content o-row__column--span-6">
								<span class="c-project-navigation__subtitle">
									<?php esc_html_e('Previous project', 'jjlazo'); ?>
								</span>
								<p class="c-project-navigation__title">
									<?php echo esc_html(get_the_title($prev->ID)); ?>
								</p>
							</div>
						</a>
					</div>
				</div>

			<?php } ?>
			<?php if ($next) { ?>

				<div class="o-row__column o-row__column--span-12 o-row__column--span-6@medium">
					<div class="c-project-navigation__next">
						<a class="c-project-navigation__link o-row" href="<?php the_permalink($next->ID) ?>">
							<?php if (has_post_thumbnail($next->ID)) { ?>
								<div class="c-project-navigation__thumbnail o-row__column--span-6">
									<?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?>
								</div>
							<?php } ?>
							<div class="c-project-navigation__content o-row__column--span-6">
								<span class="c-project-navigation__subtitle">
									<?php esc_html_e('Next project', 'jjlazo'); ?>
								</span>
								<p class="c-project-navigation__title">
									<?php echo esc_html(get_the_title($next->ID)); ?>
								</p>
							</div>
						</a>
					</div>
				</div>

			<?php } ?>

		</div>
	</nav>

<?php } ?>
