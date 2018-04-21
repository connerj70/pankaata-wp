<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lady-ann
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			lady_ann_posted_on();
			lady_ann_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php lady_ann_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php
		if(get_post_type() == 'post') {
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lady-ann' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()

			) );
		} else {
			 echo advanced_custom_field_excerpt();
		}

		

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lady-ann' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php lady_ann_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
