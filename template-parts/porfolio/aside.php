<div class="c-page">

	<div class="c-project-text">
		<div class="widget">
			<div class="c-project-description">
				<h3 class="widget_title"><?php esc_attr_e('Project description', 'jjlazo'); ?></h3>
				<p><?php echo $args['data']['project_content']; ?></p>
			</div>
		</div>
		<!-- end widget -->
	</div>

	<div class="c-project-meta">
		<div class="widget">
			<h3 class="widget_title"><?php esc_attr_e('Project details', 'jjlazo'); ?></h3>
			<div class="meta">
				<label><?php esc_attr_e('Client:', 'jjlazo'); ?> </label><?php echo $args['data']['project_client']; ?>
			</div>

			<div class="meta">
				<label><?php esc_attr_e('Date:', 'jjlazo'); ?> </label>
				<?php echo get_the_date(); ?>
			</div>

			<div class="meta">
				<label><?php esc_attr_e('Categorie:', 'jjlazo'); ?> </label>
				<?php
				$term_obj_list = get_the_terms(get_the_ID(), 'porfolio_category');
				$terms_string  = join(', ', wp_list_pluck($term_obj_list, 'name'));
				echo $terms_string;
				?>
			</div>
		</div>
		<!-- end widget -->

		<div class="widget c-project-skills">

			<h3 class="widget_title"><?php esc_attr_e('Project skills', 'jjlazo'); ?></h3>
			<ul>
				<?php foreach ($args['data']['project_skills'] as $portfolio_skill) { ?>
					<li><?php echo $portfolio_skill->name; ?></li>
				<?php } ?>
			</ul>
		</div>
		<!-- end widget -->

	</div> <!-- .project_meta -->

	<div class="wp-block-buttons aligncenter">
		<div class="wp-block-button"><a class="wp-block-button__link has-text-color" href="<?php echo $args['data']['project_url']; ?>" target="_blank" rel="proyecto"><?php esc_attr_e('Go project', 'jjlazo'); ?></a></div>
	</div>
</div>
