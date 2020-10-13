<?php if (have_posts()) {
	while (have_posts()) {
		the_post();
		if (!is_search()) {
			get_template_part('template-parts/post/content', get_post_format());
		} else {
			get_template_part('template-parts/post/content-search');
		}
	}
	the_posts_pagination();
	do_action('jjlazo_after_pagination');
} else {
	get_template_part('template-parts/post/content', 'none');
}
