<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */


if ( ! function_exists( 'ecommerce_bazaar_customizer_page_register' ) ) :
function ecommerce_bazaar_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'ecommerce_bazaar_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Page Settings', 'ecommerce-bazaar' )
        )
    );

    // Info label
     $wp_customize->add_setting( 
        'ecommerce_bazaar_label_page_title_hide_settings', 
        array(
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_page_title_hide_settings', 
        array(
            'label'       => esc_html__( 'Hide Page Title', 'ecommerce-bazaar' ),
            'section'     => 'ecommerce_bazaar_page_settings',
            'type'        => 'ecommerce-bazaar-title',
            'settings'    => 'ecommerce_bazaar_label_page_title_hide_settings',
        ) 
    ));

  

    // Hide page title section
    $wp_customize->add_setting(
        'ecommerce_bazaar_enable_page_title',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_page_title', 
        array(
            'settings'      => 'ecommerce_bazaar_enable_page_title',
            'section'       => 'ecommerce_bazaar_page_settings',
            'type'          => 'ecommerce-bazaar-toggle',
            'label'         => esc_html__( 'Show Page Title Section:', 'ecommerce-bazaar' ),
            'description'   => '',           
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'ecommerce_bazaar_label_page_title_bg_settings', 
        array(
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_page_title_bg_settings', 
        array(
            'label'       => esc_html__( 'Page Title Background', 'ecommerce-bazaar' ),
            'section'     => 'ecommerce_bazaar_page_settings',
            'type'        => 'title',
            'settings'    => 'ecommerce_bazaar_label_page_title_bg_settings',
            'active_callback' => 'ecommerce_bazaar_page_title_enable',
        ) 
    ));

    // Background selection
    $wp_customize->add_setting(
        'ecommerce_bazaar_page_bg_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'color',
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_select'
        )
    );

    $wp_customize->add_control(
    	new Ecommerce_Bazaar_Text_Radio_Control( $wp_customize, 'ecommerce_bazaar_page_bg_radio',
        array(
            'settings'      => 'ecommerce_bazaar_page_bg_radio',
            'section'       => 'ecommerce_bazaar_page_settings',
            'type'          => 'radio',
            'label'         => esc_html__( 'Choose Page Title Background Color or Background Image:', 'ecommerce-bazaar' ),
            'description'   => esc_html__('This setting will change the background of the page title area.', 'ecommerce-bazaar'),
            'choices' => array(
                            'color' => esc_html__('Background Color','ecommerce-bazaar'),
                            'image' => esc_html__('Background Image','ecommerce-bazaar'),
                            ),
            'active_callback' => 'ecommerce_bazaar_page_title_enable',
        )
    ));

    // Background color
    $wp_customize->add_setting(
        'ecommerce_bazaar_page_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ecommerce_bazaar_page_bg_color',
            array(
                'label'      => esc_html__( 'Select Background Color', 'ecommerce-bazaar' ),
                'description'   => esc_html__('This setting will add background color to the page title area if Background Color was selected above.', 'ecommerce-bazaar'),
                'section'    => 'ecommerce_bazaar_page_settings',
                'settings'   => 'ecommerce_bazaar_page_bg_color',
                'active_callback' => 'ecommerce_bazaar_page_title_color_enable',
            )
        )
    );
    
     // Background image
    $wp_customize->add_setting(
        'ecommerce_bazaar_page_bg_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'ecommerce_bazaar_page_bg_image',
            array(
                'label'       => esc_html__( 'Upload Background Image', 'ecommerce-bazaar' ),
                'description' => esc_html__('This setting will add a background image to the page title area if Background Image was selected above.', 'ecommerce-bazaar'),
                'section'     => 'ecommerce_bazaar_page_settings',
                'settings'    => 'ecommerce_bazaar_page_bg_image',
                'active_callback' => 'ecommerce_bazaar_page_title_image_enable',
            )
        )
    );
}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_page_register' );