<?php
/**
 * Implement Theme Customizer
 *
 */

// Load Customizer Helper Functions
require( get_template_directory() . '/inc/customizer/customizer-functions.php' );

// Add Theme Options section to Customizer
add_action( 'customize_register', 'smartline_customize_register_options' );

function smartline_customize_register_options( $wp_customize ) {

	// Add Section for Theme Options
	$wp_customize->add_section( 'smartline_section_options', array(
        'title'    => __( 'Theme Options', 'smartline-lite' ),
        'priority' => 180
		)
	);
	$wp_customize->add_section( 'smartline_section_upgrade', array(
        'title'    => __( 'PRO Version', 'smartline-lite' ),
        'priority' => 190
		)
	);
	
	// Add Settings and Controls for Layout
	$wp_customize->add_setting( 'smartline_theme_options[layout]', array(
        'default'           => 'right-sidebar',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_layout'
		)
	);
    $wp_customize->add_control( 'smartline_control_layout', array(
        'label'    => __( 'Theme Layout', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => __( 'Left Sidebar', 'smartline-lite' ),
            'right-sidebar' => __( 'Right Sidebar', 'smartline-lite')
			)
		)
	);

	// Add Header Content Headline
	$wp_customize->add_setting( 'smartline_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Header_Control(
        $wp_customize, 'smartline_control_header_content', array(
            'label' => __( 'Header Content', 'smartline-lite' ),
            'section' => 'smartline_section_options',
            'settings' => 'smartline_theme_options[header_content]',
            'priority' => 	3
            )
        )
    );
	$wp_customize->add_setting( 'smartline_theme_options[header_content_description]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Description_Control(
        $wp_customize, 'smartline_control_header_content_description', array(
            'label' =>  __( 'The Header Content configured below will be displayed on the right hand side of the header area.', 'smartline-lite' ),
            'section' => 'smartline_section_options',
            'settings' => 'smartline_theme_options[header_content_description]',
            'priority' => 	4,
			'description' =>  __( 'Stay hungry. Stay foolish.', 'smartline-lite' )
            )
        )
    );

	// Add Settings and Controls for Header
	$wp_customize->add_setting( 'smartline_theme_options[header_search]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_header_search', array(
        'label'    => __( 'Display search field on header area', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[header_search]',
        'type'     => 'checkbox',
		'priority' => 6
		)
	);

	$wp_customize->add_setting( 'smartline_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_header_icons', array(
        'label'    => __( 'Display Social Icons on header area', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 7
		)
	);

	// Add Settings and Controls for Posts
	$wp_customize->add_setting( 'smartline_theme_options[posts_length]', array(
        'default'           => 'index',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_post_length'
		)
	);
    $wp_customize->add_control( 'smartline_control_posts_length', array(
        'label'    => __( 'Post Length on archives', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[posts_length]',
        'type'     => 'radio',
		'priority' => 8,
        'choices'  => array(
            'index' => __( 'Show full posts', 'smartline-lite' ),
            'excerpt' => __( 'Show post summaries (excerpt)', 'smartline-lite' )
			)
		)
	);

	$wp_customize->add_setting( 'smartline_theme_options[post_thumbnails_index]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_posts_thumbnails_index', array(
        'label'    => __( 'Display featured images on archive pages', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[post_thumbnails_index]',
        'type'     => 'checkbox',
		'priority' => 9
		)
	);

	$wp_customize->add_setting( 'smartline_theme_options[post_thumbnails_single]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_posts_thumbnails_single', array(
        'label'    => __( 'Display featured images on single posts', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[post_thumbnails_single]',
        'type'     => 'checkbox',
		'priority' => 10
		)
	);
	
	// Add settings and controls for Post Slider
	$wp_customize->add_setting( 'smartline_theme_options[slider_activated]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Header_Control(
        $wp_customize, 'smartline_control_slider_activated', array(
            'label' => __( 'Activate Featured Post Slider', 'smartline-lite' ),
            'section' => 'smartline_section_options',
            'settings' => 'smartline_theme_options[slider_activated]',
            'priority' => 	12
            )
        )
    );
	$wp_customize->add_setting( 'smartline_theme_options[slider_activated_front_page]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_slider_activated_frontpage', array(
        'label'    => __( 'Display Slider on Magazine Front Page template.', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[slider_activated_front_page]',
        'type'     => 'checkbox',
		'priority' => 13
		)
	);
	$wp_customize->add_setting( 'smartline_theme_options[slider_activated_blog]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_slider_activated_blog', array(
        'label'    => __( 'Display Slider on normal blog index.', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[slider_activated_blog]',
        'type'     => 'checkbox',
		'priority' => 14
		)
	);

	$wp_customize->add_setting( 'smartline_theme_options[slider_animation]', array(
        'default'           => 'horizontal',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_slider_animation'
		)
	);
    $wp_customize->add_control( 'smartline_control_slider_animation', array(
        'label'    => __( 'Slider Animation', 'smartline-lite' ),
        'section'  => 'smartline_section_options',
        'settings' => 'smartline_theme_options[slider_animation]',
        'type'     => 'radio',
		'priority' => 15,
        'choices'  => array(
            'horizontal' => __( 'Horizontal Slider', 'smartline-lite' ),
            'fade' => __( 'Fade Slider', 'smartline-lite' )
			)
		)
	);
	
	
	// Add PRO Version Section
	$wp_customize->add_setting( 'smartline_theme_options[pro_version_label]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Header_Control(
        $wp_customize, 'smartline_control_pro_version_label', array(
            'label' => __( 'Need more features?', 'smartline-lite' ),
            'section' => 'smartline_section_upgrade',
            'settings' => 'smartline_theme_options[pro_version_label]',
            'priority' => 	1
            )
        )
    );
	$wp_customize->add_setting( 'smartline_theme_options[pro_version]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Text_Control(
        $wp_customize, 'smartline_control_pro_version', array(
            'label' =>  __( 'Check out the PRO version which comes with additional features and advanced customization options.', 'smartline-lite' ),
            'section' => 'smartline_section_upgrade',
            'settings' => 'smartline_theme_options[pro_version]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'smartline_theme_options[pro_version_button]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Button_Control(
        $wp_customize, 'smartline_control_pro_version_button', array(
            'label' => __('Learn more about the PRO Version', 'smartline-lite'),
			'section' => 'smartline_section_upgrade',
            'settings' => 'smartline_theme_options[pro_version_button]',
            'priority' => 	3
            )
        )
    );
	
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Change default background section
	$wp_customize->get_control( 'background_color'  )->section   = 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     = 'Background';
	
	// Add Header Tagline option
	$wp_customize->add_setting( 'smartline_theme_options[header_tagline]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'smartline_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'smartline_control_header_tagline', array(
        'label'    => __( 'Display Tagline beside site title.', 'smartline-lite' ),
        'section'  => 'title_tagline',
        'settings' => 'smartline_theme_options[header_tagline]',
        'type'     => 'checkbox',
		'priority' => 99
		)
	);
	
}


// Embed JS file to make Theme Customizer preview reload changes asynchronously.
add_action( 'customize_preview_init', 'smartline_customize_preview_js' );

function smartline_customize_preview_js() {
	wp_enqueue_script( 'smartline-lite-customizer-js', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140312', true );
}


// Embed CSS styles for Theme Customizer
add_action( 'customize_controls_print_styles', 'smartline_customize_preview_css' );

function smartline_customize_preview_css() {
	wp_enqueue_style( 'smartline-lite-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), '20140312' );

}



?>