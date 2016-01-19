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
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	add_theme_page( 
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'smartline-lite' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), 
		esc_html__( 'Theme Info', 'smartline-lite' ), 
		'edit_theme_options', 
		'smartline', 
		'smartline_display_theme_info_page'
	);
	
}


// Display Theme Info page
function smartline_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'smartline-lite' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'smartline-lite' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/smartline/', 'smartline-lite' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=smartline&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'smartline-lite' ); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php esc_html_e( 'Changelog', 'smartline-lite' ); ?></a>
				<a href="<?php echo esc_url( 'http://preview.themezee.com/smartline/?utm_source=theme-info&utm_medium=textlink&utm_campaign=smartline&utm_content=demo' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'smartline-lite' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/smartline-documentation/', 'smartline-lite' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=smartline&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'smartline-lite' ); ?></a>
				<a href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/smartline-lite?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'smartline-lite' ); ?></a>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">
		
			<h3><?php printf( esc_html__( 'Getting Started with %s', 'smartline-lite' ), $theme->get( 'Name' ) ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
						
					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'smartline-lite' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'smartline-lite' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/smartline-documentation/', 'smartline-lite' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=smartline&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'smartline-lite' ), 'Smartline' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'smartline-lite' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'smartline-lite' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary">
								<?php esc_html_e( 'Customize Theme', 'smartline-lite' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Pro Version', 'smartline-lite' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'smartline-lite' ), 'Smartline'); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/smartline-pro/', 'smartline-lite' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=smartline&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'smartline-lite' ), 'Smartline'); ?>
							</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'smartline-lite' ), 
				$theme->get( 'Name' ),
				'<a target="_blank" href="' . __( 'https://themezee.com/', 'smartline-lite' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=smartline" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/smartline-lite?filter=5" title="Smartline Lite Review">' . esc_html__( 'rate it', 'smartline-lite' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'smartline_theme_info_page_css');
function smartline_theme_info_page_css( $hook ) { 

	// Load styles and scripts only on theme info page
	if ( 'appearance_page_smartline' != $hook ) {
		return;
	}
	
	// Embed theme info css style
	wp_enqueue_style('smartline-lite-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');

}