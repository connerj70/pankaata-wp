<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lady-ann
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'lady-ann');?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
the_custom_logo();
if (is_front_page() && is_home()):
?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a></h1>
				<?php
else:
?>
				<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a></p>
				<?php
endif;
$lady_ann_description = get_bloginfo('description', 'display');
if ($lady_ann_description || is_customize_preview()):
?>
			<?php endif;?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
			<?php
wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'menu_id' => 'primary-menu',
));
?>
<i class="fas fa-bell notification-bell"></i>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div class="secondary-nav-container">
		<div class="secondary-nav">
			<div class="secondary-nav-left">
			</div>
			<div class="secondary-nav-right">
				<?php get_search_form(); ?>
				<!-- <input type="text" class="secondary-nav-search search-hidden"/> -->
				<!-- <i class="fas fa-search search-icon"></i> -->
			</div>
		</div>
	</div>

	<div id="content" class="site-content">
		<div class="inner-site-content">
