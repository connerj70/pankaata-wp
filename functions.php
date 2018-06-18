<?php
/**
 * lady-ann functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lady-ann
 */

function advanced_custom_field_excerpt() {
	global $post;
	$text = get_field('situation_box');
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length =30; // 30 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

if ( ! function_exists( 'lady_ann_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lady_ann_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lady-ann, use a find and replace
		 * to change 'lady-ann' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lady-ann', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'htnml5', array('search-form') );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lady-ann' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lady_ann_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lady_ann_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lady_ann_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'lady_ann_content_width', 640 );
}
add_action( 'after_setup_theme', 'lady_ann_content_width', 0 );

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');


//THIS IS CAUSING THE POSTS NOT TO LOAD!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//BUT I NEED IT FOR THE ADD TO ANY BUTTONS TO SHOW UP ON POSTS LOADED THROUGH AJAX

function addtoany_misha_loadmore( $query ) {
	// Remove to avoid the check.
	remove_filter( 'the_content', 'A2A_SHARE_SAVE_add_to_content', 98 );
	remove_filter( 'the_excerpt', 'A2A_SHARE_SAVE_add_to_content', 98 );
	// Add without the check.
	// add_filter( 'the_content', 'A2A_SHARE_SAVE_add_to_content', 98 );
	add_filter( 'the_excerpt', 'A2A_SHARE_SAVE_add_to_content', 98 );
}
add_action( 'pre_get_posts', 'addtoany_misha_loadmore' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lady_ann_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lady-ann' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lady-ann' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'lady_ann_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lady_ann_scripts() {
	wp_enqueue_style( 'lady-ann-style', get_stylesheet_uri() );

	wp_enqueue_style('letter-style', get_template_directory_uri() . '/styles/letters.css');

	wp_enqueue_style('email-style', get_template_directory_uri() . '/styles/email.css');

	wp_enqueue_style( 'font-awesome', "https://use.fontawesome.com/releases/v5.0.9/css/all.css" );

	wp_enqueue_script( 'lady-ann-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151215', true );

	// validation
	wp_register_script( 'validation', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'validation' );

	wp_enqueue_script( 'lady-ann-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lady_ann_scripts' );

/**
 * Implement the Custom Header feature.o
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/ajax.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* INFINITE SCROLLING AJAX * -----------------------------*/




/*INFINITE SCROLLING AJAX END ----------------------------*/













