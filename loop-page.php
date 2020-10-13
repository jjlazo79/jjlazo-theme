<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();

		if (is_front_page()) {
			get_template_part('template-parts/frontpage/content');
		} else {
			get_template_part('template-parts/page/content');
		}


		if (comments_open() || get_comments_number()) {
			comments_template();
		}
	}
} else {
	get_template_part('template-parts/post/content', 'none');
}
