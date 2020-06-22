<?php

function jjlazo_add_meta_box()
{
	add_meta_box(
		'jjlazo_post_metabox',
		'Post Settings',
		'jjlazo_post_metabox_html',
		'post',
		'normal',
		'default'
	);
}

add_action('add_meta_boxes', 'jjlazo_add_meta_box');

function jjlazo_post_metabox_html($post)
{
	$subtitle = get_post_meta($post->ID, '_jjlazo_post_subtitle', true);
	$layout = get_post_meta($post->ID, '_jjlazo_post_layout', true);
	wp_nonce_field('jjlazo_update_post_metabox', 'jjlazo_update_post_nonce');
?>
	<p>
		<label for="jjlazo_post_metabox_html"><?php esc_html_e('Post Subtitle', 'jjlazo'); ?></label>
		<br />
		<input class="widefat" type="text" name="jjlazo_post_subtitle_field" id="jjlazo_post_metabox_html" value="<?php echo esc_attr($subtitle); ?>" />
	</p>
	<p>
		<label for="jjlazo_post_layout_field"><?php esc_html_e('Layout', 'jjlazo'); ?></label>
		<select name="jjlazo_post_layout_field" id="jjlazo_post_layout_field" class="widefat">
			<option <?php selected($layout, 'full'); ?> value="full"><?php esc_html_e('Full Width', 'jjlazo'); ?></option>
			<option <?php selected($layout, 'sidebar'); ?> value="sidebar"><?php esc_html_e('Post With Sidebar', 'jjlazo'); ?></option>
		</select>
	</p>
<?php
}

function jjlazo_save_post_metabox($post_id, $post)
{

	$edit_cap = get_post_type_object($post->post_type)->cap->edit_post;
	if (!current_user_can($edit_cap, $post_id)) {
		return;
	}
	if (!isset($_POST['jjlazo_update_post_nonce']) || !wp_verify_nonce($_POST['jjlazo_update_post_nonce'], 'jjlazo_update_post_metabox')) {
		return;
	}

	if (array_key_exists('jjlazo_post_subtitle_field', $_POST)) {
		update_post_meta(
			$post_id,
			'_jjlazo_post_subtitle',
			sanitize_text_field($_POST['jjlazo_post_subtitle_field'])
		);
	}

	if (array_key_exists('jjlazo_post_layout_field', $_POST)) {
		update_post_meta(
			$post_id,
			'_jjlazo_post_layout',
			sanitize_text_field($_POST['jjlazo_post_layout_field'])
		);
	}
}

add_action('save_post', 'jjlazo_save_post_metabox', 10, 2);
