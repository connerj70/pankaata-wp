<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lady-ann
 */



?>


<div>
<a class="letter_link" href=<?php the_permalink()?>>
	<div class="letter_container">
	    <div>
	        <h1 class="letter-title"><?php the_title() ?></h1>
	        <h4 class="letter-date"> <?php the_time( get_option( 'date_format' )) ?></h4>
	        <?php echo advanced_custom_field_excerpt(); ?>
	        <?php 
			wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lady-ann' ),
			'after'  => '</div>',
			) );
	        ?>
	    </div>
	    <footer class="entry-footer">
			<?php lady_ann_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</a>
	
</div>