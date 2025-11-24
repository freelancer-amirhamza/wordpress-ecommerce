<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */

if ( ! function_exists( 'ecommerce_bazaar_customizer_global_color_setting_register' ) ) :
function ecommerce_bazaar_customizer_global_color_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'ecommerce_bazaar_global_color_settings',
        array (
            'priority'      => 40,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Global Color Settings', 'ecommerce-bazaar' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_theme_color_settings', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_theme_color_settings', 
		array(
		    'label'       => esc_html__( 'Global Color Settings', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_global_color_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_theme_color_settings',
		) 
	));

	$wp_customize->add_setting('ecommerce_bazaar_global_color1',
        array(
            'type' => 'theme_mod',
            'default'           => '#eb1749',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ecommerce_bazaar_global_color1',
            array(
                'label'      => esc_html__( 'Global Color1', 'ecommerce-bazaar' ),
                'section'    => 'ecommerce_bazaar_global_color_settings',
                'settings'   => 'ecommerce_bazaar_global_color1',
            )
        )
    );  

}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_global_color_setting_register' );