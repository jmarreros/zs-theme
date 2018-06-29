<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zs
 */
?>

<?php if ( is_active_sidebar( 'sidebar-home' ) && is_home() ) { ?>

<aside id="secondary-home" class="widget-area column is-one-quarter">
	<?php dynamic_sidebar( 'sidebar-home' ); ?>
</aside>

<?php } else if ( is_active_sidebar( 'sidebar-general' ) ) { ?>

<aside id="secondary-general" class="widget-area column is-one-quarter">
	<?php dynamic_sidebar( 'sidebar-general' ); ?>
</aside>

<?php } ?>

