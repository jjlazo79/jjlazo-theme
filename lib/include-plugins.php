<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'jjlazo_register_required_plugins');

function jjlazo_register_required_plugins()
{
	$plugins = array(
		array(
			'name' => 'jjlazo metaboxes',
			'slug' => 'jjlazo-metaboxes',
			'source' => get_template_directory_uri() . '/lib/plugins/jjlazo-metaboxes.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false,
		),
		array(
			'name' => 'jjlazo shortcodes',
			'slug' => 'jjlazo-shortcodes',
			'source' => get_template_directory_uri() . '/lib/plugins/jjlazo-shortcodes.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false,
		),
		array(
			'name' => 'jjlazo post types',
			'slug' => 'jjlazo-post-types',
			'source' => get_template_directory_uri() . '/lib/plugins/jjlazo-post-types.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false,
		)
	);

	$config = array();

	tgmpa($plugins, $config);
}
