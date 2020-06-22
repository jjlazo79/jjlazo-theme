<?php


add_filter('register_post_type_args', 'jjlazo_filter_portfolio', 10, 2);
function jjlazo_filter_portfolio($args, $post_type)
{
	if ($post_type === 'jjlazo_portfolio') {
		$args['rewrite']['slug'] = get_theme_mod('jjlazo_portfolio_slug', 'portfolio');
	}
	return $args;
}

add_action('customize_save_after', 'jjlazo_customize_save_after');

add_action('init', 'jjlazo_flush_rewrite', 99999);

function jjlazo_flush_rewrite()
{
	if (get_theme_mod('jjlazo_flush_flag', false)) {
		flush_rewrite_rules();
		set_theme_mod('jjlazo_flush_flag', false);
	}
}

function jjlazo_customize_save_after()
{
	$old = get_post_type_object('jjlazo_portfolio')->rewrite['slug'];
	$new = get_theme_mod('jjlazo_portfolio_slug', 'portfolio');
	if ($old !== $new) {
		set_theme_mod('jjlazo_flush_flag', true);
	}
}
