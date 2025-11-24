<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */


if ( ! function_exists( 'ecommerce_bazaar_customizer_header_register' ) ) :
function ecommerce_bazaar_customizer_header_register( $wp_customize ) {

    $wp_customize->add_section(
        'ecommerce_bazaar_home_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'ecommerce-bazaar' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'ecommerce_bazaar_label_header_settings_title', 
        array(
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_header_settings_title', 
        array(
            'label'       => esc_html__( 'Phone Number', 'ecommerce-bazaar' ),
            'section'     => 'ecommerce_bazaar_home_header_settings',
            'type'        => 'ecommerce-bazaar-title',
            'settings'    => 'ecommerce_bazaar_label_header_settings_title',
        ) 
    ));

    // Phone Number
    $wp_customize->add_setting(
        'ecommerce_bazaar_header_phone_number',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_header_phone_number',
        array(
            'label'           => sprintf( esc_html__( 'Phone Number', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_header_phone_number' ,
            'type'            => 'text',
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'ecommerce_bazaar_label_social_meida_settings_title', 
        array(
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_social_meida_settings_title', 
        array(
            'label'       => esc_html__( 'Social Media Links', 'ecommerce-bazaar' ),
            'section'     => 'ecommerce_bazaar_home_header_settings',
            'type'        => 'ecommerce-bazaar-title',
            'settings'    => 'ecommerce_bazaar_label_social_meida_settings_title',
        ) 
    ));

    // Facebook Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_social_media1_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_social_media1_heading',
        array(
            'label'           => sprintf( esc_html__( 'Facebook Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_social_media1_heading' ,
            'type'            => 'url',
        )
    );

    // Instagram Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_social_media2_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_social_media2_heading',
        array(
            'label'           => sprintf( esc_html__( 'Instagram Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_social_media2_heading' ,
            'type'            => 'url',
        )
    );

    // Twitter Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_social_media3_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_social_media3_heading',
        array(
            'label'           => sprintf( esc_html__( 'Twitter Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_social_media3_heading' ,
            'type'            => 'url',
        )
    );

    // Youtube Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_social_media4_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_social_media4_heading',
        array(
            'label'           => sprintf( esc_html__( 'Youtube Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_social_media4_heading' ,
            'type'            => 'url',
        )
    );

    // Pinterest Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_social_media5_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_social_media5_heading',
        array(
            'label'           => sprintf( esc_html__( 'Pinterest Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_social_media5_heading' ,
            'type'            => 'url',
        )
    );

    // Linkedin Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_social_media6_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_social_media6_heading',
        array(
            'label'           => sprintf( esc_html__( 'Linkedin Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_header_settings',
            'settings'        => 'ecommerce_bazaar_social_media6_heading' ,
            'type'            => 'url',
        )
    );

}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_header_register' );