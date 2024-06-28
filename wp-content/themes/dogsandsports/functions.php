<?php
/**
 * dogsandsports functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dogsandsports
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dogsandsports_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dogsandsports, use a find and replace
		* to change 'dogsandsports' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dogsandsports', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dogsandsports' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dogsandsports_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dogsandsports_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dogsandsports_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dogsandsports_content_width', 640 );
}
add_action( 'after_setup_theme', 'dogsandsports_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dogsandsports_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dogsandsports' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dogsandsports' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dogsandsports_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dogsandsports_scripts() {
	wp_enqueue_style( 'dogsandsports-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dogsandsports-style', 'rtl', 'replace' );
	
	wp_enqueue_style( 'viseca', get_template_directory_uri() . '/assets/css/dogs.css', array(), _S_VERSION );


	wp_enqueue_script( 'dogsandsports-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'dogsandsportsjs', get_template_directory_uri() . '/assets/js/dogs.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dogsandsports_scripts' );

/**
 * Implement the Custom Header feature.
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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function theme_enqueue_scripts() {
	// Enqueue jQuery
	wp_enqueue_script('jquery');
	
	// Enqueue your custom script that depends on jQuery
	//wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


function dogs_register_acf_block_types()
{
  acf_register_block_type([
	"name" => "header_teaser",
	"title" => _x("Header Teaser", "header_teaser", "viseca"),
	"description" => __("Display a Header image with content", "viseca"),
	"render_template" => "template-parts/block/header-teaser/header-teaser.php",
	"category" => "viseca-layout-category",
	"icon" => '<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
		<style type="text/css">
			.st0{fill-rule:evenodd;clip-rule:evenodd;fill:#F69F29;}
			.st1{fill:#FFFFFF;}
			.st2{fill:none;stroke:#000000;stroke-width:0.75;stroke-miterlimit:10;}
			.st3{fill:none;stroke:#FFFFFF;stroke-width:0.5;stroke-linecap:round;stroke-linejoin:round;}
		</style>
		<g id="Ebene_1_00000039815538117128226940000017649735256919297976_">
		</g>
		<rect y="0" class="st0" width="16" height="16"/>
		<rect x="0.4" y="0.5" class="st1" width="15.2" height="5.8"/>
		<line class="st2" x1="0.8" y1="5.3" x2="6.7" y2="5.3"/>
		<path class="st3" d="M7.3,10.2H6.1c-0.4,0-0.7,0.3-0.7,0.7v3.1c0,0.4,0.3,0.7,0.7,0.7h3.1c0.4,0,0.7-0.3,0.7-0.7v-1.2 M8.7,9.7h1.9
			 M10.5,9.7v1.9 M10.5,9.7l-3.1,3.1"/>
		</svg>',
		"enqueue_style" =>
		  get_template_directory_uri() .
		  "/assets/css/blocks/header-teaser.css",

	"align" => "full",
	"mode" => "edit",
  ]);
 }

// Check if function exists and hook into setup
 if (function_exists("acf_register_block_type")) {
   add_action("init", "dogs_register_acf_block_types");
 }
 
 
 // Add custom block styles for the 'list' block
 function mytheme_register_custom_block_styles() {
	 // Register a new block style for ul with class 'fancy-list'
	 register_block_style(
		 'core/list',
		 array(
			 'name'  => 'pfeil-liste',
			 'label' => __('Pfeil Liste', 'dogsandsports'),
		 )
	 );
 
	
 }
 add_action('init', 'mytheme_register_custom_block_styles');
