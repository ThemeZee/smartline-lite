<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'smartline_enqueue_scripts');

function smartline_enqueue_scripts() {

	// Get Theme Options from Database
	$theme_options = smartline_theme_options();

	// Get Theme Version
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet
	wp_enqueue_style( 'smartline-lite-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register Genericons
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', array(), '3.4.1' );

	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( ( isset($theme_options['slider_activated_blog']) and $theme_options['slider_activated_blog'] == true )
		|| ( isset($theme_options['slider_activated_front_page']) and $theme_options['slider_activated_front_page'] == true ) ) :

		// FlexSlider CSS
		wp_enqueue_style( 'smartline-lite-flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '20160719' );

		// FlexSlider JS
		wp_enqueue_script( 'flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.0' );

		// Register and enqueue slider.js
		wp_enqueue_script( 'smartline-lite-jquery-frontpage_slider', get_template_directory_uri() .'/js/slider.js', array( 'flexslider' ), '2.6.0' );

	endif;

	// Register and enqueue navigation.js
	wp_enqueue_script( 'smartline-lite-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20160719' );

	// Passing Parameters to Navigation.js Javascript
	wp_localize_script( 'smartline-lite-jquery-navigation', 'smartline_menu_title', esc_html__( 'Menu', 'smartline-lite' ) );

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register and Enqueue Font
	wp_enqueue_style( 'smartline-lite-default-fonts', smartline_fonts_url(), array(), null );

}


/*
* Retrieve Font URL to register default Google Fonts
* Source: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function smartline_fonts_url() {
    $fonts_url = '';

	// Get Theme Options from Database
	$theme_options = smartline_theme_options();

	// Only embed Google Fonts if not deactivated
	if ( ! ( isset($theme_options['deactivate_google_fonts']) and $theme_options['deactivate_google_fonts'] == true ) ) :

		// Set Default Fonts
		$font_families = array('Raleway:400,700', 'Bitter');

		// Set Google Font Query Args
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		// Create Fonts URL
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	endif;

	return apply_filters( 'smartline_google_fonts_url', $fonts_url );

}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'smartline_setup' );

function smartline_setup() {

	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 860;

	// init Localization
	load_theme_textdomain('smartline-lite', get_template_directory() . '/languages' );

	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array(
		'default-color' => 'e5e5e5',
		'default-image' => get_template_directory_uri() . '/images/background.png'));

	// Set up the WordPress core custom logo feature
	add_theme_support( 'custom-logo', apply_filters( 'smartline_custom_logo_args', array(
		'height' => 50,
		'width' => 300,
		'flex-height' => true,
		'flex-width' => true,
	) ) );

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1340,
		'height' => 250,
		'flex-height' => true));

	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );

	// Register Navigation Menus
	register_nav_menu( 'primary', esc_html__( 'Main Navigation', 'smartline-lite' ) );
	register_nav_menu( 'secondary', esc_html__( 'Top Navigation', 'smartline-lite' ) );
	register_nav_menu( 'footer', esc_html__( 'Footer Navigation', 'smartline-lite' ) );

	// Register Social Icons Menu
	register_nav_menu( 'social', esc_html__( 'Social Icons', 'smartline-lite' ) );

	// Add Theme Support for Selective Refresh in Customizer
	add_theme_support( 'customize-selective-refresh-widgets' );

}


// Add custom Image Sizes
add_action( 'after_setup_theme', 'smartline_add_image_sizes' );

function smartline_add_image_sizes() {

	// Add Custom Header Image Size
	add_image_size( 'custom_header_image', 1340, 250, true);

	// Add Featured Image Size
	add_image_size( 'featured_image', 300, 200, true);

	// Add Slider Image Size
	add_image_size( 'slider_image', 880, 350, true);

	// Add Frontpage Thumbnail Sizes
	add_image_size( 'category_posts_wide_thumb', 600, 240, true);
	add_image_size( 'category_posts_small_thumb', 90, 90, true);
	add_image_size( 'category_posts_single', 880, 260, true);

	// Add Widget Post Thumbnail Size
	add_image_size( 'widget_post_thumb', 75, 75, true);

}


// Register Sidebars
add_action( 'widgets_init', 'smartline_register_sidebars' );

function smartline_register_sidebars() {

	// Register Sidebar
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'smartline-lite' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except the full width template.', 'smartline-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

	// Register Magazine Homepage
	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'smartline-lite' ),
		'id' => 'frontpage-magazine',
		'description' => esc_html__( 'Appears on Magazine Homepage template only. You can use the Category Posts widgets here.', 'smartline-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));

}


/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-layout.php' );
require( get_template_directory() . '/inc/customizer/frontend/custom-slider.php' );

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';

// include Widget Files
require( get_template_directory() . '/inc/widgets/widget-category-posts-boxed.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-columns.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-grid.php' );
require( get_template_directory() . '/inc/widgets/widget-category-posts-single.php' );

// Include Featured Content class
require( get_template_directory() . '/inc/featured-content.php' );