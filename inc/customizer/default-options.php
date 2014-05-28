<?php
/**
 * Returns theme options
 *
 * Use sane defaults in case the user has not configured any theme options yet.
 */


// Return theme options
function smartline_theme_options() {
    
	// Get theme options from DB
	$theme_options = get_option( 'smartline_theme_options' );
    
	// Check if user has already configured theme options
	if ( false === $theme_options ) :
		
		// Set Default Options
		$theme_options = smartline_default_options();
		
    endif;
	
	// Return theme options
	return $theme_options;
}


// Build default options array
function smartline_default_options() {

	$default_options = array(
		'layout' 							=> 'right-sidebar',
		'header_tagline' 					=> true,
		'header_search' 					=> false,
		'header_icons' 						=> false,
		'posts_length' 						=> 'index',
		'post_thumbnails_index'				=> true,
		'post_thumbnails_single' 			=> true,
		'slider_activated_front_page' 		=> false,
		'slider_activated_blog' 			=> false,
		'slider_animation' 					=> 'horizontal'
	);
	
	return $default_options;
}


?>