<?php
/**
 * Theme Customizer Controls
 *
 * @package Ecommerce Bazaar
 */


if ( ! function_exists( 'ecommerce_bazaar_customizer_blog_register' ) ) :
function ecommerce_bazaar_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'ecommerce_bazaar_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'ecommerce-bazaar' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'ecommerce_bazaar_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'ecommerce-bazaar' ),
            'panel'          => 'ecommerce_bazaar_blog_settings_panel',
        )
    ); 


	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_posts_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_posts_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_posts_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_posts_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_posts_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_posts_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'ecommerce_bazaar_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'ecommerce_bazaar_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Ecommerce_Bazaar_Radio_Image_Control( $wp_customize,'ecommerce_bazaar_blog_sidebar_layout',
            array(
                'settings'		=> 'ecommerce_bazaar_blog_sidebar_layout',
                'section'		=> 'ecommerce_bazaar_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'ecommerce-bazaar' ),
                'choices'		=> array(
                    'right'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'three_colm'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/c3.png',
                    'four_colm'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/c4.png',
                    'grid_layout'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/c5.png',
                    'grid_left_sidebar'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/c6.png',
                    'grid_right_sidebar'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/c7.png',
                    'no' 	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );


    // Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_posts_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'ecommerce_bazaar_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 30,
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_posts_excerpt_length',
        array(
            'settings'      => 'ecommerce_bazaar_posts_excerpt_length',
            'section'       => 'ecommerce_bazaar_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'ecommerce-bazaar' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'ecommerce_bazaar_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'ecommerce-bazaar' ),
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_posts_readmore_text',
        array(
            'settings'      => 'ecommerce_bazaar_posts_readmore_text',
            'section'       => 'ecommerce_bazaar_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'ecommerce-bazaar' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'ecommerce_bazaar_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'ecommerce-bazaar' ),
            'panel'          => 'ecommerce_bazaar_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'ecommerce_bazaar_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'ecommerce-bazaar' ),
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_single_post_category_text',
        array(
            'settings'      => 'ecommerce_bazaar_single_post_category_text',
            'section'       => 'ecommerce_bazaar_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'ecommerce-bazaar' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'ecommerce_bazaar_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Toggle_Control( $wp_customize, 'ecommerce_bazaar_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-toggle',
		    'settings'    => 'ecommerce_bazaar_enable_single_post_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_single_pos_nav_show', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_single_pos_nav_show', 
		array(
		    'label'       => esc_html__( 'Post Navigation', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_single_pos_nav_show',
		) 
	));

    // add next article textbox
    $wp_customize->add_setting(
        'ecommerce_bazaar_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'ecommerce-bazaar' ),
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_single_post_next_article_text',
        array(
            'settings'      => 'ecommerce_bazaar_single_post_next_article_text',
            'section'       => 'ecommerce_bazaar_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'ecommerce-bazaar' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'ecommerce-bazaar' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'ecommerce_bazaar_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'ecommerce-bazaar' ),
            'sanitize_callback' => 'ecommerce_bazaar_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'ecommerce_bazaar_single_post_previous_article_text',
        array(
            'settings'      => 'ecommerce_bazaar_single_post_previous_article_text',
            'section'       => 'ecommerce_bazaar_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'ecommerce-bazaar' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'ecommerce-bazaar' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'ecommerce_bazaar_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'ecommerce_bazaar_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Ecommerce_Bazaar_Title_Info_Control( $wp_customize, 'ecommerce_bazaar_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'ecommerce-bazaar' ),
		    'section'     => 'ecommerce_bazaar_single_post_settings',
		    'type'        => 'ecommerce-bazaar-title',
		    'settings'    => 'ecommerce_bazaar_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'ecommerce_bazaar_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'ecommerce_bazaar_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Ecommerce_Bazaar_Radio_Image_Control( $wp_customize,'ecommerce_bazaar_blog_single_sidebar_layout',
            array(
                'settings'		=> 'ecommerce_bazaar_blog_single_sidebar_layout',
                'section'		=> 'ecommerce_bazaar_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'ecommerce-bazaar' ),
                'choices'		=> array(
                    'right'	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => ECOMMERCE_BAZAAR_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

}
endif;

add_action( 'customize_register', 'ecommerce_bazaar_customizer_blog_register' );