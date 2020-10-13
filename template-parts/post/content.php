<article <?php post_class('c-post u-margin-bottom-20'); ?>>

	<div class="c-post__inner">
		<div class="o-row">
			<?php if (is_single()) {
				$firstcolumn = 'o-row__column--span-12@medium o-row__column--span-2@large';
				$secondcolumn = 'o-row__column--span-12@medium o-row__column--span-10@large';
			} else {
				$firstcolumn = 'o-row__column--span-6@medium o-row__column--span-2@large';
				$secondcolumn = 'o-row__column--span-6@medium o-row__column--span-10@large';
			} ?>
			<div class="o-row__column o-row__column--span-12 <?php echo $firstcolumn; ?>">

				<?php if (get_the_post_thumbnail() !== '') { ?> <div class="c-post__thumbnail">
						<?php the_post_thumbnail('jjlazo-blog-image'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="o-row__column o-row__column--span-12 <?php echo $secondcolumn; ?>">
				<?php get_template_part('template-parts/post/header'); ?>

				<?php if (is_single()) { ?>
					<div class="c-post__content">
						<?php the_content();
						wp_link_pages();
						?>
					</div>
				<?php } else { ?>
					<div class="c-post__excerpt">
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>

				<?php if (is_single()) { ?>
					<?php get_template_part('template-parts/post/footer'); ?>
				<?php } ?>
				<?php if (!is_single()) {
					jjlazo_readmore_link();
				} ?>
			</div>
		</div>
	</div>
</article>
