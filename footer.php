<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zs
 */

?>
		</div> <!-- container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="site-info columns">
				<div class="footer-text column">
					<img width="43" height="67" src="<?php echo get_template_directory_uri() . '/images/logo-alterno.svg' ?>" />
					<div>
						<span>© Zona Salsera Copyright <?= date("Y") ?> | Todos los derechos reservados | </span>
						<a hrer="#">Política de Privacidad</a>
					</div>
				</div>
				<div class="footer-social column is-one-quarter">
					<?php dynamic_sidebar('footer-social') ?>
				</div>
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
