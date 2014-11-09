<?php
/**
 * Register Post Slider section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'smartline_customize_register_slider_settings' );

function smartline_customize_register_slider_settings( $wp_customize ) {

	// Add Sections for Slider Settings
	$wp_customize->add_section( 'smartline_section_slider', array(
        'title'    => __( 'Post Slider', 'smartline-lite' ),
		'description' => __( 'The slideshow displays your featured posts, which you can configure on the "Featured Content" section above.', 'smartline-lite' ),
        'priority' => 50,
		'panel' => 'smartline_options_panel' 
		)
	);

	// Add settings and controls for Post Slider
	$wp_customize->add_setting( 'smartline_theme_options[slider_activated]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Header_Control(
        $wp_customize, 'smartline_control_slider_activated', array(
            'label' => __( 'Activate Featured Post Slider', 'smartline-lite' ),
            'section' => 'smartline_section_slider',
            'settings' => 'smartline_theme_options[slider_activated]',
            'priority' => 1
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
        'section'  => 'smartline_section_slider',
        'settings' => 'smartline_theme_options[slider_activated_front_page]',
        'type'     => 'checkbox',
		'priority' => 2
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
        'section'  => 'smartline_section_slider',
        'settings' => 'smartline_theme_options[slider_activated_blog]',
        'type'     => 'checkbox',
		'priority' => 3
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
        'section'  => 'smartline_section_slider',
        'settings' => 'smartline_theme_options[slider_animation]',
        'type'     => 'radio',
		'priority' => 4,
        'choices'  => array(
            'horizontal' => __( 'Horizontal Slider', 'smartline-lite' ),
            'fade' => __( 'Fade Slider', 'smartline-lite' )
			)
		)
	);
	
}

?>