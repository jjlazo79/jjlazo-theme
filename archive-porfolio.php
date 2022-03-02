<?php get_header(); ?>

<div class="o-container u-margin-bottom-40">

	<div class="o-row">
		<div class="o-row__column o-row__column--span-12">
			<header class="text-center">
				<h1>Portfolio</h1>
			</header>
		</div>
	</div>

	<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>

	<div class="o-row">
		<div class="o-row__column o-row__column--span-12">
			<main role="main">

				<?php if (have_posts()) { ?>

					<div id="filters_" class="button-group filter-button-group
					text-center">
						<button class="button is-checked" data-filter="*">Todos</button>
						<?php
						$taxonomies = get_terms(array(
							'taxonomy' => 'porfolio_category',
							'hide_empty' => false,
						));

						if (!empty($taxonomies)) :
							foreach ($taxonomies as $category) {
								echo '<button data-filter=".' . esc_attr($category->slug) . '" class="button">' . esc_attr($category->name) . '</button>';
							}
						endif; ?>

					</div>

					<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>

					<section id="" class="grid c-portfolio">
						<?php while (have_posts()) {
							the_post(); ?>

							<?php
							$term_obj_list = get_the_terms(get_the_ID(), 'porfolio_category');
							$terms_string  = join(', ', wp_list_pluck($term_obj_list, 'name'));
							$terms_slugs   = join(' ', wp_list_pluck($term_obj_list, 'slug'));
							?>

							<article id="project-<?php echo get_the_ID(); ?>" class="c-portfolio-item <?php echo $terms_slugs; ?>" data-subcategories="<?php echo $terms_string; ?>">

								<?php the_post_thumbnail(); ?>

								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<div class="titles">
										<div class="polygon"></div>
										<span>
											<h2><?php the_title(); ?></h2>
											<h3><?php echo $terms_string; ?></h3>
										</span>
									</div>
								</a>

							</article>

						<?php } ?>

					</section>
					<div class="clear"></div>
					<?php the_posts_pagination() ?>
				<?php } else { ?>
					<?php esc_html_e('Sorry, no posts matched your criteria.', 'jjlazo'); ?>
				<?php } ?>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<script>
	// init Isotope
	var grid = jQuery('.grid').isotope({
		itemSelector: '.c-portfolio-item',
		layoutMode: 'fitRows'
	});
	// filter items on button click
	jQuery('.filter-button-group').on('click', 'button', function() {
		var filterValue = jQuery(this).attr('data-filter');
		grid.isotope({
			filter: filterValue
		});
		console.log(filterValue);
	});
</script>
