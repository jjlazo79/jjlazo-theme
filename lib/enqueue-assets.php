<?php

/**
 * Deregister styles and scripts from header
 *
 * @return void
 */
function contact_form_7_check()
{
	if (!is_page(array('contacto', 'briefing'))) {
		add_filter('wpcf7_load_js', '__return_false');
		add_filter('wpcf7_load_css', '__return_false');
		add_action('wp_print_scripts', 'disable_recaptcha');
	}
}
add_action('wp', 'contact_form_7_check');

function disable_recaptcha()
{
	wp_dequeue_script('google-recaptcha');
}

// add_filter('wpcf7_load_js', '__return_false');
// add_filter('wpcf7_load_css', '__return_false');
// add_action('wp_print_scripts', 'disable_recaptcha');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function my_deregister_javascript()
{
	wp_deregister_script('gdpr');
	// wp_dequeue_script('google-recaptcha');
}
add_action('wp_print_scripts', 'my_deregister_javascript', 100);

function my_deregister_styles()
{
	wp_deregister_style('dashicons');
	wp_deregister_style('wp-block-library');
	wp_deregister_style('create-block-progress-bar-block');
	wp_deregister_style('gdpr');
	wp_deregister_style('hcb-style');
	wp_deregister_style('hcb-coloring');
}
add_action('wp_print_styles', 'my_deregister_styles', 100);


/* Precarga de DNS externas */
function jjlazo_dns_prefetch()
{
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	<link rel="dns-prefetch" href="//apis.google.com" />
	<link rel="dns-prefetch" href="//google-analytics.com" />
	<link rel="dns-prefetch" href="//www.google-analytics.com" />
	<link rel="dns-prefetch" href="//ssl.google-analytics.com" />
	<link rel="dns-prefetch" href="//youtube.com" />
	<link rel="dns-prefetch" href="//s.gravatar.com" />
	<link rel="dns-prefetch" href="//s0.wp.com" />
	<link rel="dns-prefetch" href="//stats.wp.com" />
	<link rel="preload"      href="' . get_template_directory_uri() . '/dist/assets/css/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'jjlazo_dns_prefetch', 0);

/**
 * enqueue assets
 */
function jjlazo_assets()
{
	wp_enqueue_script('jjlazo-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), '1.0.0', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// if (is_page(array('contacto', 'briefing'))) {
	// 	if (function_exists('wpcf7_enqueue_scripts')) {
	// 		wpcf7_enqueue_scripts();
	// 	}
	// 	if (function_exists('wpcf7_enqueue_styles')) {
	// 		wpcf7_enqueue_styles();
	// 	}
	// } else {
	// 	wp_dequeue_script('google-recaptcha');
	// 	wp_dequeue_script('google-invisible-recaptcha');
	// }
}
add_action('wp_enqueue_scripts', 'jjlazo_assets');

function prefix_add_footer_styles()
{
	/* Main CSS */
	wp_enqueue_style('jjlazo-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all');
	/* Dashicon in front */
	wp_enqueue_style('dashicons');

	include(get_template_directory() . '/lib/inline-css.php');
	wp_add_inline_style('jjlazo-stylesheet', $inline_styles);

	wp_enqueue_style('dashicons', '/wp-includes/css/dashicons.min.css', array(), false, 'all');
	wp_enqueue_style('wp-block-library', '/wp-includes/css/dist/block-library/style.min.css', array(), false, 'all');
	wp_enqueue_style('create-block-progress-bar-block', '/wp-content/plugins/jjlazo-progress-bars/build/style-index.css', array(), false, 'all');
	wp_enqueue_style('gdpr', '/wp-content/plugins/gdpr/dist/css/public.css', array(), false, 'all');
	wp_enqueue_style('hcb-style', '/wp-content/plugins/highlighting-code-block/build/css/hcb_style.css', array(), false, 'all');
	wp_enqueue_style('hcb-coloring', '/wp-content/plugins/highlighting-code-block/build/css/coloring_light.css', array(), false, 'all');
};
add_action('get_footer', 'prefix_add_footer_styles');


function jjlazo_block_editor_assets()
{
	wp_enqueue_style('jjlazo-block-editor-styles', get_template_directory_uri() . '/dist/assets/css/editor.css', array(), '1.0.0', 'all');
}
add_action('enqueue_block_editor_assets', 'jjlazo_block_editor_assets');


function jjlazo_admin_assets()
{
	wp_enqueue_style('jjlazo-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all');

	wp_enqueue_script('jjlazo-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'jjlazo_admin_assets');


function jjlazo_customize_preview_js()
{
	wp_enqueue_script('jjlazo-cutomize-preview', get_template_directory_uri() . '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);

	include(get_template_directory() . '/lib/inline-css.php');
	wp_localize_script('jjlazo-cutomize-preview', 'jjlazo', array('inline-css' => $inline_styles_selectors));
}
add_action('customize_preview_init', 'jjlazo_customize_preview_js');
