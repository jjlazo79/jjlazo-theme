<?php
$link = basename($_SERVER['REQUEST_URI']);
$post_type = get_post_type(); ?>
<article <?php post_class('c-post u-margin-bottom-20'); ?>>

	<div class="c-post__inner">
		<div class="o-row">
			<div class="o-row__column o-row__column--span-12 o-row__column--span-12@medium o-row__column--span-2@large">

				<?php if (get_the_post_thumbnail() !== '') { ?>
					<div class="c-post__thumbnail">
						<?php the_post_thumbnail('jjlazo-blog-image'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="o-row__column o-row__column--span-12 o-row__column--span-12@medium o-row__column--span-10@large">

				<div class="c-search-result">
					<a href="<?php echo $link . '&post_type=' . $post_type; ?>" class="c-search-result__<?php echo $post_type; ?>"></a>
				</div>

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
