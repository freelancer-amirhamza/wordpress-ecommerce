<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */


if ( ! function_exists( 'ecommerce_bazaar_customizer_home_product_register' ) ) :
function ecommerce_bazaar_customizer_home_product_register( $wp_customize ) {

    $wp_customize->add_section(
        'ecommerce_bazaar_home_product_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Product Settings', 'ecommerce-bazaar' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'ecommerce_bazaar_label_about_settings_title', 
        array(
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_about_settings_title', 
        array(
            'label'       => esc_html__( 'Product Settings', 'ecommerce-bazaar' ),
            'section'     => 'ecommerce_bazaar_home_product_settings',
            'type'        => 'ecommerce-bazaar-title',
            'settings'    => 'ecommerce_bazaar_label_about_settings_title',
        ) 
    ));

    // Title 1
    $wp_customize->add_setting(
        'ecommerce_bazaar_product_main_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_product_main_heading',
        array(
            'label'           => sprintf( esc_html__( 'Main Heading', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_product_settings',
            'settings'        => 'ecommerce_bazaar_product_main_heading' ,
            'type'            => 'text',
        )
    );

     // Get all product categories to populate the dropdown
    $args = array(
        'taxonomy'   => 'product_cat',
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => false, // Show even empty categories
    );

    $categories = get_terms( $args );
    $cats = array();

    // Prepare categories for the dropdown
    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
        foreach ( $categories as $category ) {
            $cats[$category->slug] = $category->name;
        }
    }

    $wp_customize->add_setting(
        'ecommerce_bazaar_product_category',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_product_category',
        array(
            'label'    => esc_html__( 'Select Product Category', 'ecommerce-bazaar' ),
            'section'  => 'ecommerce_bazaar_home_product_settings',
            'settings' => 'ecommerce_bazaar_product_category',
            'type'     => 'select',
            'choices'  => $cats,
        )
    );

}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_home_product_register' );