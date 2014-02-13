<?php
/**
 * Craftory Framework functions and definitions
 *
 * @package Craftory Framework
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'craftory_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function craftory_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Craftory Framework, use a find and replace
	 * to change 'craftory' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'craftory', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in up to four locations.
	register_nav_menus( array(
		'above-header' => __( 'Above Header', 'craftory' ),
		'below-header' => __( 'Below Header', 'craftory' ),
		'above-footer' => __( 'Above Footer', 'craftory' ),
		'below-footer' => __( 'Below Footer', 'craftory' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'craftory_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
}
endif; // craftory_setup
add_action( 'after_setup_theme', 'craftory_setup' );

/**
 * Enqueue scripts and styles.
 * 
 * To override the layout and color schemes in a child theme,
 * use wp_dequeue_style( 'craftory-layout' ); etc. and then
 * register and enqueue your own layout stylesheet.
 * 
 */
function craftory_scripts() {
	wp_enqueue_style( 'craftory-style', get_template_directory_uri() . '/style.css' );
	
	// load color scheme stylesheets if needed
	$options = get_option( 'craftory' );
	if ( isset( $options['color'] ) && !empty( $options['color'] ) ) {
	 	$css = get_template_directory_uri() . '/css/'.$options['color'].'.css';
		if ( !empty( $css ) )
			wp_enqueue_style( 'craftory-'.$options['color'], $css );
	}
	
	wp_enqueue_script( 'craftory-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'craftory-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'craftory_scripts' );

/**
 * Set selected layout as body class.
 */

add_filter('body_class', 'craftory_body_class');
function craftory_body_class( $classes ) {
	$options = get_option( 'craftory' );
	if ( isset( $options['layout'] ) && 'left' == $options['layout'] )
		$classes[] = 'content-sidebar';
	if ( isset( $options['layout'] ) && 'right' == $options['layout'] )
		$classes[] = 'sidebar-content';
	return $classes;
}

/**
 * Register widget areas.
 */
function craftory_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'craftory' ),
		'description'	=> __( 'This widget area appears as the sidebar.', 'craftory' ),
		'id'            => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'craftory' ),
		'description'	=> __( 'This widget area appears in the header, next to the site title.', 'craftory' ),
		'id'            => 'header-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'craftory' ),
		'description'	=> __( 'This widget area appears in the footer.', 'craftory' ),
		'id'            => 'footer-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'craftory_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom filters.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Customizer options.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load theme options.
 */
require get_template_directory() . '/inc/options.php';

/**
 * Load Jetpack compatibility files.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *  if Jetpack isn't activated, include its mobile class file
 */
if ( !function_exists('jetpack_is_mobile') )
	require get_template_directory() . '/inc/class.jetpack-user-agent.php';
