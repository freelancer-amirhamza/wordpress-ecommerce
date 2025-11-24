<?php
/**
 * Grocery Ecommerce Theme Customizer
 * @package Grocery Ecommerce
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function grocery_ecommerce_customize_register( $wp_customize ) {	

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-selector.php' );

	class Grocery_Ecommerce_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_html($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}

	//add home page setting pannel
	$wp_customize->add_panel( 'grocery_ecommerce_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'grocery-ecommerce' ),
		'description' => __( 'Description of what this panel does.', 'grocery-ecommerce' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'grocery_ecommerce_theme_color_option', array( 
		'panel' => 'grocery_ecommerce_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'grocery-ecommerce' ) 
	) );

  	$wp_customize->add_setting( 'grocery_ecommerce_first_theme_color', array(
	    'default' => '#0A472E',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_first_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme global color settings on just one click.', 'grocery-ecommerce'),
	    'section' => 'grocery_ecommerce_theme_color_option',
	    'settings' => 'grocery_ecommerce_first_theme_color',
  	)));

  	$wp_customize->add_setting( 'grocery_ecommerce_second_theme_color', array(
	    'default' => '#05A845',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_second_theme_color', array(
  		'label' => 'Color Option 2',
	    'description' => __('One can change complete theme global color settings on just one click.', 'grocery-ecommerce'),
	    'section' => 'grocery_ecommerce_theme_color_option',
	    'settings' => 'grocery_ecommerce_second_theme_color',
  	)));

	// font array
	$grocery_ecommerce_font_array = array(
		'' => 'No Fonts',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Architects Daughter' => 'Architects Daughter',
		'Arimo' => 'Arimo',
		'Arsenal' => 'Arsenal', 
		'Arvo' => 'Arvo',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bangers' => 'Bangers', 
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bitter' => 'Bitter',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine', 
		'Cabin' => 'Cabin', 
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum', 
		'Cookie' => 'Cookie', 
		'Chewy' => 'Chewy', 
		'Days One' => 'Days One', 
		'Dosis' => 'Dosis',
		'Droid Sans' => 'Droid Sans',
		'Economica' => 'Economica',
		'Fredoka One' => 'Fredoka One',
		'Fjalla One' => 'Fjalla One',
		'Francois One' => 'Francois One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Handlee' => 'Handlee', 
		'Hammersmith One' => 'Hammersmith One',
		'Inconsolata' => 'Inconsolata', 
		'Indie Flower' => 'Indie Flower', 
		'IM Fell English SC' => 'IM Fell English SC', 
		'Julius Sans One' => 'Julius Sans One',
		'Josefin Slab' => 'Josefin Slab', 
		'Josefin Sans' => 'Josefin Sans', 
		'Kanit' => 'Kanit', 
		'Lobster' => 'Lobster', 
		'Lato' => 'Lato',
		'Lora' => 'Lora', 
		'Libre Baskerville' =>'Libre Baskerville',
		'Lobster Two' => 'Lobster Two',
		'Merriweather' =>'Merriweather', 
		'Monda' => 'Monda',
		'Montserrat' => 'Montserrat',
		'Muli' => 'Muli', 
		'Marck Script' => 'Marck Script',
		'Noto Serif' => 'Noto Serif',
		'Open Sans' => 'Open Sans', 
		'Overpass' => 'Overpass',
		'Overpass Mono' => 'Overpass Mono',
		'Oxygen' => 'Oxygen', 
		'Orbitron' => 'Orbitron', 
		'Patua One' => 'Patua One', 
		'Pacifico' => 'Pacifico',
		'Padauk' => 'Padauk', 
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display', 
		'PT Sans' => 'PT Sans',
		'Philosopher' => 'Philosopher',
		'Permanent Marker' => 'Permanent Marker',
		'Poiret One' => 'Poiret One', 
		'Quicksand' => 'Quicksand', 
		'Quattrocento Sans' => 'Quattrocento Sans', 
		'Raleway' => 'Raleway', 
		'Rubik' => 'Rubik', 
		'Rokkitt' => 'Rokkitt', 
		'Russo One' => 'Russo One', 
		'Righteous' => 'Righteous', 
		'Slabo' => 'Slabo', 
		'Source Sans Pro' => 'Source Sans Pro', 
		'Shadows Into Light Two' =>'Shadows Into Light Two', 
		'Shadows Into Light' => 'Shadows Into Light', 
		'Sacramento' => 'Sacramento', 
		'Shrikhand' => 'Shrikhand', 
		'Tangerine' => 'Tangerine',
		'Ubuntu' => 'Ubuntu', 
		'VT323' => 'VT323', 
		'Varela Round' => 'Varela Round', 
		'Vampiro One' => 'Vampiro One',
		'Vollkorn' => 'Vollkorn',
		'Volkhov' => 'Volkhov', 
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
   );

	//Typography
	$wp_customize->add_section( 'grocery_ecommerce_typography', array(
    	'title' => __( 'Typography', 'grocery-ecommerce' ),
		'priority'   => 30,
		'panel' => 'grocery_ecommerce_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_paragraph_color', array(
		'label' => __('Paragraph Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_paragraph_font_family',array(
	  	'default' => '',
	  	'capability' => 'edit_theme_options',
	  	'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_paragraph_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'Paragraph Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	$wp_customize->add_setting('grocery_ecommerce_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_atag_color', array(
		'label' => __('"a" Tag Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_atag_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( '"a" Tag Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_li_color', array(
		'label' => __('"li" Tag Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_li_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( '"li" Tag Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_h1_color', array(
		'label' => __('H1 Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_h1_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'H1 Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('grocery_ecommerce_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_h1_font_size',array(
		'label'	=> __('H1 Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_h2_color', array(
		'label' => __('h2 Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_h2_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'h2 Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('grocery_ecommerce_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_h2_font_size',array(
		'label'	=> __('h2 Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_h3_color', array(
		'label' => __('h3 Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_h3_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'h3 Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('grocery_ecommerce_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_h3_font_size',array(
		'label'	=> __('h3 Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_h4_color', array(
		'label' => __('h4 Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_h4_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'h4 Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('grocery_ecommerce_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_h4_font_size',array(
		'label'	=> __('h4 Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_h5_color', array(
		'label' => __('h5 Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_h5_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'h5 Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('grocery_ecommerce_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_h5_font_size',array(
		'label'	=> __('h5 Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'grocery_ecommerce_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_h6_color', array(
		'label' => __('h6 Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_typography',
		'settings' => 'grocery_ecommerce_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('grocery_ecommerce_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	   'grocery_ecommerce_h6_font_family', array(
	   'section'  => 'grocery_ecommerce_typography',
	   'label'    => __( 'h6 Fonts','grocery-ecommerce'),
	   'type'     => 'select',
	   'choices'  => $grocery_ecommerce_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('grocery_ecommerce_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_h6_font_size',array(
		'label'	=> __('h6 Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_typography',
		'setting'	=> 'grocery_ecommerce_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('grocery_ecommerce_topbar_icon',array(
		'title'	=> __('Topbar Section','grocery-ecommerce'),
		'description'	=> __('Add Header Content here','grocery-ecommerce'),
		'priority'	=> null,
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_top_header',array(
      'default' => false,
      'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
   ));
   $wp_customize->add_control('grocery_ecommerce_top_header',array(
      'type' => 'checkbox',
      'label' => __('Enable Top Header','grocery-ecommerce'),
      'section' => 'grocery_ecommerce_topbar_icon'
   ));

   $wp_customize->add_setting('grocery_ecommerce_topbar_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_topbar_padding',array(
		'label'	=> esc_html__('Topbar Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_topbar_icon',
	));

   $wp_customize->add_setting('grocery_ecommerce_top_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_top_topbar_padding',array(
		'description'	=> __('Top','grocery-ecommerce'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
      ),
		'section'=> 'grocery_ecommerce_topbar_icon',
		'type'=> 'number',
	));

	$wp_customize->add_setting('grocery_ecommerce_bottom_topbar_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_bottom_topbar_padding',array(
		'description'	=> __('Bottom','grocery-ecommerce'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
      ),
		'section'=> 'grocery_ecommerce_topbar_icon',
		'type'=> 'number',
	));

   $wp_customize->add_setting('grocery_ecommerce_sticky_header',array(
      'default' => '',
      'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
  	));
	$wp_customize->add_control('grocery_ecommerce_sticky_header',array(
		'type' => 'checkbox',
		'label' => __('Stick header on Desktop','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_topbar_icon'
	));

 	$wp_customize->add_setting('grocery_ecommerce_sticky_header_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_sticky_header_padding',array(
		'label'	=> esc_html__('Sticky Header Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_topbar_icon',
		'type' => 'hidden',
	));

 	$wp_customize->add_setting('grocery_ecommerce_top_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_top_sticky_header_padding',array(
		'description'	=> __('Top','grocery-ecommerce'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'grocery_ecommerce_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('grocery_ecommerce_bottom_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_bottom_sticky_header_padding',array(
		'description'	=> __('Bottom','grocery-ecommerce'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'grocery_ecommerce_topbar_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('grocery_ecommerce_order_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_order_text',array(
		'label'	=> __('Add Order Text','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_topbar_icon',
		'setting' => 'grocery_ecommerce_order_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_cashback_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_cashback_text',array(
		'label'	=> __('Add Cashback Text','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_topbar_icon',
		'setting' => 'grocery_ecommerce_cashback_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_phone_number'
	));
	$wp_customize->add_control('grocery_ecommerce_call',array(
		'label'	=> __('Add Phone No.','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_topbar_icon',
		'setting' => 'grocery_ecommerce_call',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'grocery_ecommerce_header_icons_font_size', array(
        'default'=> '18',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( new grocery_ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_header_icons_font_size', array(
        'label'  => __('Icons Font Size','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_topbar_icon',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 20,
        )
    )));

	// Header
	$wp_customize->add_section('grocery_ecommerce_header',array(
		'title'	=> __('Header','grocery-ecommerce'),
		'priority' => null,
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_menu_font_size', array(
		'default'=> '13',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_menu_font_size', array(
		'label'  => __('Menu Font Size','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_header',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

 	$wp_customize->add_setting('grocery_ecommerce_menu_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_menu_font_weight',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_header',
		'choices' => array(
		   '100' => __('100','grocery-ecommerce'),
		   '200' => __('200','grocery-ecommerce'),
		   '300' => __('300','grocery-ecommerce'),
		   '400' => __('400','grocery-ecommerce'),
		   '500' => __('500','grocery-ecommerce'),
		   '600' => __('600','grocery-ecommerce'),
		   '700' => __('700','grocery-ecommerce'),
		   '800' => __('800','grocery-ecommerce'),
		   '900' => __('900','grocery-ecommerce'),
		),
	) );

	$wp_customize->add_setting('grocery_ecommerce_menu_padding',array(
		'default'=> 10,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize,'grocery_ecommerce_menu_padding',array(
		'label'	=> __('Menu Font Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_header',
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 50,
        ),
	)));

	$wp_customize->add_setting('grocery_ecommerce_text_tranform_menu',array(
        'default' => 'Uppercase',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control('grocery_ecommerce_text_tranform_menu',array(
        'type' => 'select',
        'label' => __('Menu Font Transform','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_header',
        'choices' => array(
            'Uppercase' => __('Uppercase','grocery-ecommerce'),
            'Lowercase' => __('Lowercase','grocery-ecommerce'),
            'Capitalize' => __('Capitalize','grocery-ecommerce'),
        ),
	) );

	$wp_customize->add_setting('grocery_ecommerce_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_menus_item_style',array(
        'type' => 'select',
		'label' => __('Menu Item Hover Style','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_header',
		'choices' => array(
            'None' => __('None','grocery-ecommerce'),
            'Zoom In' => __('Zoom In','grocery-ecommerce'),
			'Underline Expand' => __('Underline Expand', 'grocery-ecommerce'), 
        ),
	) );	

	$wp_customize->add_setting('grocery_ecommerce_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_menu_color', array(
		'label'    => __('Menu Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_header',
		'settings' => 'grocery_ecommerce_menu_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_header',
		'settings' => 'grocery_ecommerce_menu_hover_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_header',
		'settings' => 'grocery_ecommerce_submenu_menu_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_submenu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_submenu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_header',
		'settings' => 'grocery_ecommerce_submenu_hover_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_topbar_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_topbar_button_text',array(
		'label'	=> __('Add Button Text','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_header',
		'setting' => 'grocery_ecommerce_topbar_button_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_topbar_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('grocery_ecommerce_topbar_button_link',array(
		'label'	=> __('Add Button Link','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_header',
		'setting' => 'grocery_ecommerce_topbar_button_link',
		'type'	=> 'url'
	));

	$wp_customize->add_setting( 'grocery_ecommerce_menu_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_ecommerce_menu_settings_premium_features', array(
        'type'=> 'hidden',
        'description' => "<h3>". esc_html('Premium Theme Features!','grocery-ecommerce') ."</h3>
            <ul>
                <li>". esc_html('Menu DropDown Background Colors','grocery-ecommerce') ."</li>
                <li>". esc_html('Menu Item Fonts','grocery-ecommerce') ."</li>
                <li>". esc_html('Active Menu Colors','grocery-ecommerce') ."</li>
                <li>". esc_html('Header Search Icons Colors','grocery-ecommerce') ."</li>
                <li>". esc_html('... and Other Premium Features','grocery-ecommerce') ."</li>
            </ul>
            <a target='_blank' href='". esc_url('https://www.themesglance.com/products/woocommerce-grocery-store-wordpress-theme') ." '>". esc_html('Upgrade Now','grocery-ecommerce') ."</a>",
        'section' => 'grocery_ecommerce_header'
        )
    );

	//Slider section
  	$wp_customize->add_section('grocery_ecommerce_slider',array(
		'title' => __('Slider Section','grocery-ecommerce'),
		'description' => '',
		'priority'  => null,
		'panel' => 'grocery_ecommerce_panel_id',
	)); 

	$wp_customize->add_setting('grocery_ecommerce_show_slider',array(
		'default' => false,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_show_slider',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider','grocery-ecommerce'),
   	'section' => 'grocery_ecommerce_slider'
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_title',array(
     'default' => true,
     'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_slider_title',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider Title','grocery-ecommerce'),
   	'section' => 'grocery_ecommerce_slider'
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_content',array(
     'default' => true,
     'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_slider_content',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider Content','grocery-ecommerce'),
   	'section' => 'grocery_ecommerce_slider'
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_slider_button',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider Button','grocery-ecommerce'),
   	'section' => 'grocery_ecommerce_slider'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'grocery_ecommerce_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'grocery_ecommerce_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'grocery_ecommerce_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'grocery-ecommerce' ),
			'section'  => 'grocery_ecommerce_slider',
			'type'     => 'dropdown-pages'
		) 	);
	}

	$wp_customize->add_setting( 'grocery_ecommerce_slider_arrow_hide_show',array(
	    'default' => true,   
	    'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control( 'grocery_ecommerce_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_slider',
		'type' => 'checkbox',
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_slider_prev_icon',array(
		'label'	=>__('Add Slider Prev Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_slider',
		'setting'	=> 'grocery_ecommerce_slider_prev_icon',
		'type'		=> 'icon',
	)));

	$wp_customize->add_setting('grocery_ecommerce_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_slider',
		'setting'	=> 'grocery_ecommerce_slider_next_icon',
		'type'		=> 'icon',
	)));

	 $wp_customize->add_setting('grocery_ecommerce_slider_arrows_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_slider_arrows_hover_color', array(
		'label'    => __('Slider Arrows hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_slider',
		'settings' => 'grocery_ecommerce_slider_arrows_hover_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_content_position',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_content_position',array(
		'label'	=> esc_html__('Slider Content Position','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_slider',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_slider_top_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_top_position', array(
		'label' => esc_html__( 'Top','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_slider_bottom_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_bottom_position', array(
		'label' => esc_html__( 'Bottom','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_slider_left_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_left_position', array(
		'label' => esc_html__( 'Left','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_slider_right_position', array(
		'default'  => '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_right_position', array(
		'label' => esc_html__('Right','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_slider',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'grocery_ecommerce_slider_excerpt_number', array(
		'default' => 25,
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_excerpt_number', array(
		'label' => esc_html__( 'Slider Excerpt length','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_slider',
		'type' => 'number',
		'settings' => 'grocery_ecommerce_slider_excerpt_number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
		'active_callback' => 'grocery_ecommerce_slider_enabled'
	) );

	//content Alignment
    $wp_customize->add_setting('grocery_ecommerce_slider_alignment_option',array(
    'default' => 'Left Align',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_slider_alignment_option',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_slider',
        'choices' => array(
            'Center Align' => __('Center Align','grocery-ecommerce'),
            'Left Align' => __('Left Align','grocery-ecommerce'),
            'Right Align' => __('Right Align','grocery-ecommerce'),
        ),
	) );

	//Opacity
	$wp_customize->add_setting('grocery_ecommerce_slider_image_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control( 'grocery_ecommerce_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','grocery-ecommerce' ),
	'section'     => 'grocery_ecommerce_slider',
	'type'        => 'select',
	'settings'    => 'grocery_ecommerce_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','grocery-ecommerce'),
		'0.1' =>  esc_attr('0.1','grocery-ecommerce'),
		'0.2' =>  esc_attr('0.2','grocery-ecommerce'),
		'0.3' =>  esc_attr('0.3','grocery-ecommerce'),
		'0.4' =>  esc_attr('0.4','grocery-ecommerce'),
		'0.5' =>  esc_attr('0.5','grocery-ecommerce'),
		'0.6' =>  esc_attr('0.6','grocery-ecommerce'),
		'0.7' =>  esc_attr('0.7','grocery-ecommerce'),
		'0.8' =>  esc_attr('0.8','grocery-ecommerce'),
		'0.9' =>  esc_attr('0.9','grocery-ecommerce')
	),
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Home Page Slider Overlay','grocery-ecommerce'),
       'section' => 'grocery_ecommerce_slider'
    ));

    $wp_customize->add_setting('grocery_ecommerce_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_slider_image_overlay_color', array(
		'label'    => __('Home Page Slider Overlay Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_slider',
		'settings' => 'grocery_ecommerce_slider_image_overlay_color',
	)));

	$wp_customize->add_setting( 'grocery_ecommerce_slider_button_label', array(
		'default' => __('READ MORE','grocery-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_slider',
		'type'    => 'text',
		'settings'    => 'grocery_ecommerce_slider_button_label'
	) );

	$wp_customize->add_setting('grocery_ecommerce_slider_button_link',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('grocery_ecommerce_slider_button_link',array(
        'label' => esc_html__('Add Button Link','grocery-ecommerce'),
        'section'=> 'grocery_ecommerce_slider',
        'type'=> 'url'
    ));

	$wp_customize->add_setting('grocery_ecommerce_slider_btn_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_slider_btn_color', array(
		'label'    => __('Slider Button Lable Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_slider',
		'settings' => 'grocery_ecommerce_slider_btn_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_slider_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_slider_btn_bg_color', array(
		'label'    => __('Slider Button Bg Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_slider',
		'settings' => 'grocery_ecommerce_slider_btn_bg_color',
	)));

	$wp_customize->add_setting( 'grocery_ecommerce_slider_btn_border_radius', array(
		'default'=> '5',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control('grocery_ecommerce_slider_btn_border_radius', array(
            'label'  => __('Slider Button Border Radius','grocery-ecommerce'),
            'input_attrs' => array(
            	'step' => 1,
                'min' => 0,
                'max' => 50,
            ),
            'section'  => 'grocery_ecommerce_slider',
            'type'=> 'number'
    ));

    $wp_customize->add_setting('grocery_ecommerce_slider_btn_lable_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_slider_btn_lable_hover_color', array(
		'label'    => __('Slider Button Lable hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_slider',
		'settings' => 'grocery_ecommerce_slider_btn_lable_hover_color',
	)));

	$wp_customize->add_setting('grocery_ecommerce_slider_btn_bg_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_slider_btn_bg_hover_color', array(
		'label'    => __('Slider Button Bg hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_slider',
		'settings' => 'grocery_ecommerce_slider_btn_bg_hover_color',
	)));

	$wp_customize->add_setting( 'grocery_ecommerce_slider_height', array(
		'default'          => '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_slider_height', array(
		'label' => esc_html__( 'Slider Height','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_slider',
		'type'    => 'number',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
			'step' => 1,
			'min'  => 500,
			'max'  => 1000,
		),
		'active_callback' => 'grocery_ecommerce_slider_enabled'
	) );

	//Product Section
	$wp_customize->add_section('grocery_ecommerce_product_section',array(
		'title'	=> __('Product Section','grocery-ecommerce'),
		'description'	=> __('Add Product sections below.','grocery-ecommerce'),
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_show_product_section',array(
		'default' => false,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_show_product_section',array(
     	'type' => 'checkbox',
		'label' => __('Show / Hide Product Section','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_product_section'
	));

	$wp_customize->add_setting('grocery_ecommerce_small_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_small_title',array(
		'label'	=> __('Section Small Title','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_product_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_section_title',array(
		'label'	=> __('Section Title','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_product_section',
		'type'		=> 'text'
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
 	$categories = get_categories( $args );
	$cat_posts = array();
	$i = 0;
	$cat_posts[]='Select';	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('grocery_ecommerce_sale_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('grocery_ecommerce_sale_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Sale Products','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_product_section',
	));

	$categories = get_categories( $args );
	$cat_posts = array();
	$i = 0;
	$cat_posts1[]='Select';	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('grocery_ecommerce_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('grocery_ecommerce_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts1,
		'label' => __('Select Category to display Products','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_product_section',
	));

	$wp_customize->add_setting('grocery_ecommerce_product_timer_text',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('grocery_ecommerce_product_timer_text',array(
		'label' => __('Timer Text','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_product_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_product_clock_timer_end',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('grocery_ecommerce_product_clock_timer_end',array(
		'label' => __('Enter End Date of Timer','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_product_section',
		'description' => __('Timer get the current date and time. So you just need to add the end date. Please Use the following format to add the date "Month date year hours:minutes:seconds" example "April 11 2022 11:00:00".','grocery-ecommerce'),
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_ecommerce_product_settings_premium_features', array(
        'type'=> 'hidden',
        'description' => "<h3>". esc_html('Premium Theme Features!','grocery-ecommerce') ."</h3>
            <ul>
                <li>". esc_html('Title Font & Color Settings','grocery-ecommerce') ."</li>
                <li>". esc_html('Background Image Settings','grocery-ecommerce') ."</li>
                <li>". esc_html('... and Other Premium Features','grocery-ecommerce') ."</li>
            </ul>
            <a target='_blank' href='". esc_url('https://www.themesglance.com/products/woocommerce-grocery-store-wordpress-theme') ." '>". esc_html('Upgrade Now','grocery-ecommerce') ."</a>",
        'section' => 'grocery_ecommerce_product_section'
        )
    );

	//layout setting
	$wp_customize->add_section( 'grocery_ecommerce_theme_layout', array(
    	'title' => __( 'Blog Settings', 'grocery-ecommerce' ),   
		'priority' => null,
		'panel' => 'grocery_ecommerce_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('grocery_ecommerce_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	) );
	$wp_customize->add_control(new Grocery_Ecommerce_Image_Radio_Control($wp_customize, 'grocery_ecommerce_layout', array(
		'type' => 'radio',
		'label' => esc_html__('Select Sidebar layout', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout',
		'settings' => 'grocery_ecommerce_layout',
		'choices' => array(
		   'Right Sidebar' => esc_url(get_template_directory_uri()) . '/images/layout3.png',
		   'Left Sidebar' => esc_url(get_template_directory_uri()) . '/images/layout2.png',
		   'One Column' => esc_url(get_template_directory_uri()) . '/images/layout1.png',
		   'Three Columns' => esc_url(get_template_directory_uri()) . '/images/layout4.png',
		   'Four Columns' => esc_url(get_template_directory_uri()) . '/images/layout5.png',
		   'Grid Layout' => esc_url(get_template_directory_uri()) . '/images/layout6.png'
	))));

	$wp_customize->add_setting('grocery_ecommerce_blog_post_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
    ));
	$wp_customize->add_control('grocery_ecommerce_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'grocery-ecommerce' ),
        'section' => 'grocery_ecommerce_theme_layout',
        'choices' => array(
            'left' => __('Left Align','grocery-ecommerce'),
            'right' => __('Right Align','grocery-ecommerce'),
            'center' => __('Center Align','grocery-ecommerce'),
			'image_content' => __('Image and Content', 'grocery-ecommerce')
        ),
    ));

	$wp_customize->add_setting('grocery_ecommerce_blog_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_blog_post_display_type', array(
		'type' => 'select',
		'label' => __( 'Blog Page Display Type', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_theme_layout',
		'choices' => array(
		   'blocks' => __('Blocks','grocery-ecommerce'),
		   'without blocks' => __('Without Blocks','grocery-ecommerce'),
		),
    ));

    $wp_customize->add_setting('grocery_ecommerce_featured_image',array(
       'default' => 'true',
       'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Featured Image','grocery-ecommerce'),
       'section' => 'grocery_ecommerce_theme_layout'
    ));

	$wp_customize->add_setting('grocery_ecommerce_metafields_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Date ','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout'
	));

	$wp_customize->add_setting('grocery_ecommerce_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_theme_layout',
		'setting'	=> 'grocery_ecommerce_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_metafields_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_metafields_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Author','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout'
	));

	$wp_customize->add_setting('grocery_ecommerce_postauthor_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_postauthor_icon',array(
		'label'	=> __('Add Post Author Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_theme_layout',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_metafields_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_metafields_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Comments','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout'
	));

	$wp_customize->add_setting('grocery_ecommerce_postcomment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_postcomment_icon',array(
		'label'	=> __('Add Post Comments Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_theme_layout',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_metafields_time',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_metafields_time',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Time','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout'
	));

	$wp_customize->add_setting('grocery_ecommerce_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_posttime_icon',array(
		'label'	=> __('Add Post Time Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_theme_layout',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_post_navigation',array(
		'default' => 'true',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_post_navigation',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Post Navigation','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout'
	));

	$wp_customize->add_setting('grocery_ecommerce_initial_caps_enable',
	array(
		'default' => false,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox',
	)); 
	$wp_customize->add_control( 'grocery_ecommerce_initial_caps_enable', 
	array(
		'label' => esc_html__('Initial Letter Capital', 'grocery-ecommerce'),
		'type' => 'checkbox',
		'section' => 'grocery_ecommerce_theme_layout',
	));

	$wp_customize->add_setting('grocery_ecommerce_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_ecommerce_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','grocery-ecommerce'),
       'description' => __('Ex: "/", "|", "-", ...','grocery-ecommerce'),
       'section' => 'grocery_ecommerce_theme_layout'
    ));

 	$wp_customize->add_setting('grocery_ecommerce_blog_post_content',array(
    	'default' => 'Excerpt Content',
     	'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_blog_post_content',array(
		'type' => 'radio',
		'label' => __('Blog Post Content Type','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout',
		'choices' => array(
		   'No Content' => __('No Content','grocery-ecommerce'),
		   'Full Content' => __('Full Content','grocery-ecommerce'),
		   'Excerpt Content' => __('Excerpt Content','grocery-ecommerce'),
		),
	) );

 	$wp_customize->add_setting( 'grocery_ecommerce_post_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_post_excerpt_number', array(
		'label' => esc_html__( 'Blog Post Excerpt Number (Max 50)','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_theme_layout',
		'type'    => 'number',
		'settings' => 'grocery_ecommerce_post_excerpt_number',
		'input_attrs' => array(
			'step'  => 1,
			'min'   => 0,
			'max'   => 50,
		),
		'active_callback' => 'grocery_ecommerce_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_theme_layout',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_button_excerpt_suffix',
		'active_callback' => 'grocery_ecommerce_excerpt_enabled'
	) );

	//Featured Image
	$wp_customize->add_setting('grocery_ecommerce_blog_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'grocery_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control('grocery_ecommerce_blog_image_dimension',array(
       'type' => 'radio',
       'label'	=> __('Blog Post Featured Image Dimension','grocery-ecommerce'),
       'choices' => array(
            'default' => __('Default','grocery-ecommerce'),
            'custom' => __('Custom Image Size','grocery-ecommerce'),
        ),
      	'section'	=> 'grocery_ecommerce_theme_layout',
    ));

    $wp_customize->add_setting( 'grocery_ecommerce_feature_image_custom_width', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_feature_image_custom_width', array(
        'label'  => __('Featured Image Custom Width','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_theme_layout',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 800,
        ),
		'active_callback' => 'grocery_ecommerce_blog_image_dimension'
    )));

    $wp_customize->add_setting( 'grocery_ecommerce_feature_image_custom_height', array(
		'default'=> '250',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_feature_image_custom_height', array(
        'label'  => __('Featured Image Custom Height','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_theme_layout',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 500,
        ),
		'active_callback' => 'grocery_ecommerce_blog_image_dimension'
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_feature_image_border_radius', array(
        'label'  => __('Featured Image Border Radius','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_theme_layout',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_feature_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_feature_image_border_radius', array(
     	'label'  => __('Featured Image Border Radius','grocery-ecommerce'),
     	'section'  => 'grocery_ecommerce_theme_layout',
     	'description' => __('Measurement is in pixel.','grocery-ecommerce'),
     	'input_attrs' => array(
         'min' => 0,
         'max' => 50,
     	),
 	)));

 	$wp_customize->add_setting( 'grocery_ecommerce_feature_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_feature_image_shadow', array(
		'label'  => __('Featured Image Shadow','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_theme_layout',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		),
    )));
	
	$wp_customize->add_setting('grocery_ecommerce_post_pagination_option',array(
		'default' => 'Right',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_post_pagination_option',array(
		'type' => 'select',
		'label' => __('Post Pagination Alignment','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_theme_layout',
		'choices' => array(
			'Center' => __('Center','grocery-ecommerce'),
			'Left' => __('Left','grocery-ecommerce'),
			'Right' => __('Right','grocery-ecommerce'),
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_pagination_type', array(
		'default'			=> 'page-numbers',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'grocery_ecommerce_pagination_type', array(
		'section' => 'grocery_ecommerce_theme_layout',
		'type' => 'select',
		'label' => __( 'Blog Pagination Style', 'grocery-ecommerce' ),
		'choices' => array(
		   'page-numbers' => __('Number', 'grocery-ecommerce' ),
	   	'next-prev' => __('Next/Prev', 'grocery-ecommerce' ),
	)));

	$wp_customize->add_setting( 'grocery_ecommerce_blog_post_prev_nav_text', array(
		'default' => __('Previous','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_blog_post_prev_nav_text', array(
		'label' => esc_html__( 'Blog Post Previous Nav text','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_theme_layout',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_blog_post_prev_nav_text',
		'active_callback' => 'grocery_ecommerce_pagination_callback',
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_blog_post_next_nav_text', array(
		'default' => __('Next','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_blog_post_next_nav_text', array(
		'label' => esc_html__( 'Blog Post Next Nav text','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_theme_layout',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_blog_post_next_nav_text',
		'active_callback' => 'grocery_ecommerce_pagination_callback',
	) );
	

	$wp_customize->add_setting('grocery_ecommerce_blog_nav_position',array(
		'default' => 'bottom',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_blog_nav_position', array(
		'type' => 'select',
		'label' => __( 'Blog Post Navigation Position', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_theme_layout',
		'choices' => array(
		   'top' => __('Top','grocery-ecommerce'),
		   'bottom' => __('Bottom','grocery-ecommerce'),
		   'both' => __('Both','grocery-ecommerce')
		),
 	));

 	$wp_customize->add_setting( 'grocery_ecommerce_post_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_ecommerce_post_settings_premium_features', array(
        'type'=> 'hidden',
        'description' => "<h3>". esc_html('Premium Theme Features!','grocery-ecommerce') ."</h3>
            <ul>
                <li>". esc_html('Section Heading Option','grocery-ecommerce') ."</li>
                <li>". esc_html('Animated Elements Colors','grocery-ecommerce') ."</li>
                <li>". esc_html('... and Other Premium Features','grocery-ecommerce') ."</li>
            </ul>
            <a target='_blank' href='". esc_url('https://www.themesglance.com/products/woocommerce-grocery-store-wordpress-theme') ." '>". esc_html('Upgrade Now','grocery-ecommerce') ."</a>",
        'section' => 'grocery_ecommerce_theme_layout'
        )
    );

	$wp_customize->add_section( 'grocery_ecommerce_single_post_settings', array(
		'title' => __( 'Single Post Options', 'grocery-ecommerce' ),
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_single_post_breadcrumb',array(
		'default' => 'true',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_breadcrumb',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Breadcrumb','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_single_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Date','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_singlepost_date_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_singlepost_date_icon',array(
		'label'	=> __('Add Single Post Date Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_single_post_settings',
		'setting'	=> 'grocery_ecommerce_singlepost_date_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_single_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Author','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_singlepost_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_singlepost_author_icon',array(
		'label'	=> __('Add Single Post Author Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_single_post_comment_no',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_comment_no',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Comment Number','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_single_post_comment_icon',array(
		'label'	=> __('Add Single Post Comments Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','grocery-ecommerce'),
       'section' => 'grocery_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('grocery_ecommerce_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_single_post_time_icon',array(
		'label'	=> __('Add Single Post Time Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_ecommerce_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','grocery-ecommerce'),
       'description' => __('Ex: "/", "|", "-", ...','grocery-ecommerce'),
       'section' => 'grocery_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('grocery_ecommerce_single_post_image',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_image',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Featured Image','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

    $wp_customize->add_setting('grocery_ecommerce_single_post_category',array(
       'default' => 'true',
       'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_single_post_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Category','grocery-ecommerce'),
       'section' => 'grocery_ecommerce_single_post_settings'
    ));

	$wp_customize->add_setting('grocery_ecommerce_metafields_tags',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_metafields_tags',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Tags','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting( 'grocery_ecommerce_post_featured_image', array(
		'default' => 'in-content',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'grocery_ecommerce_post_featured_image', array(
		'section' => 'grocery_ecommerce_single_post_settings',
		'type' => 'radio',
		'label' => __( 'Featured Image Display Type', 'grocery-ecommerce' ),
		'choices'		=> array(
		   'banner'  => __('as Banner Image', 'grocery-ecommerce'),
		   'in-content' => __( 'as Featured Image', 'grocery-ecommerce' ),
	)));

	//Featured Image
	
	$wp_customize->add_setting('grocery_ecommerce_single_post_image_dimension',array(
		'default' => 'default',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_choices'
	 ));
	 $wp_customize->add_control('grocery_ecommerce_single_post_image_dimension',array(
		'type' => 'radio',
		'label'	=> __('Single Post Featured Image Dimension','grocery-ecommerce'),
		'choices' => array(
			 'default' => __('Default','grocery-ecommerce'),
			 'custom' => __('Custom Image Size','grocery-ecommerce'),
		 ),
		   'section'	=> 'grocery_ecommerce_single_post_settings',
	 ));

	 $wp_customize->add_setting( 'grocery_ecommerce_single_post_image_custom_width', array(
		'default'=> '400',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_single_post_image_custom_width', array(
        'label'  => __('Featured Image Custom Width','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_single_post_settings',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 1000,
        ),
		'active_callback' => 'grocery_ecommerce_single_post_image_dimension'
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_single_post_image_custom_height', array(
		'default'=> '400',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_single_post_image_custom_height', array(
        'label'  => __('Featured Image Custom Height','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_single_post_settings',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 1000,
        ),
		'active_callback' => 'grocery_ecommerce_single_post_image_dimension'
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float',
	) );
	$wp_customize->add_control( 'grocery_ecommerce_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_single_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'grocery_ecommerce_sanitize_float',
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('grocery_ecommerce_single_post_nav',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_nav',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Navigation','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

 	$wp_customize->add_setting( 'grocery_ecommerce_single_post_prev_nav_text', array(
		'default' => __('Previous','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_single_post_prev_nav_text', array(
		'label' => esc_html__( 'Single Post Previous Nav text','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_single_post_settings',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_single_post_prev_nav_text'
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_single_post_next_nav_text', array(
		'default' => __('Next','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_single_post_next_nav_text', array(
		'label' => esc_html__( 'Single Post Next Nav text','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_single_post_settings',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_single_post_next_nav_text'
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_show_post_navigation_title', array(
        'default'           => false,
        'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'grocery_ecommerce_show_post_navigation_title', array(
        'label'    => __( 'Show Post Navigation Title', 'grocery-ecommerce' ),
        'section'  => 'grocery_ecommerce_single_post_settings',
        'type'     => 'checkbox',
    ) );

	$wp_customize->add_setting('grocery_ecommerce_single_post_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post comment','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting( 'grocery_ecommerce_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_comment_width', array(
		'label'  => __('Comment textarea width','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_single_post_settings',
		'description' => __('Measurement is in %.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 100,
		),
    )));

	$wp_customize->add_setting('grocery_ecommerce_comment_title',array(
		'default' => __('Leave a Reply','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_comment_title',array(
		'type' => 'text',
		'label' => __('Comment form Title','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_comment_submit_text',array(
		'default' => __('Post Comment','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_comment_submit_text',array(
		'type' => 'text',
		'label' => __('Comment Submit Button Label','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_single_post_settings'
	));

	// related post section

	$wp_customize->add_section( 'grocery_ecommerce_related_post_settings', array(
		'title' => __( 'Related Post Options', 'grocery-ecommerce' ),
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_related_posts',array(
		'default' => true,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_related_posts',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Posts','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_related_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_related_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Post Date','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_related_post_date_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_related_post_date_icon',array(
		'label'	=> __('Related Post Date Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_related_post_settings',
		'setting'	=> 'grocery_ecommerce_related_post_date_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_related_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_related_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Post Author','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_related_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_related_post_author_icon',array(
		'label'	=> __('Related Post Author Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_related_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_related_post_comment_no',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_related_post_comment_no',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Post Comments','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_related_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_related_post_comment_icon',array(
		'label'	=> __('Related Post Comments Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_related_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_related_post_time',array(
        'default' => 'true',
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_related_post_time',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Related Post Time','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_related_post_settings'
    ));

    $wp_customize->add_setting('grocery_ecommerce_related_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_related_post_time_icon',array(
		'label'	=> __('Related Post Time Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_related_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_related_post_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_related_post_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','grocery-ecommerce'),
		'description' => __('Ex: "/", "|", "-", ...','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_show_related_posts_image',array(
		'default' => true,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_show_related_posts_image',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Related Posts image','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

    $wp_customize->add_setting( 'grocery_ecommerce_related_posts_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_related_posts_image_shadow', array(
		'label'  => __('Related Posts Image Shadow','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_related_post_settings',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		),
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_related_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_related_image_border_radius', array(
        'label'  => __('Related Image Border Radius','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_related_post_settings',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

	$wp_customize->add_setting('grocery_ecommerce_related_posts_title',array(
		'default' => __('You May Also Like','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_related_posts_title',array(
		'type' => 'text',
		'label' => __('Related Posts Title','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_related_post_settings'
	));

 	$wp_customize->add_setting( 'grocery_ecommerce_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_related_post_settings',
		'type' => 'number',
		'settings' => 'grocery_ecommerce_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_post_shown_by', array(
		'default' => 'categories',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 'grocery_ecommerce_post_shown_by', array(
		'section' => 'grocery_ecommerce_related_post_settings',
		'type' => 'radio',
		'label' => __( 'Related Posts must be shown:', 'grocery-ecommerce' ),
		'choices'		=> array(
		   'categories'  => __('By Categories', 'grocery-ecommerce'),
		   'tags' => __( 'By Tags', 'grocery-ecommerce' ),
	)));

	$wp_customize->add_setting( 'grocery_ecommerce_related_post_excerpt_number',array(
		'default' => 20,
		'sanitize_callback' => 'absint'
	));

	$wp_customize->add_control('grocery_ecommerce_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Related Posts Content Limit','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_related_post_settings',
		'type'    => 'number',
	 	'settings' => 'grocery_ecommerce_related_post_excerpt_number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'grocery_ecommerce_related_post_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_related_post_excerpt_suffix', array(
		'label'       => esc_html__('Related Post Excerpt Suffix','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_related_post_settings',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_related_post_excerpt_suffix',
		'active_callback' => 'grocery_ecommerce_excerpt_enabled'
	) );

	$wp_customize->add_setting('grocery_ecommerce_related_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_related_post_display_type', array(
		'type' => 'select',
		'label' => __('Related Post Display Type', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_related_post_settings',
		'choices' => array(
		   'blocks' => __('Blocks','grocery-ecommerce'),
		   'without blocks' => __('Without Blocks','grocery-ecommerce'),
		),
    ));

	$wp_customize->add_setting('grocery_ecommerce_related_button_text',array(
		'default'=> esc_html__('Read Full','grocery-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','grocery-ecommerce'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read Full', 'grocery-ecommerce' ),
        ),
		'section'=> 'grocery_ecommerce_related_post_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'grocery_ecommerce_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'grocery-ecommerce' ),
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_sidebar_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
 	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_sidebar_layout', array(
		'type' => 'select',
		'label' => __( 'Grid Sidebar Layout', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_grid_layout_settings',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','grocery-ecommerce'),
		   'Right Sidebar' => __('Right Sidebar','grocery-ecommerce'),
		   'One Column' => __('One Column','grocery-ecommerce')
		),
 	));

	$wp_customize->add_setting('grocery_ecommerce_grid_columns', array(
		'default'           => '3',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices',
		'transport'         => 'refresh',
	));
	$wp_customize->add_control('grocery_ecommerce_grid_columns', array(
		'label'    => __('Grid Columns', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_grid_layout_settings', 
		'type'     => 'select',
		'choices'  => array(
			'2' => __('2 Columns', 'grocery-ecommerce'),
			'3' => __('3 Columns', 'grocery-ecommerce'),
			'4' => __('4 Columns', 'grocery-ecommerce'),
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_button_text',array(
		'default'=> esc_html__('Read Full','grocery-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','grocery-ecommerce'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read Full', 'grocery-ecommerce' ),
      ),
		'section'=> 'grocery_ecommerce_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_content',array(
    	'default' => 'Excerpt Content',
     	'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_content',array(
		'type' => 'radio',
		'label' => __('Grid Post Content Type','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_grid_layout_settings',
		'choices' => array(
		   'No Content' => __('No Content','grocery-ecommerce'),
		   'Full Content' => __('Full Content','grocery-ecommerce'),
		   'Excerpt Content' => __('Excerpt Content','grocery-ecommerce'),
		),
	) );

 	$wp_customize->add_setting( 'grocery_ecommerce_grid_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_grid_excerpt_number', array(
		'label' => esc_html__( 'Grid Post Excerpt Number (Max 50)','grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_grid_layout_settings',
		'type'    => 'number',
		'settings' => 'grocery_ecommerce_grid_excerpt_number',
		'input_attrs' => array(
			'step'  => 1,
			'min'   => 0,
			'max'   => 50,
		),
		'active_callback' => 'grocery_ecommerce_grid_excerpt_enabled'
	) );

	$wp_customize->add_setting('grocery_ecommerce_grid_excerpt_suffix',array(
		'default'=> '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_grid_layout_settings',
		'type'=> 'text',
		'settings'    => 'grocery_ecommerce_grid_excerpt_suffix',
		'active_callback' => 'grocery_ecommerce_grid_excerpt_enabled'
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
    ));
	$wp_customize->add_control('grocery_ecommerce_grid_alignment', array(
        'type' => 'select',
        'label' => __( 'Grid Post Alignment', 'grocery-ecommerce' ),
        'section' => 'grocery_ecommerce_grid_layout_settings',
        'choices' => array(
            'left' => __('Left Align','grocery-ecommerce'),
            'right' => __('Right Align','grocery-ecommerce'),
            'center' => __('Center Align','grocery-ecommerce')
        ),
    ));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_metabox_seperator',array(
        'default' => '|',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('grocery_ecommerce_grid_post_metabox_seperator',array(
        'type' => 'text',
        'label' => __('Metabox Seperator','grocery-ecommerce'),
        'description' => __('Ex: "/", "|", "-", ...','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_grid_layout_settings'
    ));

    $wp_customize->add_setting('grocery_ecommerce_grid_post_date',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_date',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Date ','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_grid_layout_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_date_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_grid_post_date_icon',array(
		'label'	=> __('Grid Post Date Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_grid_layout_settings',
		'setting'	=> 'grocery_ecommerce_grid_post_date_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_author',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_author',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Author','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_grid_layout_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_grid_post_author_icon',array(
		'label'	=> __('Grid Post Author Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_grid_layout_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_comment',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Comments','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_grid_layout_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_grid_post_comment_icon',array(
		'label'	=> __('Grid Post Comments Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_grid_layout_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_time',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_time',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Time','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_grid_layout_settings'
	));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_grid_post_time_icon',array(
		'label'	=> __('Grid Post Time Icon','grocery-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'grocery_ecommerce_grid_layout_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_featured_image',array(
        'default' => 'true',
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_grid_post_featured_image',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Featured Image','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_grid_layout_settings'
    ));

	$wp_customize->add_setting( 'grocery_ecommerce_grid_posts_image_shadow', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_grid_posts_image_shadow', array(
		'label'  => __('Grid Post Image Shadow','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_grid_layout_settings',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		),
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_grid_post_image_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_grid_post_image_border_radius', array(
        'label'  => __('Grid Post Image Border Radius','grocery-ecommerce'),
        'section'  => 'grocery_ecommerce_grid_layout_settings',
        'description' => __('Measurement is in pixel.','grocery-ecommerce'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        ),
    )));

	$wp_customize->add_setting('grocery_ecommerce_grid_post_display_type',array(
		'default' => 'blocks',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_grid_post_display_type', array(
		'type' => 'select',
		'label' => __( 'Grid Post Display Type', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_grid_layout_settings',
		'choices' => array(
		   'blocks' => __('Blocks','grocery-ecommerce'),
		   'without blocks' => __('Without Blocks','grocery-ecommerce'),
		),
    ));

	// Button option
	$wp_customize->add_section( 'grocery_ecommerce_button_options', array(
		'title' =>  __( 'Button Options', 'grocery-ecommerce' ),
		'panel' => 'grocery_ecommerce_panel_id',
	));

 	$wp_customize->add_setting( 'grocery_ecommerce_blog_button_text', array(
		'default'   => __('Read Full','grocery-ecommerce' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'grocery_ecommerce_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_button_options',
		'type'        => 'text',
		'settings'    => 'grocery_ecommerce_blog_button_text'
	) );

	$wp_customize->add_setting('grocery_ecommerce_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_button_padding',array(
		'label'	=> esc_html__('Button Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_button_options',
		'active_callback' => 'grocery_ecommerce_button_enabled'
	));

	$wp_customize->add_setting('grocery_ecommerce_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_top_button_padding',array(
		'label'	=> __('Top','grocery-ecommerce'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'grocery_ecommerce_button_options',
		'type'=> 'number',
		'active_callback' => 'grocery_ecommerce_button_enabled'
	));

	$wp_customize->add_setting('grocery_ecommerce_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_bottom_button_padding',array(
		'label'	=> __('Bottom','grocery-ecommerce'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'grocery_ecommerce_button_options',
		'type'=> 'number',
		'active_callback' => 'grocery_ecommerce_button_enabled'
	));

	$wp_customize->add_setting('grocery_ecommerce_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_left_button_padding',array(
		'label'	=> __('Left','grocery-ecommerce'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'grocery_ecommerce_button_options',
		'type'=> 'number',
		'active_callback' => 'grocery_ecommerce_button_enabled'
	));

	$wp_customize->add_setting('grocery_ecommerce_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_right_button_padding',array(
		'label'	=> __('Right','grocery-ecommerce'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
 	 	),
		'section'=> 'grocery_ecommerce_button_options',
		'type'=> 'number',
		'active_callback' => 'grocery_ecommerce_button_enabled'
	));

	$wp_customize->add_setting( 'grocery_ecommerce_button_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_button_border_radius', array(
      'label'  => __('Border Radius','grocery-ecommerce'),
      'section'  => 'grocery_ecommerce_button_options',
      'description' => __('Measurement is in pixel.','grocery-ecommerce'),
      'input_attrs' => array(
          'min' => 0,
          'max' => 50,
      ),
		'active_callback' => 'grocery_ecommerce_button_enabled'
 	)));

	// letter spacing button
	$wp_customize->add_setting( 'grocery_ecommerce_button_letter_spacing',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_button_letter_spacing', array(
		'label'  => __('Button Letter Spacing','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_button_options',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	// font size button
 	$wp_customize->add_setting( 'grocery_ecommerce_button_font_size',array(
		'default' => '16',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new grocery_ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_button_font_size', array(
		'label'  => __('Button Font Size','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_button_options',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('grocery_ecommerce_button_font_weight',array(
    'default' => '500',
    'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_button_font_weight',array(
	    'type' => 'select',
	    'label' => __('Button Font Weight','grocery-ecommerce'),
	    'section' => 'grocery_ecommerce_button_options',
	    'choices' => array(
	       '100' => __('100','grocery-ecommerce'),
	       '200' => __('200','grocery-ecommerce'),
	       '300' => __('300','grocery-ecommerce'),
	       '400' => __('400','grocery-ecommerce'),
	       '500' => __('500','grocery-ecommerce'),
	       '600' => __('600','grocery-ecommerce'),
	       '700' => __('700','grocery-ecommerce'),
	       '800' => __('800','grocery-ecommerce'),
	       '900' => __('900','grocery-ecommerce'),
	    ),
	) );

	$wp_customize->add_setting('grocery_ecommerce_button_text_transform',array(
        'default' => '',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
  	));
  	$wp_customize->add_control('grocery_ecommerce_button_text_transform',array(
        'type' => 'select',
        'label' => __('Button Text transform','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_button_options',
        'choices' => array(
            'uppercase' => __('Uppercase','grocery-ecommerce'),
            'capitalize' => __('Capitalize','grocery-ecommerce'),
            'lowercase' => __('lowercase','grocery-ecommerce'),
        ),
  	) );

	$wp_customize->add_setting('grocery_ecommerce_button_hover_effect',array(
        'default' => '',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
    ));
	$wp_customize->add_control('grocery_ecommerce_button_hover_effect', array(
        'type' => 'select',
        'label' => __( 'Button Hover Effect', 'grocery-ecommerce' ),
        'section' => 'grocery_ecommerce_button_options',
        'choices' => array(
			'pulse'     => __( 'Pulse', 'grocery-ecommerce' ),
			'rubberBand'=> __( 'RubberBand', 'grocery-ecommerce' ),
			'swing'     => __( 'Swing', 'grocery-ecommerce' ),
			'tada'      => __( 'Tada', 'grocery-ecommerce' ),
			'jello'     => __( 'Jello', 'grocery-ecommerce' ),
			'disable'   => __( 'Disabled', 'grocery-ecommerce' )
        ),
    ));

    //Sidebar setting
	$wp_customize->add_section( 'grocery_ecommerce_sidebar_options', array(
    	'title'   => __( 'Sidebar options', 'grocery-ecommerce'),
		'priority'   => null,
		'panel' => 'grocery_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('grocery_ecommerce_single_page_layout',array(
		'default' => 'One Column',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
 	));
	$wp_customize->add_control('grocery_ecommerce_single_page_layout', array(
		'type' => 'select',
		'label' => __( 'Single Page Layout', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_sidebar_options',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','grocery-ecommerce'),
		   'Right Sidebar' => __('Right Sidebar','grocery-ecommerce'),
		   'One Column' => __('One Column','grocery-ecommerce')
		),
 	));

 	$wp_customize->add_setting('grocery_ecommerce_single_post_layout',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
 	));
	$wp_customize->add_control('grocery_ecommerce_single_post_layout', array(
		'type' => 'select',
		'label' => __( 'Single Post Layout', 'grocery-ecommerce' ),
		'section' => 'grocery_ecommerce_sidebar_options',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','grocery-ecommerce'),
		   'Right Sidebar' => __('Right Sidebar','grocery-ecommerce'),
		   'One Column' => __('One Column','grocery-ecommerce')
		),
 	));

	$wp_customize->add_setting( 'grocery_ecommerce_sticky_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( 'grocery_ecommerce_sticky_sidebar', array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable Sticky Sidebar', 'grocery-ecommerce' ),
		'section'  => 'grocery_ecommerce_sidebar_options',
	) );

	$wp_customize->add_setting('grocery_ecommerce_sidebar_size',array(
        'default' => 'Sidebar 1/4',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_sidebar_options',
        'choices' => array(
			'Sidebar 1/4' => __('Sidebar 1/4','grocery-ecommerce'),
            'Sidebar 1/3' => __('Sidebar 1/3','grocery-ecommerce'),
        ),
	) );

    //Advance Options
	$wp_customize->add_section( 'grocery_ecommerce_advance_options', array(
    	'title' => __( 'Advance Options', 'grocery-ecommerce' ),
		'priority'   => null,
		'panel' => 'grocery_ecommerce_panel_id'
	) );
    
	// animation
	$wp_customize->add_setting( 'grocery_ecommerce_sidebar_animation',array(
	    'default' => true,
    	'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
  	) );
	$wp_customize->add_control('grocery_ecommerce_sidebar_animation',array(
	    	'type' => 'checkbox',
	       'label' => __( 'Show / Hide Animations','grocery-ecommerce' ),
	       'section' => 'grocery_ecommerce_advance_options'
	));

	$wp_customize->add_setting('grocery_ecommerce_preloader',array(
		'default' => false,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_preloader',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Preloader','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_advance_options'
	));

 	$wp_customize->add_setting( 'grocery_ecommerce_preloader_color', array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_preloader_color', array(
  		'label' => __('Preloader Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_advance_options',
		'settings' => 'grocery_ecommerce_preloader_color',
  	)));

  	$wp_customize->add_setting( 'grocery_ecommerce_preloader_bg_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_advance_options',
		'settings' => 'grocery_ecommerce_preloader_bg_color',
  	)));

  	$wp_customize->add_setting('grocery_ecommerce_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'grocery_ecommerce_preloader_bg_img',array(
        'label' => __('Preloader Background Image','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_advance_options'
	)));

  	$wp_customize->add_setting('grocery_ecommerce_preloader_type',array(
		'default' => 'Square',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_preloader_type',array(
		'type' => 'radio',
		'label' => __('Preloader Type','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_advance_options',
		'choices' => array(
		   'Square' => __('Square','grocery-ecommerce'),
		   'Circle' => __('Circle','grocery-ecommerce'),
		)
	) );

	$wp_customize->add_setting('grocery_ecommerce_theme_layout_options',array(
		'default' => 'Default Theme',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_theme_layout_options',array(
		'type' => 'radio',
		'label' => __('Theme Layout','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_advance_options',
		'choices' => array(
		   'Default Theme' => __('Default Theme','grocery-ecommerce'),
		   'Container Theme' => __('Container Theme','grocery-ecommerce'),
		   'Box Container Theme' => __('Box Container Theme','grocery-ecommerce'),
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ) );
    $wp_customize->add_control('grocery_ecommerce_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','grocery-ecommerce' ),
        'section' => 'grocery_ecommerce_advance_options'
    ));

	$wp_customize->add_setting('grocery_ecommerce_single_page_breadcrumb_alignment',array(
    	'default' => 'Left',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_single_page_breadcrumb_alignment',array(
        'type' => 'radio',
        'label' => __('Breadcrumb Alignment','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_advance_options',
        'choices' => array(
            'Center' => __('Center','grocery-ecommerce'),
            'Left' => __('Left','grocery-ecommerce'),
            'Right' => __('Right','grocery-ecommerce'),
        ),
	) );

    $wp_customize->add_setting('grocery_ecommerce_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_advance_options',
	)));

	$wp_customize->add_setting('grocery_ecommerce_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_advance_options',
	)));

	$wp_customize->add_setting('grocery_ecommerce_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_advance_options',
	)));

	$wp_customize->add_setting('grocery_ecommerce_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_advance_options',
	)));

	//404 Page Option
	$wp_customize->add_section('grocery_ecommerce_404_settings',array(
		'title'	=> __('404 Page & Search Result Settings','grocery-ecommerce'),
		'priority'	=> null,
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_404_title',array(
		'label'	=> __('404 Title','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('grocery_ecommerce_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_404_button_label',array(
		'label'	=> __('404 button Label','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('grocery_ecommerce_search_result_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_search_result_title',array(
		'label'	=> __('No Search Result Title','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('grocery_ecommerce_search_result_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_search_result_text',array(
		'label'	=> __('No Search Result Text','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_404_settings',
		'type'		=> 'text'
	));	

	//Responsive Settings
	$wp_customize->add_section('grocery_ecommerce_responsive_options',array(
		'title'	=> __('Responsive Options','grocery-ecommerce'),
		'panel' => 'grocery_ecommerce_panel_id'
	));

	$wp_customize->add_setting('grocery_ecommerce_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
     	$wp_customize,'grocery_ecommerce_menu_open_icon',array(
		'label'	=> __('Menu Open Icon','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('grocery_ecommerce_mobile_menu_label',array(
		'default' => __('Menu','grocery-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_mobile_menu_label',array(
		'type' => 'text',
		'label' => __('Mobile Menu Label','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_responsive_options'
	));

	$wp_customize->add_setting('grocery_ecommerce_menu_close_icon',array(
		'default'	=> 'fas fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
     	$wp_customize,'grocery_ecommerce_menu_close_icon',array(
		'label'	=> __('Menu Close Icon','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_responsive_options',
		'type'	  => 'icon',
	)));

	$wp_customize->add_setting('grocery_ecommerce_close_menu_label',array(
		'default' => __('Close Menu','grocery-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_close_menu_label',array(
		'type' => 'text',
		'label' => __('Close Menu Label','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_responsive_options'
	));

	//toggle button bg-color
    $wp_customize->add_setting( 'grocery_ecommerce_toggle_button_bg_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'grocery_ecommerce_toggle_button_bg_color_settings', array(
  		'label' => __('Toggle Button Bg Color', 'grocery-ecommerce'),
	    'section' => 'grocery_ecommerce_responsive_options',
	    'settings' => 'grocery_ecommerce_toggle_button_bg_color_settings',
  	)));
  

	$wp_customize->add_setting('grocery_ecommerce_sticky_header_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_sticky_header_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Sticky Header','grocery-ecommerce'),
      	'section' => 'grocery_ecommerce_responsive_options',
	));

	$wp_customize->add_setting('grocery_ecommerce_hide_topbar_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_hide_topbar_responsive',array(
     	'type' => 'checkbox',
		'label' => __('Enable Top Header','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_responsive_options',
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Slider','grocery-ecommerce'),
      	'section' => 'grocery_ecommerce_responsive_options',
	));

	$wp_customize->add_setting('grocery_ecommerce_slider_button_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_slider_button_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Slider Button','grocery-ecommerce'),
      	'section' => 'grocery_ecommerce_responsive_options',
	));

	$wp_customize->add_setting('grocery_ecommerce_preloader_responsive',array(
        'default' => false,
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_preloader_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Preloader','grocery-ecommerce'),
      	'section' => 'grocery_ecommerce_responsive_options',
	));

	$wp_customize->add_setting('grocery_ecommerce_backtotop_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_backtotop_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Enable Back to Top','grocery-ecommerce'),
      	'section' => 'grocery_ecommerce_responsive_options',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Enable Sidebar','grocery-ecommerce' ),
      'section' => 'grocery_ecommerce_responsive_options'
    ));

	//Woocommerce Options
	$wp_customize->add_section('grocery_ecommerce_woocommerce',array(
		'title'	=> __('WooCommerce Options','grocery-ecommerce'),
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting('grocery_ecommerce_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable Shop Page Sidebar','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_woocommerce'
	));

	// shop page sidebar alignment
    $wp_customize->add_setting('grocery_ecommerce_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('grocery_ecommerce_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'grocery-ecommerce'),
		'section'        => 'grocery_ecommerce_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'grocery-ecommerce'),
			'Right Sidebar' => __('Right Sidebar', 'grocery-ecommerce'),
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_shop_page_navigation',array(
		'default' => true,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_shop_page_navigation',array(
		'type' => 'checkbox',
		'label' => __('Enable Shop Page Pagination','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_woocommerce'
	));

	$wp_customize->add_setting('grocery_ecommerce_single_product_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_product_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable Single Product Page Sidebar','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_woocommerce'
	));

	// Single product Page sidebar alignment
    $wp_customize->add_setting('grocery_ecommerce_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('grocery_ecommerce_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'grocery-ecommerce'),
		'section'        => 'grocery_ecommerce_woocommerce',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'grocery-ecommerce'),
			'Right Sidebar' => __('Right Sidebar', 'grocery-ecommerce'),
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_single_related_products',array(
		'default' => true,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_single_related_products',array(
		'type' => 'checkbox',
		'label' => __('Enable Related Products','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_woocommerce'
	));

 	$wp_customize->add_setting('grocery_ecommerce_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_products_per_page',array(
		'label'	=> __('Products Per Page','grocery-ecommerce'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'grocery_ecommerce_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('grocery_ecommerce_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_products_per_row',array(
		'label'	=> __('Products Per Row','grocery-ecommerce'),
		'choices' => array(
         '2' => '2',
			'3' => '3',
			'4' => '4',
     	),
		'section'=> 'grocery_ecommerce_woocommerce',
		'type'=> 'select',
	));

	$wp_customize->add_setting('grocery_ecommerce_product_border',array(
		'default' => true,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_product_border',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide product border','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_woocommerce',
	));

 	$wp_customize->add_setting('grocery_ecommerce_product_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_product_padding',array(
		'label'	=> esc_html__('Product Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_woocommerce',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_top_padding', array(
		'label' => esc_html__( 'Top','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_bottom_padding', array(
		'label' => esc_html__( 'Bottom','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_left_padding',array(
		'default' => 10,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_left_padding', array(
		'label' => esc_html__( 'Left','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_right_padding',array(
		'default' => 10,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_right_padding', array(
		'label' => esc_html__( 'Right','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => -1,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_product_border_radius', array(
		'label'  => __('Product Border Radius','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_woocommerce',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

	$wp_customize->add_setting( 'grocery_ecommerce_product_box_shadow',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_product_box_shadow', array(
		'label'  => __('Product Box Shadow','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_woocommerce',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));	

	$wp_customize->add_setting('grocery_ecommerce_product_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_product_button_padding',array(
		'label'	=> esc_html__('Product Button Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_woocommerce',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_button_top_padding',array(
		'default' => 10,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_button_top_padding', array(
		'label' => esc_html__( 'Top','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_button_bottom_padding',array(
		'default' => 10,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_button_bottom_padding', array(
		'label' => esc_html__( 'Bottom','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_button_left_padding',array(
		'default' => 12,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_button_left_padding', array(
		'label' => esc_html__( 'Left','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_button_right_padding',array(
		'default' => 12,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_button_right_padding', array(
		'label' => esc_html__( 'Right','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_button_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_product_button_border_radius', array(
		'label'  => __('Product Button Border Radius','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_woocommerce',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('grocery_ecommerce_product_sale_position',array(
     'default' => 'Right',
     'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_product_sale_position',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_woocommerce',
		'choices' => array(
		   'Left' => __('Left','grocery-ecommerce'),
		   'Right' => __('Right','grocery-ecommerce'),
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_product_sale_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_product_sale_font_size', array(
		'label'  => __('Product Sale Font Size','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_woocommerce',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));

 	$wp_customize->add_setting('grocery_ecommerce_product_sale_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_product_sale_padding',array(
		'label'	=> esc_html__('Product Sale Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_woocommerce',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_sale_top_padding', array(
		'label' => esc_html__( 'Top','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_sale_bottom_padding',array(
		'default' => 0,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_sale_bottom_padding', array(
		'label' => esc_html__( 'Bottom','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_sale_left_padding',array(
		'default' => 0,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_sale_left_padding', array(
		'label' => esc_html__( 'Left','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('grocery_ecommerce_product_sale_right_padding',array(
		'default' => 0,
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_product_sale_right_padding', array(
		'label' => esc_html__( 'Right','grocery-ecommerce' ),
		'type' => 'number',
		'section' => 'grocery_ecommerce_woocommerce',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'grocery_ecommerce_product_sale_border_radius',array(
		'default' => '0',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_product_sale_border_radius', array(
		'label'  => __('Product Sale Border Radius','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_woocommerce',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
    )));

	//footer text
	$wp_customize->add_section('grocery_ecommerce_footer_section',array(
		'title'	=> __('Footer Section','grocery-ecommerce'),
		'panel' => 'grocery_ecommerce_panel_id'
	));

	$wp_customize->add_setting('grocery_ecommerce_hide_scroll',array(
		'default' => 'true',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('grocery_ecommerce_hide_scroll',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Back To Top','grocery-ecommerce'),
   	'section' => 'grocery_ecommerce_footer_section',
	));

	$wp_customize->add_setting('grocery_ecommerce_back_to_top',array(
		'default' => 'Right',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_back_to_top',array(
		'type' => 'radio',
		'label' => __('Back to Top Alignment','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_footer_section',
		'choices' => array(
		   'Left' => __('Left','grocery-ecommerce'),
		   'Right' => __('Right','grocery-ecommerce'),
		   'Center' => __('Center','grocery-ecommerce'),
		),
	) );

	$wp_customize->add_setting('grocery_ecommerce_back_to_top_color', array(
		'default'           => 'var(--primary-color)',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_back_to_top_color', array(
		'label'    => __('Back To Top Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('grocery_ecommerce_back_to_top_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_back_to_top_text_color', array(
		'label'    => __('Back To Top Text Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
	)));
	
	$wp_customize->add_setting('grocery_ecommerce_scroll_icon_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_scroll_icon_hover_color', array(
		'label'    => __('Back to Top Hover Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
	)));

	$wp_customize->add_setting( 'grocery_ecommerce_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','grocery-ecommerce' ),
      'section' => 'grocery_ecommerce_footer_section'
    ));

	$wp_customize->add_setting('grocery_ecommerce_footer_template',array(
		'default'	=> esc_html('grocery_ecommerce-footer-one'),
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_choices'	
	));
	$wp_customize->add_control('grocery_ecommerce_footer_template',array(
		'label'	=> esc_html__('Footer style','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_section',
		'setting'	=> 'grocery_ecommerce_footer_template',
		'type' => 'select',
		'choices' => array(
			'grocery_ecommerce-footer-one' => esc_html__('Style 1', 'grocery-ecommerce'),
			'grocery_ecommerce-footer-two' => esc_html__('Style 2', 'grocery-ecommerce'),
			'grocery_ecommerce-footer-three' => esc_html__('Style 3', 'grocery-ecommerce'),
			'grocery_ecommerce-footer-four' => esc_html__('Style 4', 'grocery-ecommerce'),
			'grocery_ecommerce-footer-five' => esc_html__('Style 5', 'grocery-ecommerce'),
			)
	));		

	$wp_customize->add_setting('grocery_ecommerce_footer_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('grocery_ecommerce_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'grocery_ecommerce_footer_bg_image',array(
		'label' => __('Footer Background Image','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_footer_section'
	)));

	$wp_customize->add_setting('grocery_ecommerce_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_footer_img_position',array(
		  'type' => 'select',
		  'label' => __('Footer Image Position','grocery-ecommerce'),
		  'section' => 'grocery_ecommerce_footer_section',
		  'choices' 	=> array(
			  'left top' 		=> esc_html__( 'Top Left', 'grocery-ecommerce' ),
			  'center top'   => esc_html__( 'Top', 'grocery-ecommerce' ),
			  'right top'   => esc_html__( 'Top Right', 'grocery-ecommerce' ),
			  'left center'   => esc_html__( 'Left', 'grocery-ecommerce' ),
			  'center center'   => esc_html__( 'Center', 'grocery-ecommerce' ),
			  'right center'   => esc_html__( 'Right', 'grocery-ecommerce' ),
			  'left bottom'   => esc_html__( 'Bottom Left', 'grocery-ecommerce' ),
			  'center bottom'   => esc_html__( 'Bottom', 'grocery-ecommerce' ),
			  'right bottom'   => esc_html__( 'Bottom Right', 'grocery-ecommerce' ),
		  ),
	));
	$wp_customize->add_setting('grocery_ecommerce_footer_attatchment',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_footer_attatchment',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','grocery-ecommerce'),
		'choices' => array(
            'fixed' => __('fixed','grocery-ecommerce'),
            'scroll' => __('scroll','grocery-ecommerce'),
        ),
		'section'=> 'grocery_ecommerce_footer_section',
	));	
	
	// footer padding
	$wp_customize->add_setting('grocery_ecommerce_footer_padding',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('grocery_ecommerce_footer_padding',array(
		'label' => __('Footer Top Bottom Padding','grocery-ecommerce'),
		'description' => __('Enter a value in pixels. Example:20px','grocery-ecommerce'),
		'input_attrs' => array(
		  'placeholder' => __( '10px', 'grocery-ecommerce' ),
		),
		'section'=> 'grocery_ecommerce_footer_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('grocery_ecommerce_footer_widget',array(
		'default'           => '4',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('grocery_ecommerce_footer_widget',array(
		'type'        => 'radio',
		'label'       => __('No. of Footer columns', 'grocery-ecommerce'),
		'section'     => 'grocery_ecommerce_footer_section',
		'description' => __('Select the number of footer columns and add your widgets in the footer.', 'grocery-ecommerce'),
		'choices' => array(
		   '1'   => __('One column', 'grocery-ecommerce'),
		   '2'  => __('Two columns', 'grocery-ecommerce'),
		   '3' => __('Three columns', 'grocery-ecommerce'),
		   '4' => __('Four columns', 'grocery-ecommerce')
		),
	)); 

	$wp_customize->add_setting('grocery_ecommerce_widgets_heading_fontsize',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float',
	));	
	$wp_customize->add_control('grocery_ecommerce_widgets_heading_fontsize',array(
		'label'	=> __('Footer Widgets Heading Font Size','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('grocery_ecommerce_widgets_heading_font_weight',array(
        'default' => '600',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control('grocery_ecommerce_widgets_heading_font_weight',array(
        'type' => 'select',
        'label' => __('Footer Widgets Heading Font Weight','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_section',
        'choices' => array(
            '100' => __('100','grocery-ecommerce'),
            '200' => __('200','grocery-ecommerce'),
            '300' => __('300','grocery-ecommerce'),
            '400' => __('400','grocery-ecommerce'),
            '500' => __('500','grocery-ecommerce'),
            '600' => __('600','grocery-ecommerce'),
            '700' => __('700','grocery-ecommerce'),
            '800' => __('800','grocery-ecommerce'),
            '900' => __('900','grocery-ecommerce'),
        ),
	) );

	$wp_customize->add_setting('grocery_ecommerce_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','grocery-ecommerce'),
    'section' => 'grocery_ecommerce_footer_section',
    'choices' => array(
    	'Left' => __('Left','grocery-ecommerce'),
        'Center' => __('Center','grocery-ecommerce'),
        'Right' => __('Right','grocery-ecommerce')
      ),
	) );

	$wp_customize->add_setting('grocery_ecommerce_footer_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('grocery_ecommerce_footer_text_tranform',array(
		'type' => 'select',
		'label' => __('Footer Widgets Heading Text Transform','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','grocery-ecommerce'),
		   'Lowercase' => __('Lowercase','grocery-ecommerce'),
		   'Capitalize' => __('Capitalize','grocery-ecommerce'),
		),
	) );	

	$wp_customize->add_setting('grocery_ecommerce_widgets_heading_letter_spacing',array(
		'default'	=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float',
	));	
	$wp_customize->add_control('grocery_ecommerce_widgets_heading_letter_spacing',array(
		'label'	=> __('Footer Widgets Heading Letter Spacing','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_section',
		'type'		=> 'number'
	));			

	$wp_customize->add_setting('grocery_ecommerce_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','grocery-ecommerce'),
    'section' => 'grocery_ecommerce_footer_section',
    'choices' => array(
    	'Left' => __('Left','grocery-ecommerce'),
        'Center' => __('Center','grocery-ecommerce'),
        'Right' => __('Right','grocery-ecommerce')
        ),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','grocery-ecommerce' ),
      'section' => 'grocery_ecommerce_footer_section'
    ));		

	$wp_customize->add_setting('grocery_ecommerce_copyright_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_copyright_bg_color', array(
		'label'    => __('Copyright Background Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('grocery_ecommerce_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_copyright_color', array(
		'label'    => __('Copyright Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
	)));

 	$wp_customize->add_setting('grocery_ecommerce_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('grocery_ecommerce_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','grocery-ecommerce'),
		'section'=> 'grocery_ecommerce_footer_section',
	));

    $wp_customize->add_setting('grocery_ecommerce_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_top_copyright_padding',array(
		'description'	=> __('Top','grocery-ecommerce'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'grocery_ecommerce_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('grocery_ecommerce_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'grocery_ecommerce_sanitize_float'
	));
	$wp_customize->add_control('grocery_ecommerce_bottom_copyright_padding',array(
		'description'	=> __('Bottom','grocery-ecommerce'),
		'input_attrs' => array(
         'step' => 1,
			'min' => 0,
			'max' => 50,
     	),
		'section'=> 'grocery_ecommerce_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('grocery_ecommerce_copyright_alignment',array(
		'default' => 'center',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_copyright_alignment',array(
		'type' => 'radio',
		'label' => __('Copyright Alignment','grocery-ecommerce'),
		'section' => 'grocery_ecommerce_footer_section',
		'choices' => array(
		   'left' => __('Left','grocery-ecommerce'),
		   'right' => __('Right','grocery-ecommerce'),
		   'center' => __('Center','grocery-ecommerce'),
		),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Grocery_Ecommerce_WP_Customize_Range_Control( $wp_customize, 'grocery_ecommerce_copyright_font_size', array(
		'label'  => __('Copyright Font Size','grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_section',
		'description' => __('Measurement is in pixel.','grocery-ecommerce'),
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		)
 	)));
	
	$wp_customize->add_setting('grocery_ecommerce_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('grocery_ecommerce_text',array(
		'label'	=> __('Copyright Text','grocery-ecommerce'),
		'description'	=> __('Add some text for footer like copyright etc.','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_section',
		'type'		=> 'text'
	));	

	//Footer Social Media
	$wp_customize->add_section('grocery_ecommerce_footer_social_media',array(
		'title'	=> __('Footer Social Media','grocery-ecommerce'),
		'priority' => null,
		'panel' => 'grocery_ecommerce_panel_id',
	));

	$wp_customize->add_setting( 'grocery_ecommerce_footer_social_media_hide_show',array(
      'default' => false,
      'sanitize_callback' => 'grocery_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('grocery_ecommerce_footer_social_media_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Social Icon','grocery-ecommerce' ),
      'section' => 'grocery_ecommerce_footer_social_media'
    ));		

	$wp_customize->add_setting('grocery_ecommerce_footer_facebook_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('grocery_ecommerce_footer_facebook_link',array(   
		'label'	=> __('Add Facebook URL','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_social_media',
		'type'		=> 'url'
	));	

	$wp_customize->add_setting('grocery_ecommerce_footer_facebook_icon',array(
        'default'   => 'fab fa-facebook-f',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_footer_facebook_icon',array(
        'label' => __('Facebook Icon','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_social_media',
        'type'    => 'icon',
    )));		

	$wp_customize->add_setting('grocery_ecommerce_footer_twitter_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('grocery_ecommerce_footer_twitter_link',array(      
		'label'	=> __('Add Twitter URL','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_social_media',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('grocery_ecommerce_footer_twitter_icon',array(
        'default'   => 'fab fa-twitter',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_footer_twitter_icon',array(
        'label' => __('Twitter Icon','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_social_media',
        'type'    => 'icon',
    )));

	$wp_customize->add_setting('grocery_ecommerce_footer_linkdin_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('grocery_ecommerce_footer_linkdin_link',array(      
		'label'	=> __('Add Linkdin URL','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_social_media',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('grocery_ecommerce_footer_linkdin_icon',array(
        'default'   => 'fab fa-linkedin-in',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_footer_linkdin_icon',array(
        'label' => __('Linkedin Icon','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_social_media',
        'type'    => 'icon',
    )));	

	$wp_customize->add_setting('grocery_ecommerce_footer_instagram_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('grocery_ecommerce_footer_instagram_link',array(      
		'label'	=> __('Add Instagram URL','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_social_media',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('grocery_ecommerce_footer_insta_icon',array(
        'default'   => 'fab fa-instagram',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_footer_insta_icon',array(
        'label' => __('Instagram Icon','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_social_media',
        'type'    => 'icon',
    )));

	$wp_customize->add_setting('grocery_ecommerce_footer_pintrest_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('grocery_ecommerce_footer_pintrest_link',array(      
		'label'	=> __('Add Pintrest URL','grocery-ecommerce'),
		'section'	=> 'grocery_ecommerce_footer_social_media',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('grocery_ecommerce_footer_pintrest_icon',array(
        'default'   => 'fab fa-pinterest-p',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Grocery_Ecommerce_Icon_Selector(
        $wp_customize,'grocery_ecommerce_footer_pintrest_icon',array(
        'label' => __('Pintrest Icon','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_social_media',
        'type'    => 'icon',
    )));	

	$wp_customize->add_setting('grocery_ecommerce_footer_icon_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'grocery_ecommerce_footer_icon_color', array(
		'label'    => __('Icon Color', 'grocery-ecommerce'),
		'section'  => 'grocery_ecommerce_footer_social_media',
	)));

	$wp_customize->add_setting('grocery_ecommerce_footer_icon_alignment',array(
    	'default' => 'Center',
        'sanitize_callback' => 'grocery_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('grocery_ecommerce_footer_icon_alignment',array(
        'type' => 'radio',
        'label' => __('Icon Alignment','grocery-ecommerce'),
        'section' => 'grocery_ecommerce_footer_social_media',
        'choices' => array(
            'Center' => __('Center','grocery-ecommerce'),
            'Left' => __('Left','grocery-ecommerce'),
            'Right' => __('Right','grocery-ecommerce'),
        ),
	) );

	$wp_customize->add_setting( 'grocery_ecommerce_footer_icon_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'grocery_ecommerce_sanitize_float',
	) );
	$wp_customize->add_control( 'grocery_ecommerce_footer_icon_font_size', array(
		'label' => __( 'Icon Font Size','grocery-ecommerce' ),
		'section'     => 'grocery_ecommerce_footer_social_media',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

		//Reset All Settings
	$wp_customize->add_section( 'grocery_ecommerce_reset_section', array(
        'title'    => __( 'Reset Theme Settings', 'grocery-ecommerce' ),
        'priority'	=> null,
		'panel' => 'grocery_ecommerce_panel_id',
    ) );

	//Reset Demo Import
    $wp_customize->add_setting( 'grocery_ecommerce_reset_demo_import_settings', array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('grocery_ecommerce_reset_demo_import_settings',array(
            'label'   => __( 'Reset Demo Import', 'grocery-ecommerce' ),
            'section' => 'grocery_ecommerce_reset_section',
            'type'    => 'button',
            'input_attrs' => array(
                'onclick' => 'ResetDemoSettings()',
            ),
    ));

	//Reset Global Color
	$wp_customize->add_setting('grocery_ecommerce_reset_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control('grocery_ecommerce_reset_color', array(
		'type'    => 'button',
		'label'   => __('Reset Global Color', 'grocery-ecommerce'),
		'section' => 'grocery_ecommerce_reset_section',
		'input_attrs' => array(
			'onclick' => 'ResetGlobalColor()',
		),
	));
}
add_action( 'customize_register', 'grocery_ecommerce_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

class Grocery_Ecommerce_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='grocery-ecommerce-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'grocery-ecommerce-radio-img-selected grocery-ecommerce-radio-img-img' : 'grocery-ecommerce-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img role="img" src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    } 
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Grocery_Ecommerce_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Grocery_Ecommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Grocery_Ecommerce_Customize_Section_Pro(
			$manager,
			'grocery_ecommerce_pro_link',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Grocery Pro', 'grocery-ecommerce' ),
					'pro_text' => esc_html__( 'Get Pro', 'grocery-ecommerce' ),
					'pro_url'  => esc_url('https://www.themesglance.com/products/woocommerce-grocery-store-wordpress-theme')
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Grocery_Ecommerce_Customize_Section_Pro(
			$manager,
			'grocery_ecommerce_doc_link',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Grocery Doc', 'grocery-ecommerce' ),
					'pro_text' => esc_html__( 'Help Doc', 'grocery-ecommerce' ),
					'pro_url'  => esc_url(GROCERY_ECOMMERCE_THEMESGLANCE_FREE_THEME_DOC)
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Grocery_Ecommerce_Customize_Section_Pro(
			$manager,
			'grocery_ecommerce_demo_link',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Grocery Demo', 'grocery-ecommerce' ),
					'pro_text' => esc_html__( 'Live Demo', 'grocery-ecommerce' ),
					'pro_url'  => esc_url(GROCERY_ECOMMERCE_THEMESGLANCE_LIVE_DEMO)
				)
			)
		);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'grocery-ecommerce-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'grocery-ecommerce-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Grocery_Ecommerce_Customize::get_instance();