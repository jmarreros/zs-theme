<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zs
 */

get_header();
?>

	<div id="primary" class="content-area column blog">
		<main id="main" class="site-main">

		<?php if ( is_home() ): ?>
			<aside id="content-top-home" class="widget-area">
				<?php dynamic_sidebar( 'content-top-home' ); ?>
			</aside>
		<?php endif; ?>

		<h2 class="title-blog"><span><?php _e('Publicaciones Recientes','zs'); ?></span></h2>


		<?php
		if ( have_posts() ) :

			echo "<div class='list-articles'>";
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'home' );

			endwhile;

			echo "</div>"; //list articles

			//the_posts_navigation();
			include_once 'inc/pagination.php';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
