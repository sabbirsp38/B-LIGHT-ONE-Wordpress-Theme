<?php
/**
 * blightone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blightone
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'BLIGHTONE_VERSION', '1.0.0' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'blightone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function blightone_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on blightone, use a find and replace
		* to change 'blightone' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blightone', get_template_directory() . '/languages' );

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
	set_post_thumbnail_size( 500, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'blightone' ),
			'catagory' => esc_html__( 'catagory', 'blightone' ),
			'footer' => esc_html__( 'footer', 'blightone' ),
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
			'blightone_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for page excerpt.
	add_post_type_support( 'page', 'excerpt' );

	

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 350,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	if ( is_admin() ) {
		blightone_version_in_db();
	}
}
endif;
add_action( 'after_setup_theme', 'blightone_setup' );




function blightone_version_in_db() {
	$theme_version_option_name = 'blightone_theme_version';
	// The theme version saved in the database.
	$blightone_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $blightone_theme_db_version || version_compare( $blightone_theme_db_version, BLIGHTONE_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, BLIGHTONE_VERSION );
	}
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blightone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blightone_content_width', 800 );
}
add_action( 'after_setup_theme', 'blightone_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function blightone_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'blightone-fonts', blightone_fonts_url(), array(), null );

	// bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets-file/css/bootstrap' . blightone_min() . '.css' );

    //	font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets-file/css/font-awesome' . blightone_min() . '.css' );


	// blocks
	wp_enqueue_style( 'blightone-blocks', get_template_directory_uri() . '/assets-file/css/blocks' . blightone_min() . '.css' );

	// coustom
	wp_enqueue_style( 'blightone-coustom', get_template_directory_uri() . '/assets-file/css/style'  . '.css' );

	wp_enqueue_style( 'blightone-style', get_stylesheet_uri() );

	wp_script_add_data( 'blightone-html5', 'conditional', 'lt IE 9' );


	wp_enqueue_script( 'imagesloaded', '', array( 'jquery' ), '', true );
   //Get Bootstrap
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets-file/js/bootstrap' . '.js', array( 'jquery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'blightone_scripts' );

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
 * Add redux-framework core File
 */
require get_template_directory() . '/inc/redux/redux-core/framework.php';

/**
 * Add Customizer on Admin Function with redux-framework 
 */
require get_template_directory() . '/inc/admin-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Enqueue WP Bootstrap Navwalker library (responsive menu).
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function blightone_min() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}


/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function blite_min() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

if ( ! function_exists( 'blightone_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function blightone_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Cormorant Garamond, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Cormorant Garamond font: on or off', 'blightone' ) ) {
		$fonts[] = 'Cormorant Garamond:200,300,400,500,600,700,900';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since blightone 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function blightone_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'blightone-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'blightone_resource_hints', 10, 2 );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
add_action( 'widgets_init', 'blightone_sidebars' );
function blightone_sidebars(){
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets 1', 'blight-one' ),
		'id'            => 'blight-one-sidebar-footer1',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'blight-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets 2', 'blight-one' ),
		'id'            => 'blight-one-sidebar-footer2',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'blight-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets 3', 'blight-one' ),
		'id'            => 'blight-one-sidebar-footer3',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'blight-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets 4', 'blight-one' ),
		'id'            => 'blight-one-sidebar-footer4',
		'description'   => esc_html__( 'Drag and drop your widgets here.', 'blight-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
}

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});



