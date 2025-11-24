<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */

if ( ! function_exists( 'ecommerce_bazaar_customizer_typography_setting_register' ) ) :
function ecommerce_bazaar_customizer_typography_setting_register( $wp_customize ) {

    // Add Typography Panel for Body and Heading
    $wp_customize->add_panel(
        'ecommerce_bazaar_typography_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Typography Settings', 'ecommerce-bazaar' ),
        )
    );

    // Section Body Typography
    $wp_customize->add_section(
        'ecommerce_bazaar_body_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Body', 'ecommerce-bazaar' ),
            'panel'         => 'ecommerce_bazaar_typography_settings_panel',
        )
    );

    // Body Font Family Setting
    $wp_customize->add_setting(
        'ecommerce_bazaar_body_font_family',
        array(
            'default'           => 'Noto Sans, sans-serif', // Default font
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_font_family', // Custom sanitize function
        )
    );
    $wp_customize->add_control( new Ecommerce_Bazaar_Font_Select_Control(
    $wp_customize,
    'ecommerce_bazaar_body_font_family',
    array(
        'label'   => esc_html__( 'Body Font Family', 'ecommerce-bazaar' ),
        'section' => 'ecommerce_bazaar_body_typography_settings',
        'choices' => ecommerce_bazaar_get_google_fonts(),
    )
    ));

    // Section Heading Typography
    $wp_customize->add_section(
        'ecommerce_bazaar_heading_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Heading', 'ecommerce-bazaar' ),
            'panel'         => 'ecommerce_bazaar_typography_settings_panel',
        )
    );

    // Heading Font Family Setting
    $wp_customize->add_setting(
        'ecommerce_bazaar_heading_font_family',
        array(
            'default'           => 'Noto Sans, sans-serif', // Default font
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_font_family', // Custom sanitize function
        )
    );
    $wp_customize->add_control( new Ecommerce_Bazaar_Font_Select_Control(
    $wp_customize,
    'ecommerce_bazaar_heading_font_family',
    array(
        'label'   => esc_html__( 'Heading Font Family', 'ecommerce-bazaar' ),
        'section' => 'ecommerce_bazaar_heading_typography_settings',
        'choices' => ecommerce_bazaar_get_google_fonts(),
    )
    ));
}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_typography_setting_register' );

// Function to fetch Google Fonts
function ecommerce_bazaar_get_google_fonts() {
    // Add Google Fonts to be available for selection
    return array(
        'Noto Sans, sans-serif' => 'Noto Sans',
        'Arial, sans-serif'   => 'Arial',
        'Georgia, serif'      => 'Georgia',
        'Verdana, sans-serif' => 'Verdana',
        'Times New Roman, serif' => 'Times New Roman',
        'Roboto, sans-serif'  => 'Roboto',
        'Open Sans, sans-serif' => 'Open Sans',
        'Lora, serif'         => 'Lora',
        'Merriweather, serif' => 'Merriweather',
        'Montserrat, sans-serif' => 'Montserrat',
        // Add more Google fonts as needed
    );
}

// Sanitize Google Fonts input
function ecommerce_bazaar_sanitize_font_family( $value ) {
    $allowed_fonts = array(
        'Arial, sans-serif', 'Georgia, serif', 'Verdana, sans-serif', 
        'Times New Roman, serif', 'Roboto, sans-serif', 'Open Sans, sans-serif',
        'Lora, serif', 'Merriweather, serif', 'Montserrat, sans-serif','Noto Sans, sans-serif',
        // Add more allowed fonts to this array
    );

    if ( in_array( $value, $allowed_fonts ) ) {
        return $value;
    } else {
        return 'Noto Sans, sans-serif'; // Default fallback font
    }
}

function ecommerce_bazaar_sanitize_title( $value ) {
    return sanitize_text_field( $value );
}
