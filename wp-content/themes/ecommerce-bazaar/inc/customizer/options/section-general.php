<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */

if ( ! function_exists( 'ecommerce_bazaar_customizer_general_setting_register' ) ) :
function ecommerce_bazaar_customizer_general_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'ecommerce_bazaar_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'ecommerce-bazaar' )
        )
    );

 	// Add general Panel for preloader and scrolltop
    $wp_customize->add_panel(
        'ecommerce_bazaar_general_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'ecommerce-bazaar' ),
        )
    );

    // Section preloader
    $wp_customize->add_section(
        'ecommerce_bazaar_prelodr_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Preloader', 'ecommerce-bazaar' ),
            'panel'         => 'ecommerce_bazaar_general_settings_panel',
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_preloader_settings', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_preloader_settings', 
		array(
		    'label'       => esc_html__( 'Preloader Settings', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_prelodr_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_preloader_settings',
		) 
	));

	// Add an option to enable the preloader
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_preloader', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_preloader', 
		array(
		    'label'       => esc_html__( 'Show Preloader', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_prelodr_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_preloader',
		) 
	));


    // Section Body Typography
    $wp_customize->add_section(
        'ecommerce_bazaar_scrol_settings',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Scroll Top', 'ecommerce-bazaar' ),
            'panel'         => 'ecommerce_bazaar_general_settings_panel',
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_scroll_top_settings', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_scroll_top_settings', 
		array(
		    'label'       => esc_html__( 'Scroll Top Settings', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_scrol_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_scroll_top_settings',
		) 
	));

	// Add an option to enable the scrolltop
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_scrolltop', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_scrolltop', 
		array(
		    'label'       => esc_html__( 'Show Scroll Top', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_scrol_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_scrolltop',
		) 
	));

	 $wp_customize->add_section(
        'ecommerce_bazaar_button_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Buttons', 'ecommerce-bazaar' ),
            'panel'         => 'ecommerce_bazaar_general_settings_panel',
        )
    );

	 // Border Radius Setting
	$wp_customize->add_setting(
	    'ecommerce_bazaar_button_border_radius',
	    array(
	        'default'           => '0px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'ecommerce_bazaar_button_border_radius',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Border Radius (e.g. 4px, 50%)', 'ecommerce-bazaar' ),
	        'section'  => 'ecommerce_bazaar_button_settings',
	    )
	);

	// Button Padding Setting
	$wp_customize->add_setting(
	    'ecommerce_bazaar_button_padding',
	    array(
	        'default'           => '10px 40px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'ecommerce_bazaar_button_padding',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Padding (e.g. 10px 20px)', 'ecommerce-bazaar' ),
	        'section'  => 'ecommerce_bazaar_button_settings',
	    )
	);


}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_general_setting_register' );