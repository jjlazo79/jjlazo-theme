<?php

function jjlazo_sidebar_widgets()
{
	register_sidebar(array(
		'id' => 'primary-sidebar',
		'name' => esc_html__('Primary Sidebar', 'jjlazo'),
		'description' => esc_html__('This sidebar appears in the single posts page.', 'jjlazo'),
		'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'id' => 'archive-sidebar',
		'name' => esc_html__('Archive Sidebar', 'jjlazo'),
		'description' => esc_html__('This sidebar appears in the blog posts page.', 'jjlazo'),
		'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
	register_sidebar(array(
		'id' => 'contact-sidebar',
		'name' => esc_html__('Contact Sidebar', 'jjlazo'),
		'description' => esc_html__('This sidebar appears in the contact page.', 'jjlazo'),
		'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
}

$footer_layout = sanitize_text_field(get_theme_mod('jjlazo_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
$footer_bg = jjlazo_sanitize_footer_bg(get_theme_mod('jjlazo_footer_bg', 'dark'));
$widget_theme = '';
if ($footer_bg == 'light') {
	$widget_theme = 'c-footer-widget--dark';
} else {
	$widget_theme = 'c-footer-widget--light';
}

foreach ($columns as $i => $column) {
	register_sidebar(array(
		'id' => 'footer-sidebar-' . ($i + 1),
		'name' => sprintf(esc_html__('Footer Widgets Column %s', 'jjlazo'), $i + 1),
		'description' => esc_html__('Footer widgets', 'jjlazo'),
		'before_widget' => '<section id="%1$s" class="c-footer-widget ' . $widget_theme . ' %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	));
}

add_action('widgets_init', 'jjlazo_sidebar_widgets');

//Shortodes en widgets de texto
add_filter('widget_text', 'do_shortcode');
