<?php get_header(); ?>

<?php
// content ------------------------------------------
$project_info['project_content'] = (($post->post_excerpt == '') || (is_single())) ? get_the_content(__("Read more", "jjlazo")) : get_the_excerpt();

// skills ------------------------------------------
$project_info['project_skills']  = wp_get_post_terms($post->ID, 'portfolio_skill');

// url ------------------------------------------
$project_info['project_url']     = get_post_meta($post->ID, '_jjlazo_porfolio_details_project_url', true);

// client ------------------------------------------
$project_info['project_client']  = get_post_meta($post->ID, '_jjlazo_porfolio_details_project_client', true);

// gallery ------------------------------------------
$project_info['project_gallery']  = get_post_meta($post->ID, '_jjlazo_porfolio_details_project_gallery');
?>

<div class="o-container u-margin-bottom-40 o-single-post-sidebar c-project">

	<div class="o-row">
		<div class="o-row__column o-row__column--span-12">
			<div class="c-page">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
		</div>
	</div>

	<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>

	<div class="o-row">
		<section class="o-row__column o-row__column--span-12 o-row__column--span-8@medium">
			<main role="main">

				<article id="project-<?php the_ID(); ?>" <?php post_class('c-page'); ?>>

					<!-- Condensed Layout -->
					<div class="section group">
						<div class="c-project__thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
					<?php if ($project_info['project_gallery']) { ?>
						<div class="section group">
							<div class="c-project__gallery">
								<?php foreach ($project_info['project_gallery'] as $project_image) {
								?>
									<img style="max-width:150px;max-height:150px;" src="<?php echo $project_image['url']; ?>" class="img-fluid" alt="">
								<?php }
								?>
							</div>
						</div>
					<?php } ?>
				</article>

			</main>
		</section>

		<aside class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
			<div class="c-project-info col span_1_of_4">
				<?php get_template_part('template-parts/porfolio/aside', null, array(
					'data' => array(
						'project_content' => $project_info['project_content'],
						'project_url'     => $project_info['project_url'],
						'project_skills'  => $project_info['project_skills'],
						'project_client'  => $project_info['project_client']
					)
				)); ?>
				<div class="alignclear"></div>

			</div>
		</aside>

		<div class="o-row__column o-row__column--span-12">
			<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		</div>

		<div class="o-row__column o-row__column--span-12">
			<?php get_template_part('template-parts/porfolio/navigation'); ?>
		</div>

	</div>
	<!-- end row -->
</div>
<!-- end container -->


<div class="wp-block-group alignfull c-page__hero has-white-color has-text-color has-background" style="background:linear-gradient(135deg,rgb(0,173,239) 0%,rgb(255,255,255) 100%)">
	<div class="wp-block-group__inner-container">
		<div class="wp-block-columns o-container u-flex">
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
				<h2 class="has-text-align-center has-white-color has-text-color">¿Quieres que desarrolle para ti?</h2>
			</div>

			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
				<div class="wp-block-buttons aligncenter">
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="/contacto/" rel="contacto">Contacta</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
