<?php
/**
 * Register upgrade section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'smartline_customize_register_upgrade_settings' );

function smartline_customize_register_upgrade_settings( $wp_customize ) {
	
	// Add Upgrade / More Features Section
	$wp_customize->add_section( 'smartline_section_upgrade', array(
        'title'    => esc_html__( 'More Features', 'smartline-lite' ),
        'priority' => 70,
		'panel' => 'smartline_options_panel' 
		)
	);
	
	// Add custom Upgrade Content control
	$wp_customize->add_setting( 'smartline_theme_options[upgrade]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Smartline_Customize_Upgrade_Control(
        $wp_customize, 'smartline_control_upgrade', array(
            'section' => 'smartline_section_upgrade',
            'settings' => 'smartline_theme_options[upgrade]',
            'priority' => 1
            )
        )
    );

}