
<?php
/*
*Template Name: Entertainment Page
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lady-ann
*/
get_header();
?>

<div class="content-area">

	<?php if(have_posts()) : 
		while ( have_posts() ) :
			the_post();


		endwhile; endif; // End of the loop.
		?>
		<?php

			$args = array(
				'cat' => 8,
				'post_status' => "publish"
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

  	
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
