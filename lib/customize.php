<?php

function jjlazo_customize_register($wp_customize)
{

	$wp_customize->get_setting('blogname')->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial('blogname', array(
		// 'settings' => array('blogname')
		'selector' => '.c-header__blogname',
		'container_inclusive' => false,
		'render_callback' => function () {
			bloginfo('name');
		}
	));

	/*##################  SINGLE SETTINGS ########################*/

	$wp_customize->add_section('jjlazo_single_blog_options', array(
		'title' => esc_html__('Single Blog Options', 'jjlazo'),
		'description' => esc_html__('You can change single blog options from here.', 'jjlazo'),
		'active_callback' => 'jjlazo_show_single_blog_section'
	));

	$wp_customize->add_setting('jjlazo_display_author_info', array(
		'default' => true,
		'transport' => 'postMessage',
		'sanitize_callback' => 'jjlazo_sanitize_checkbox'
	));

	$wp_customize->add_control('jjlazo_display_author_info', array(
		'type' => 'checkbox',
		'label' => esc_html__('Show Author Info', 'jjlazo'),
		'section' => 'jjlazo_single_blog_options'
	));

	function jjlazo_sanitize_checkbox($checked)
	{
		return (isset($checked) && $checked === true) ? true : false;
	}

	function jjlazo_show_single_blog_section()
	{
		global $post;
		return is_single() && $post->post_type === 'post';
	}


	/*################## GENERAL SETTINGS ########################*/

	$wp_customize->add_section('jjlazo_general_options', array(
		'title' => esc_html__('General Options', 'jjlazo'),
		'description' => esc_html__('You can change general options from here.', 'jjlazo')
	));

	$wp_customize->add_setting('jjlazo_accent_colour', array(
		'default' => '#20ddae',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'jjlazo_accent_colour', array(
		'label' => __('Accent Color', 'jjlazo'),
		'section' => 'jjlazo_general_options',
	)));

	$wp_customize->add_setting('jjlazo_portfolio_slug', array(
		'default'           => 'portfolio',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('jjlazo_portfolio_slug', array(
		'type'    => 'text',
		'label'    => esc_html__('Portfolio Slug', 'jjlazo'),
		'description' => esc_html__('Will appear in the archive url', 'jjlazo'),
		'section'  => 'jjlazo_general_options',
	));

	/*################## FOOTER SETTINGS ########################*/

	$wp_customize->selective_refresh->add_partial('jjlazo_footer_partial', array(
		'settings' => array('jjlazo_footer_bg', 'jjlazo_footer_layout'),
		'selector' => '#footer',
		'container_inclusive' => false,
		'render_callback' => function () {
			get_template_part('template-parts/footer/widgets');
			get_template_part('template-parts/footer/info');
		}
	));

	$wp_customize->add_section('jjlazo_footer_options', array(
		'title' => esc_html__('Footer Options', 'jjlazo'),
		'description' => esc_html__('You can change footer options from here.', 'jjlazo')
	));

	$wp_customize->add_setting('jjlazo_site_info', array(
		'default' => '',
		'sanitize_callback' => 'jjlazo_sanitize_site_info',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('jjlazo_site_info', array(
		'type' => 'text',
		'label' => esc_html__('Site Info', 'jjlazo'),
		'section' => 'jjlazo_footer_options'
	));

	$wp_customize->add_setting('jjlazo_footer_bg', array(
		'default' => 'dark',
		'transport' => 'postMessage',
		'sanitize_callback' => 'jjlazo_sanitize_footer_bg'
	));

	$wp_customize->add_control('jjlazo_footer_bg', array(
		'type' => 'select',
		'label' => esc_html__('Footer Background', 'jjlazo'),
		'choices' => array(
			'light' => esc_html__('Light', 'jjlazo'),
			'dark' => esc_html__('Dark', 'jjlazo'),
		),
		'section' => 'jjlazo_footer_options'
	));

	$wp_customize->add_setting('jjlazo_footer_layout', array(
		'default' => '3,3,3,3',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
		'validate_callback' => 'jjlazo_validate_footer_layout'
	));

	$wp_customize->add_control('jjlazo_footer_layout', array(
		'type' => 'text',
		'label' => esc_html__('Footer Layout', 'jjlazo'),
		'section' => 'jjlazo_footer_options'
	));
}

add_action('customize_register', 'jjlazo_customize_register');

function jjlazo_validate_footer_layout($validity, $value)
{
	if (!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
		$validity->add('invalid_footer_layout', esc_html__('Footer layout is invalid', 'jjlazo'));
	}
	return $validity;
}

function jjlazo_sanitize_footer_bg($input)
{
	$valid = array('light', 'dark');
	if (in_array($input, $valid, true)) {
		return $input;
	}
	return 'dark';
}

function jjlazo_sanitize_site_info($input)
{
	$allowed = array('a' => array(
		'href' => array(),
		'title' => array()
	));
	return wp_kses($input, $allowed);
}
