<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zs
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zs' ); ?></a>
	<?php if ( ! is_front_page() || ! is_home() ) $class = 'header-min'; ?>
	<header id="masthead" class="site-header <?= $class ?>">
		<div class="container">

			<div class="wrap columns">

				<div class="site-branding column is-one-third">
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

					$zs_description = get_bloginfo( 'description', 'display' );
					if ( $zs_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $zs_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation column">
					<a href="#" class="icon-menu" ><i class="fas fa-bars"></i></a>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'principal-menu',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->

			</div><!-- wrap columns -->

			<?php if ( is_front_page() ){ ?>
				<aside class="header-text">
					<div class="column is-one-third">
					<?php dynamic_sidebar( 'header-text' ); ?>
					</div>
				</aside>
			<?php } ?>

		</div><!-- container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
		<div class="columns">
