<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'smartline_add_theme_info_page');
function smartline_add_theme_info_page() {
	
	add_theme_page( 
		__('Welcome to Smartline', 'smartline-lite'), 
		__('Theme Info', 'smartline-lite'), 
		'edit_theme_options', 
		'smartline', 
		'smartline_display_theme_info_page'
	);
	
}


// Display Theme Info page
function smartline_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme_data = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( __( 'Welcome to %1s %2s', 'smartline-lite' ), $theme_data->Name, $theme_data->Version ); ?></h1>

		<div class="theme-description"><?php echo $theme_data->Description; ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php _e('Important Links:', 'smartline-lite'); ?></strong>
				<a href="http://themezee.com/themes/smartline/" target="_blank"><?php _e('Theme Info Page', 'smartline-lite'); ?></a>
				<a href="http://themezee.com/changelogs/" target="_blank"><?php _e('Changelog', 'smartline-lite'); ?></a>
				<a href="http://preview.themezee.com/smartline/" target="_blank"><?php _e('Theme Demo', 'smartline-lite'); ?></a>
				<a href="http://themezee.com/docs/smartline-lite-documentation/" target="_blank"><?php _e('Theme Documentation', 'smartline-lite'); ?></a>
				<a href="http://wordpress.org/support/view/theme-reviews/smartline-lite?filter=5" target="_blank"><?php _e('Rate this theme', 'smartline-lite'); ?></a>
				
				<span class="social-icons">
					<a href="http://themezee.com/newsletter/" target="_blank"><span class="genericon-mail"></span></a>
					<a href="https://www.facebook.com/ThemeZee" target="_blank"><span class="genericon-facebook"></span></a>
					<a href="https://twitter.com/ThemeZee" target="_blank"><span class="genericon-twitter"></a>
				</span>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">
		
			<h3><?php printf( __( 'Getting Started with %s', 'smartline-lite' ), $theme_data->Name ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
						
					<div class="section">
						<h4><?php _e( 'Theme Documentation', 'smartline-lite' ); ?></h4>
						
						<p class="about"><?php _e( 'Need any help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'smartline-lite' ); ?></p>
						<p>
							<a href="http://themezee.com/docs/smartline-lite-documentation/" target="_blank" class="button button-secondary"><?php _e('Visit Smartline Documentation', 'smartline-lite'); ?></a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Theme Options', 'smartline-lite' ); ?></h4>
						
						<p class="about"><?php _e( 'Smartline supports the awesome Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.', 'smartline-lite' ); ?></p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary">Customize Theme</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Full Version', 'smartline-lite' ); ?></h4>
						
						<p class="about"><?php _e( 'Need more features? Check out the full version which has additional theme options and advanced customization settings for you.', 'smartline-lite' ); ?></p>
						<p>
							<a href="http://themezee.com/themes/smartline/" target="_blank" class="button button-secondary"><?php _e('Learn more about the Full Version of Smartline', 'smartline-lite'); ?></a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( __( 'Smartline is proudly brought to you by %1s. If you like this theme, %2s :) ', 'smartline-lite' ), 
				'<a target="_blank" href="http://themezee.com" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/smartline-lite?filter=5" title="Smartline Lite Review">' . __( 'rate it', 'smartline-lite' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'smartline_theme_info_page_css');
function smartline_theme_info_page_css() { 
	
	// Load styles and scripts only on themezee page
	if ( isset($_GET['page']) and $_GET['page'] == 'smartline' ) :
		
		// Embed theme info css style
		wp_enqueue_style('smartline-lite-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');
		
		// Register Genericons
		wp_enqueue_style('smartline-lite-genericons', get_template_directory_uri() . '/css/genericons.css');
		
	endif;
}


?>