<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lady-ann
 */

?>
		</div><!-- inner content -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div id="footer-sidebar" class="secondary">
			<div id="footer-sidebar1">
			<?php
			if(is_active_sidebar('footer-sidebar-1')){
			dynamic_sidebar('footer-sidebar-1');
			}
			?>
			</div>
			<div id="footer-sidebar2">
			<?php
			if(is_active_sidebar('footer-sidebar-2')){
			dynamic_sidebar('footer-sidebar-2');
			}
			?>
			</div>
			<div id="footer-sidebar3">
			<?php
			if(is_active_sidebar('footer-sidebar-3')){
			dynamic_sidebar('footer-sidebar-3');
			}
			?>
			</div>
		</div>
		<div class="footer_logo-container footer-margin">
			<!-- <?php
	           the_custom_logo();
	        ?> -->
	        <img class="footer-logo" src="<?php bloginfo('template_url'); ?>/assets/pankaata-logo copy.png" />
            </div>

            <div class="footer_social-container footer-margin">
	            <a href="https://www.facebook.com/pankaata/?ref=br_rs">
	                <i class="fab fa-facebook-square"></i>
	            </a>
	            <a href="https://twitter.com/officialladyann">
	                <i class="fab fa-twitter-square"></i>
	            </a>
	            <a href="https://www.instagram.com/officialladyann/">
	              <i class="fab fa-instagram"></i>
	            </a>
	        </div>
	         <div class="footer_links-container footer-margin">
                    <ul>
                        <li >About Lady. Ann</li>
                        <li >Privacy Policy</li>
                        <li >
                            Communications Preference
                        </li>
                        <li >Terms of Use</li>
                        <li >
                            Place An Advert With Lady. Ann
                        </li>
                    </ul>
                </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
