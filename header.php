<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="u-skip-link" href="#content"><?php esc_attr_e('Skip to content', 'jjlazo'); ?></a>
	<header role="banner" class="u-margin-bottom-40">
		<div class="c-navigation">
			<div class="o-container">
				<div class="o-container u-flex u-align-justify u-align-middle">
					<div class="c-header__logo">
						<?php if (has_custom_logo()) {
							the_custom_logo();
						} else { ?>
							<a class="c-header__blogname" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html(bloginfo('name')); ?></a>
						<?php } ?>
					</div>

					<nav class="header-nav" role="navigation" aria-label="<?php esc_html_e('Main Navigation', 'jjlazo') ?>">
						<?php wp_nav_menu(array('theme_location' => 'main-menu')) ?>
					</nav>

					<?php // get_search_form(true); 
					?>

					<input type="checkbox" id="mobile-menu" />
					<label for="mobile-menu" class="mobile-menu">
						<span></span>
						<span></span>
						<span></span>
					</label>

					<nav class="mobile-nav" role="navigation" aria-label="<?php esc_html_e('Main Navigation', 'jjlazo') ?>">
						<?php wp_nav_menu(array('theme_location' => 'main-menu')) ?>
					</nav>

					<button id="dark-mode-toggle" class="theme-mode" aria-label="Toggle Theme Mode." title="Toggle Theme Mode">
						<i class="fas fa-moon" aria-hidden="true" aria-label="<?php esc_html_e('Change dark mode', 'jjlazo') ?>"></i>
						<i class="fas fa-sun" aria-hidden="true" aria-label="<?php esc_html_e('Change ligth mode', 'jjlazo') ?>"></i>
					</button>
				</div>
			</div>
		</div>
	</header>

	<div id="content">
