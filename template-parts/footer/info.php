<?php
$footer_bg = jjlazo_sanitize_footer_bg(get_theme_mod('jjlazo_footer_bg', 'dark'));
$site_info = get_theme_mod('jjlazo_site_info', '');
?>
<div class="c-site-info c-site-info--<?php echo $footer_bg; ?>">
	<div class="o-container">
		<div class="o-row">
			<div class="o-row__column o-row__column--span-12 c-site-info__text">
				Este sitio está protegido por reCAPTCHA y Google
				<a href="https://policies.google.com/privacy">Privacy Policy</a> and
				<a href="https://policies.google.com/terms">Terms of Service</a> apply.
			</div>
		</div>
	</div>
</div>
<?php if ($site_info) { ?>
	<div class="c-site-info c-site-info--<?php echo $footer_bg; ?>">
		<div class="o-container">
			<div class="o-row">
				<div class="o-row__column o-row__column--span-12 c-site-info__text">
					<?php
					$allowed = array('a' => array(
						'href' => array(),
						'title' => array()
					));
					echo wp_kses($site_info, $allowed); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
