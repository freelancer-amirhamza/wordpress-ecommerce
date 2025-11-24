<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */


if ( ! function_exists( 'ecommerce_bazaar_customizer_footer_register' ) ) :
function ecommerce_bazaar_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'ecommerce_bazaar_footer_settings',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'ecommerce-bazaar' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_footer_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'ecommerce_bazaar_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_footer_copyright_text',
        array(
            'settings'      => 'ecommerce_bazaar_footer_copyright_text',
            'section'       => 'ecommerce_bazaar_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'ecommerce-bazaar' )
        )
    );
}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_footer_register' );