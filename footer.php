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
	                 <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="30" height="30" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 10h-2v2h2v6h3v-6h1.82l.18-2h-2v-.833c0-.478.096-.667.558-.667h1.442v-2.5h-2.404c-1.798 0-2.596.792-2.596 2.308v1.692z"/></svg>
	            </a>
	            <a href="https://twitter.com/pankaata">
	                 <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="#fff" height="30" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.5 8.778c-.441.196-.916.328-1.414.388.509-.305.898-.787 1.083-1.362-.476.282-1.003.487-1.564.597-.448-.479-1.089-.778-1.796-.778-1.59 0-2.758 1.483-2.399 3.023-2.045-.103-3.86-1.083-5.074-2.572-.645 1.106-.334 2.554.762 3.287-.403-.013-.782-.124-1.114-.308-.027 1.14.791 2.207 1.975 2.445-.346.094-.726.116-1.112.042.313.978 1.224 1.689 2.3 1.709-1.037.812-2.34 1.175-3.647 1.021 1.09.699 2.383 1.106 3.773 1.106 4.572 0 7.154-3.861 6.998-7.324.482-.346.899-.78 1.229-1.274z"/></svg>
	            </a>
	            <a href="https://www.instagram.com/pankaata/">
	                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="30" height="30" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.615 6h-9.23c-.766 0-1.385.62-1.385 1.384v9.23c0 .766.619 1.386 1.385 1.386h9.23c.766 0 1.385-.62 1.385-1.385v-9.23c0-.765-.619-1.385-1.385-1.385zm-4.615 3.693c1.274 0 2.309 1.032 2.309 2.307s-1.035 2.307-2.309 2.307-2.307-1.033-2.307-2.307 1.033-2.307 2.307-2.307zm4.5 6.346c0 .255-.207.461-.461.461h-8.078c-.254 0-.461-.207-.461-.461v-5.039h.949c-.045.158-.078.32-.102.486-.023.168-.038.339-.038.514 0 2.04 1.652 3.693 3.691 3.693s3.691-1.653 3.691-3.693c0-.174-.015-.346-.039-.514-.023-.166-.058-.328-.102-.486h.95v5.039zm0-6.991c0 .255-.207.462-.461.462h-1.088c-.256 0-.461-.208-.461-.462v-1.087c0-.255.205-.461.461-.461h1.088c.254 0 .461.207.461.461v1.087z"/></svg>
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
