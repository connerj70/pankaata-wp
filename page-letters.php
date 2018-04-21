<?php
/**
	Template Name: Letters Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lady-ann
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if(have_posts()) : 
		while ( have_posts() ) :
			the_post();


		endwhile; endif; // End of the loop.
		?>
		<?php

			$args = array(
				"post_type" => "user_letters",
				'post_status' => "publish"
			);

			$query = new WP_Query($args);

		?>

		<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post();?>

			<a class="letter_link" href=<?php the_permalink()?>>
			  	<div class="letter_container">
			        <div>
			            <h1 class="letter-title"><?php the_title() ?></h1>
	        			<h4 class="letter-date"> <?php the_time( get_option( 'date_format' )) ?></h4>
			            <h3><?php echo advanced_custom_field_excerpt(); ?></h3>
			        </div>
			        <footer class="entry-footer">
						<?php lady_ann_entry_footer(); ?>
					</footer><!-- .entry-footer -->
	           	</div>
       		</a>

		<?php endwhile; endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
		

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
