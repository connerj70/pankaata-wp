<?php
/**
Template Name: Relationship Page
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
				"category__not_in" => 3
			);

			$query = new WP_Query($args);

		?>

		<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>

			<div class="type-post">
				<h1 class="letter-title"><?php the_title() ?></h1>
				<div class="entry-meta">
					<?php
					lady_ann_posted_on();
					lady_ann_posted_by();
					?>
				</div><!-- .entry-meta -->
				<div><?php the_content() ?></div>
			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();