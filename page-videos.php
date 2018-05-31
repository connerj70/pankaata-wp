<?php
/**
Template Name: Videos Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lady-ann
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<?php

			$args = array(
				"cat" => 3
			);

			$query = new WP_Query($args);

		?>

		<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

		<?php endwhile; endif; wp_reset_postdata(); ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
