<?php
/*

@package lady-ann


*/

add_action('wp_ajax_nopriv_load_more', 'load_more');
add_action('wp_ajax_load_more', 'load_more');


function load_more() {
	//load more posts
	$paged = $_POST['page'] + 1;
	
	$query = new WP_Query(array(
		"post_type" => array("post", "user_letters"),
		'paged' => $paged,
		'order'         => 'DESC',
		"posts_per_page" => 4,
		'post_status' => "publish"
	));

	if($query->have_posts()) : while ( $query->have_posts() ) :
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

	else : 

	echo "<script type='text/javascript'>alert('all posts loaded');</script>";

		endif;



			the_posts_navigation();

			wp_reset_postdata();

	die();
}