<header class="c-post__header">
	<?php if (is_single()) { ?>
		<h1 class="c-post__single-title">
			<?php the_title() ?>
		</h1>
	<?php } else { ?>
		<h2 class="c-post__title">
			<a class="title" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a>
		</h2>
	<?php } ?>

	<div class="c-post__meta">
		<?php jjlazo_post_meta(); ?>
	</div>
</header>
