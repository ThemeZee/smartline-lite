<?php
/**
 * Custom functions that are not template related
 *
 * @package Smartline Lite
 */

 
// Add Default Menu Fallback Function
function smartline_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function smartline_get_featured_content() {
	return apply_filters( 'smartline_get_featured_content', false );
}


// Change Excerpt Length
add_filter('excerpt_length', 'smartline_excerpt_length');
function smartline_excerpt_length($length) {
    
	// Get Theme Options from Database
	$theme_options = smartline_theme_options();

	// Return Excerpt Length
	if ( isset($theme_options['excerpt_length']) and $theme_options['excerpt_length'] >= 0 ) :
		return absint( $theme_options['excerpt_length'] );
	else :
		return 60; // number of words
	endif;
}


// Slideshow Excerpt Length
function smartline_slideshow_excerpt_length($length) {
    return 15;
}

// Frontpage Category Excerpt Length
function smartline_frontpage_category_excerpt_length($length) {
    return 25;
}


// Change Excerpt More
add_filter('excerpt_more', 'smartline_excerpt_more');
function smartline_excerpt_more($more) {
    
	// Get Theme Options from Database
	$theme_options = smartline_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}