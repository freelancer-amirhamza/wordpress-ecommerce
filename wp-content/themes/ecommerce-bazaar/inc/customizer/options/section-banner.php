<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */


if ( ! function_exists( 'ecommerce_bazaar_customizer_home_banner_register' ) ) :
function ecommerce_bazaar_customizer_home_banner_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'ecommerce_bazaar_home_banner_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Banner Settings', 'ecommerce-bazaar' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_banner_settings_title', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_banner_settings_title', 
		array(
		    'label'       => esc_html__( 'Banner Settings', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_home_banner_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_banner_settings_title',
		) 
	));

    // Button Image
    $wp_customize->add_setting(
        'ecommerce_bazaar_banner_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_image',

        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'ecommerce_bazaar_banner_image', 
            array(
                'label'           => sprintf( esc_html__( 'Banner Image', 'ecommerce-bazaar' ), ),
                'settings'  => 'ecommerce_bazaar_banner_image',
                'section'   => 'ecommerce_bazaar_home_banner_settings'
            ) 
        )
    );

    // Banner Heading
	$wp_customize->add_setting(
        'ecommerce_bazaar_banner_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_banner_heading',
        array(
            'label'           => sprintf( esc_html__( 'Banner Heading', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_banner_settings',
            'settings'        => 'ecommerce_bazaar_banner_heading' ,
            'type'            => 'text',
        )
    );

    // Banner Text
    $wp_customize->add_setting(
        'ecommerce_bazaar_banner_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_banner_text',
        array(
            'label'           => sprintf( esc_html__( 'Banner Text', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_banner_settings',
            'settings'        => 'ecommerce_bazaar_banner_text' ,
            'type'            => 'text',
        )
    );

    // Button Link
    $wp_customize->add_setting(
        'ecommerce_bazaar_banner_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_banner_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Banner Button Link', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_banner_settings',
            'settings'        => 'ecommerce_bazaar_banner_button_link' ,
            'type'            => 'url',
        )
    );


//prod-hd
$wp_customize->add_setting(
        'ecommerce_bazaar_banner_product_head',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_banner_product_head',
        array(
            'label'           => sprintf( esc_html__( 'Category Heading', 'ecommerce-bazaar' ), ),
            'section'         => 'ecommerce_bazaar_home_banner_settings',
            'settings'        => 'ecommerce_bazaar_banner_product_head' ,
            'type'            => 'text',
        )
    );


    // Add a setting for the number of categories to show
    $wp_customize->add_setting(
        'ecommerce_bazaar_category_number',
        array(
            'default'           => '3',
            'sanitize_callback' => 'absint', // Use absint to sanitize integer values
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_category_number',
        array(
            'label'       => esc_html__( 'Number of Categories To Show', 'ecommerce-bazaar' ),
            'section'     => 'ecommerce_bazaar_home_banner_settings',
            'settings'    => 'ecommerce_bazaar_category_number',
            'type'        => 'number',
            'input_attrs' => array(
                'min' => 1,
                'max' => 10, // Adjust max as needed
            ),
        )
    );

    // Get all product categories to populate the dropdowns
    $args = array(
        'taxonomy'   => 'product_cat',
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => false, // Show even empty categories
    );
    
    $categories = get_terms( $args );
    $cats = array();

    // Prepare categories for dropdown
    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
        foreach ( $categories as $category ) {
            $cats[$category->slug] = $category->name; // Use slug as value, name as label
        }
    }

    // Dynamically create settings and controls for each category based on the number selected
    $category_count = get_theme_mod( 'ecommerce_bazaar_category_number', 3 );

    for ( $i = 1; $i <= $category_count; $i++ ) {
        $wp_customize->add_setting(
            'ecommerce_bazaar_best_category_name' . $i,
            array(
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'ecommerce_bazaar_best_category_name' . $i,
            array(/* translators: %d: Category number */
                'label'    => sprintf( esc_html__( 'Select Category %d', 'ecommerce-bazaar' ), $i ),
                'section'  => 'ecommerce_bazaar_home_banner_settings',
                'settings' => 'ecommerce_bazaar_best_category_name' . $i,
                'type'     => 'select',
                'choices'  => $cats, // Dynamically populated categories
            )
        );
    } 

    // Slider Content Alignment Setting
    $wp_customize->add_setting(
        'ecommerce_bazaar_slider_content_alignment',
        array(
            'default'           => 'left',
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_slider_content_alignment',
        array(
            'label'    => esc_html__( 'Slider Content Alignment', 'ecommerce-bazaar' ),
            'section'  => 'ecommerce_bazaar_home_banner_settings',
            'settings' => 'ecommerce_bazaar_slider_content_alignment',
            'type'     => 'select',
            'choices'  => array(
                'left'   => esc_html__( 'Left', 'ecommerce-bazaar' ),
                'center' => esc_html__( 'Center', 'ecommerce-bazaar' ),
                'right'  => esc_html__( 'Right', 'ecommerce-bazaar' ),
            ),
        )
    );    
    
}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_home_banner_register' );