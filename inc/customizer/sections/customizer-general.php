<?php
/**
 * Register General section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'smartline_customize_register_general_settings' );

function smartline_customize_register_general_settings( $wp_customize ) {

	// Add General Section
	$wp_customize->add_section( 'smartline_section_general', array(
        'title'    => esc_html__( 'General Settings', 'smartline-lite' ),
        'priority' => 10,
		'panel' => 'smartline_options_panel'
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
        'label'    => esc_html__( 'Theme Layout', 'smartline-lite' ),
        'section'  => 'smartline_section_general',
        'settings' => 'smartline_theme_options[layout]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'left-sidebar' => esc_html__( 'Left Sidebar', 'smartline-lite' ),
            'right-sidebar' => esc_html__( 'Right Sidebar', 'smartline-lite' )
			)
		)
	);

}
