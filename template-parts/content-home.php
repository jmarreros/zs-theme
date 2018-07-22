<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div>
	<?php
	if ( is_singular() ): ?>
		<header class="entry-header">
			<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				meta_entry_data();
			?>
		</header>
	<?php endif; ?>

	<?php
		zs_post_thumbnail();

		if ( ! is_singular() ){
			meta_entry_data();
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

	?>



		<?php
		// echo '<div class="entry-content">';
		// the_content( sprintf(
		// 	wp_kses(
		// 		/* translators: %s: Name of current post. Only visible to screen readers */
		// 		__( 'Leer más<span class="screen-reader-text"> "%s"</span>', 'zs' ),
		// 		array(
		// 			'span' => array(
		// 				'class' => array(''),
		// 			),
		// 		)
		// 	),
		// 	get_the_title()
		// ) );

		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zs' ),
		// 	'after'  => '</div>',
		// ) );

		// echo '</div>';
		?>


	</div>
</article>
