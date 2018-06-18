
<?php
/*
*Template Name: Thousand Page
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lady-ann
*/
get_header();
?>

<div class="content-area">
<main class="site-main">
	<?php if(have_posts()) : 
		while ( have_posts() ) :
			the_post();


		endwhile; endif; // End of the loop.
		?>
		<?php

			$args = array(
				'cat' => 11,
				'post_status' => "publish"
			);

			$query = new WP_Query($args);

		?>
		<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

		<?php endwhile; endif; wp_reset_postdata(); ?>
</main>
  	
</div><!-- #primary -->

<?php
get_sidebar();

get_footer();
