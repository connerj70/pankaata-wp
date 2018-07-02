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
 * @package lady-ann
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;


			$args = array(
				"post_type" => array("post", "user_letters"),
				"posts_per_page" => 4,
				'order'         => 'DESC',
				'post_status' => "publish"
			);

			$query = new WP_Query($args);

			/* Start the Loop */
			while ( $query->have_posts() ) :
				$query->the_post();

				if(get_post_type() == "post") {
					get_template_part( 'template-parts/content', get_post_type() );
				} else {

					get_template_part("template-parts/letter");
				}
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
		</main><!-- #main -->
		<button class="load" data-page="1" data-url="<?php echo admin_url('admin-ajax.php');?>">
			<span class="load-text">NEXT <img class="next-arrow" src="<?php bloginfo('template_url'); ?>/assets/right-arrow.svg" /></span>
		</button>
		<div class="bottom-banner">
			<div class="bottom-banner-close">x</div>
			<h3>Heading</h3>
			<div>Sub Heading</div>
		</div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
