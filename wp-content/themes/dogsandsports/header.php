<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dogsandsports
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dogsandsports' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$dogsandsports_description = get_bloginfo( 'description', 'display' );
			if ( $dogsandsports_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $dogsandsports_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<img class="logo" alt="dogs and sports" src="<?php echo get_template_directory_uri(); ?>/assets/img/dogs-and-sports-logo.svg">
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="line"></span>
				<span class="line"></span>
				<span class="line short"></span>
				<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 15.7 15.7" style="enable-background:new 0 0 15.7 15.7;" xml:space="preserve">
				<style type="text/css">
					.st0{fill:#8A3324;}
				</style>
				<g id="Gruppe_6121" transform="translate(1)">
					<path id="Rechteck_2772" class="st0" d="M-0.6,13.2L12.2,0.4c0.6-0.6,1.5-0.6,2.1,0l0,0c0.6,0.6,0.6,1.5,0,2.1L1.6,15.3
						c-0.6,0.6-1.5,0.6-2.1,0l0,0C-1.1,14.7-1.1,13.8-0.6,13.2z"/>
					<path id="Rechteck_18" class="st0" d="M1.6,0.4l12.7,12.7c0.6,0.6,0.6,1.5,0,2.1l0,0c-0.6,0.6-1.5,0.6-2.1,0L-0.6,2.6
						C-1.1,2-1.1,1-0.6,0.4l0,0C0-0.1,1-0.1,1.6,0.4z"/>
				</g>
				</svg>
			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
