<aside role="complementary">
	<?php
	if (is_page('contacto') && is_active_sidebar('contact-sidebar')) {
		dynamic_sidebar('contact-sidebar');
	} elseif (is_page_for_posts() && is_active_sidebar('archive-sidebar')) {
		dynamic_sidebar('archive-sidebar');
	} elseif (is_page() && is_active_sidebar('primary-sidebar')) {
		dynamic_sidebar('primary-sidebar');
	} elseif (is_single() && is_active_sidebar('primary-sidebar')) {
		dynamic_sidebar('primary-sidebar');
	} elseif (is_archive() && is_active_sidebar('archive-sidebar') || is_search() && is_active_sidebar('archive-sidebar')) {
		dynamic_sidebar('archive-sidebar');
	}
	?>
</aside>
