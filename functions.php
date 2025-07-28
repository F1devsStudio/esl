<?php
/**
 * F1devs esl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package F1devsesl
 */

if ( ! function_exists( 'f1devsesl_setup' ) ) :
	function f1devsesl_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'f1devs-esl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Enable Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'status', 'quote', 'link' ) );

		// Enable support for woocommerce.
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'f1devs-esl' ),
            'header_menu' => esc_html__( 'Header Menu', 'f1devs-esl' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'f1devsesl_custom_background_args', array(
			'default-color' => 'f8f9fa',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'f1devsesl_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function f1devsesl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'f1devsesl_content_width', 800 );
}
add_action( 'after_setup_theme', 'f1devsesl_content_width', 0 );




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function f1devsesl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'f1devs-esl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'f1devs-esl' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'f1devs-esl' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'f1devs-esl' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'f1devs-esl' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'f1devs-esl' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'f1devsesl_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function f1devsesl_scripts() {
    wp_enqueue_style( 'bootstrap-5', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), 'v5.2.3', 'all' );
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', array(), '1.10.5', 'all');
    wp_enqueue_style( 'f1devs-esl-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap-5'), '1.0.0', 'all' );
    wp_enqueue_style( 'f1devs-esl-style-icons', get_template_directory_uri() . '/assets/css/esl-icon.css', array('bootstrap-5'), '1.0.0', 'all' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array('jquery'), 'v3.6.0', true );
    wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/assets/js/jquery.viewportchecker.min.js', array(), 'v1.0.0', true );

    wp_enqueue_style( 'f1devs-esl-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );

    wp_enqueue_script( 'bootstrap-5-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 'v5.0.0', true );
    wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), 'v1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'f1devsesl_scripts' );


/**
 * Registers an editor stylesheet for the theme.
 */
function f1devsesl_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'f1devsesl_add_editor_styles' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
//if ( class_exists( 'WooCommerce' ) ) {
//	require get_template_directory() . '/inc/woocommerce.php';
//}
