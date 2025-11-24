<?php
/**
 * Grocery Ecommerce functions and definitions
 * @package Grocery Ecommerce
 */

/* Breadcrumb Begin */
function grocery_ecommerce_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} 	elseif (is_page()) {
			echo "<span> ";
			the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'grocery_ecommerce_setup' ) ) :

function grocery_ecommerce_setup() {

	$GLOBALS['content_width'] = apply_filters( 'grocery_ecommerce_content_width', 640 );
	load_theme_textdomain( 'grocery-ecommerce', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('grocery-ecommerce-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'grocery-ecommerce' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css',grocery_ecommerce_font_url() ) );
	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'grocery_ecommerce_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'grocery_ecommerce_setup' );

// Notice after Theme Activation
function grocery_ecommerce_activation_notice() {
	echo '<div class="notice notice-success is-dismissible activation-notice">';
		echo '<div class="content">';
			echo '<h2>' . esc_html__( 'Thank You for Choosing Grocery Ecommerce by Themesglance!', 'grocery-ecommerce' ) . '</h2>';
			echo '<p class="notice-para">' . esc_html__( 'We’re thrilled to have you on board. To help you get started quickly and make the most out of your theme, check out the resources below:', 'grocery-ecommerce' ) . '</p>';
			echo '<p>';
				echo '<a href="' . esc_url( admin_url( 'themes.php?page=grocery_ecommerce_guide' ) ) . '" class="button">' . esc_html__( 'Demo Import', 'grocery-ecommerce' ) . '</a>';
				echo '<a href="' . esc_url( 'https://preview.themesglance.com/grocery-ecommerce-pro/' ) . '" class="button" target="_blank">' . esc_html__( 'Demo', 'grocery-ecommerce' ) . '</a>';
				echo '<a href="' . esc_url( 'https://www.themesglance.com/products/woocommerce-grocery-store-wordpress-theme' ) . '" class="button" target="_blank">' . esc_html__( 'Get Premium', 'grocery-ecommerce' ) . '</a>';
				echo '<a href="' . esc_url( 'https://preview.themesglance.com/demo/docs/free-grocery-ecommerce/' ) . '" class="button" target="_blank">' . esc_html__( 'Documentation', 'grocery-ecommerce' ) . '</a>';
			echo '</p>';
		echo '</div>';
		echo '<div class="image-preview">';
			echo '<img src="' . esc_url( get_template_directory_uri() . '/images/notice-img.png' ) . '" alt="Notice Image" />';
		echo '</div>';
	echo '</div>';
}

/* Theme Widgets Setup */
function grocery_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'grocery-ecommerce' ),
		'description'   => __( 'Appears on blog page sidebar', 'grocery-ecommerce' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-2 py-2 px-1 text-center">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'grocery-ecommerce' ),
		'description'   => __( 'Appears on page sidebar', 'grocery-ecommerce' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-2 py-2 px-1 text-center">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'grocery-ecommerce' ),
		'description'   => __( 'Appears on page sidebar', 'grocery-ecommerce' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title mb-2 py-2 px-1 text-center">',
		'after_title'   => '</h3>',
	) );

	$grocery_ecommerce_footer_columns = get_theme_mod('grocery_ecommerce_footer_widget', '4');
	for ($i=1; $i<=$grocery_ecommerce_footer_columns; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'grocery-ecommerce' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-3">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title pb-2 mb-2">',
			'after_title'   => '</h3>',
		) );
	}
	register_sidebar( array(
			'name'          => __( 'Shop Page Sidebar', 'grocery-ecommerce' ),
			'description'   => __( 'Appears on shop page', 'grocery-ecommerce' ),	
			'id'            => 'woocommerce_sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'grocery-ecommerce' ),
		'description'   => __( 'Appears on shop page', 'grocery-ecommerce' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'grocery_ecommerce_widgets_init' );

/* Theme Font URL */
function grocery_ecommerce_font_url(){
	$font_family   = array(
		'ABeeZee:ital@0;1',
		'Abril Fatfac',
		'Acme',
		'Allura',
		'Amatic SC:wght@400;700',
		'Anton',
		'Architects Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Assistant:wght@200;300;400;500;600;700;800',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Berkshire Swash',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat:wght@400;500;600;700',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
		'Days One',
		'DM Serif Display:ital@0;1',
		'Dosis:wght@200;300;400;500;600;700;800',
		'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Familjen Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka One',
		'Fjalla One',
		'Francois One',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Gabriela',
		'Gloria Hallelujah',
		'Great Vibes',
		'Handlee',
		'Hammersmith One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Hind:wght@300;400;500;600;700',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie Flower',
		'Inter:wght@100;200;300;400;500;600;700;800;900',
		'IM Fell English SC',
		'Julius Sans One',
		'Jomhuria',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaisei HarunoUmi:wght@400;500;700',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaushan Script',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Marck Script',
		'Marcellus',
		'Merienda One',
		'Monda:wght@400;700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Oswald:wght@200;300;400;500;600;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent Marker',
		'Poiret One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prata',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Ropa Sans:ital@0;1',
		'Russo One',
		'Righteous',
		'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Satisfy',
		'Sen:wght@400;700;800',
		'Slabo 13px',
		'Slabo 27px',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Shadows Into Light Two',
		'Shadows Into Light',
		'Sacramento',
		'Sail',
		'Shrikhand',
		'League Spartan:wght@100;200;300;400;500;600;700;800;900',
		'Staatliches',
		'Stylish',
		'Tangerine:wght@400;700',
		'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
		'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Unica One',
		'VT323',
		'Varela Round',
		'Vampiro One',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'Yeseva One',
		'ZCOOL XiaoWei'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/*radio button sanitization*/
 function grocery_ecommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function grocery_ecommerce_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function grocery_ecommerce_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'grocery_ecommerce_loop_columns');
	if (!function_exists('grocery_ecommerce_loop_columns')) {
	function grocery_ecommerce_loop_columns() {
		return get_theme_mod( 'grocery_ecommerce_products_per_row', '3' ); // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'grocery_ecommerce_products_per_page' );
function grocery_ecommerce_products_per_page( $cols ) {
  	return  get_theme_mod( 'grocery_ecommerce_products_per_page',9);
}

/* Theme enqueue scripts */
function grocery_ecommerce_scripts() {
	wp_enqueue_style( 'grocery-ecommerce-font',grocery_ecommerce_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'grocery-ecommerce-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'grocery-ecommerce-style', 'rtl', 'replace' );
	wp_enqueue_style( 'grocery-ecommerce-block-pattern-frontend', get_template_directory_uri().'/block-patterns/css/block-frontend.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'grocery-ecommerce-block-style', get_theme_file_uri('/css/blocks-style.css') );
	if (get_theme_mod('grocery_ecommerce_sidebar_animation', true) == true){
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery') );
	wp_enqueue_style( 'animate-css', get_template_directory_uri().'/css/animate.css' );
}
	// Paragraph
    $grocery_ecommerce_paragraph_color = get_theme_mod('grocery_ecommerce_paragraph_color', '');
    $grocery_ecommerce_paragraph_font_family = get_theme_mod('grocery_ecommerce_paragraph_font_family', '');
    $grocery_ecommerce_paragraph_font_size = get_theme_mod('grocery_ecommerce_paragraph_font_size', '');
	// "a" tag
	$grocery_ecommerce_atag_color = get_theme_mod('grocery_ecommerce_atag_color', '');
    $grocery_ecommerce_atag_font_family = get_theme_mod('grocery_ecommerce_atag_font_family', '');
	// "li" tag
	$grocery_ecommerce_li_color = get_theme_mod('grocery_ecommerce_li_color', '');
    $grocery_ecommerce_li_font_family = get_theme_mod('grocery_ecommerce_li_font_family', '');
	// H1
	$grocery_ecommerce_h1_color = get_theme_mod('grocery_ecommerce_h1_color', '');
    $grocery_ecommerce_h1_font_family = get_theme_mod('grocery_ecommerce_h1_font_family', '');
    $grocery_ecommerce_h1_font_size = get_theme_mod('grocery_ecommerce_h1_font_size', '');
	// H2
	$grocery_ecommerce_h2_color = get_theme_mod('grocery_ecommerce_h2_color', '');
    $grocery_ecommerce_h2_font_family = get_theme_mod('grocery_ecommerce_h2_font_family', '');
    $grocery_ecommerce_h2_font_size = get_theme_mod('grocery_ecommerce_h2_font_size', '');
	// H3
	$grocery_ecommerce_h3_color = get_theme_mod('grocery_ecommerce_h3_color', '');
    $grocery_ecommerce_h3_font_family = get_theme_mod('grocery_ecommerce_h3_font_family', '');
    $grocery_ecommerce_h3_font_size = get_theme_mod('grocery_ecommerce_h3_font_size', '');
	// H4
	$grocery_ecommerce_h4_color = get_theme_mod('grocery_ecommerce_h4_color', '');
    $grocery_ecommerce_h4_font_family = get_theme_mod('grocery_ecommerce_h4_font_family', '');
    $grocery_ecommerce_h4_font_size = get_theme_mod('grocery_ecommerce_h4_font_size', '');
	// H5
	$grocery_ecommerce_h5_color = get_theme_mod('grocery_ecommerce_h5_color', '');
    $grocery_ecommerce_h5_font_family = get_theme_mod('grocery_ecommerce_h5_font_family', '');
    $grocery_ecommerce_h5_font_size = get_theme_mod('grocery_ecommerce_h5_font_size', '');
	// H6
	$grocery_ecommerce_h6_color = get_theme_mod('grocery_ecommerce_h6_color', '');
    $grocery_ecommerce_h6_font_family = get_theme_mod('grocery_ecommerce_h6_font_family', '');
    $grocery_ecommerce_h6_font_size = get_theme_mod('grocery_ecommerce_h6_font_size', '');

	$grocery_ecommerce_custom_css ='
		p,span{
		    color:'.esc_html($grocery_ecommerce_paragraph_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_paragraph_font_family).';
		    font-size: '.esc_html($grocery_ecommerce_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($grocery_ecommerce_atag_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_atag_font_family).';
		}
		li{
		    color:'.esc_html($grocery_ecommerce_li_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_li_font_family).';
		}
		h1{
		    color:'.esc_html($grocery_ecommerce_h1_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_h1_font_family).'!important;
		    font-size: '.esc_html($grocery_ecommerce_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($grocery_ecommerce_h2_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_h2_font_family).'!important;
		    font-size: '.esc_html($grocery_ecommerce_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($grocery_ecommerce_h3_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_h3_font_family).'!important;
		    font-size: '.esc_html($grocery_ecommerce_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($grocery_ecommerce_h4_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_h4_font_family).'!important;
		    font-size: '.esc_html($grocery_ecommerce_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($grocery_ecommerce_h5_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_h5_font_family).'!important;
		    font-size: '.esc_html($grocery_ecommerce_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($grocery_ecommerce_h6_color).'!important;
		    font-family: '.esc_html($grocery_ecommerce_h6_font_family).'!important;
		    font-size: '.esc_html($grocery_ecommerce_h6_font_size).'!important;
		}
	';

	wp_add_inline_style( 'grocery-ecommerce-basic-style',$grocery_ecommerce_custom_css );
	
	wp_enqueue_script( 'grocery-ecommerce-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );

	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	require get_parent_theme_file_path( '/inc/color-option.php' );
	wp_add_inline_style( 'grocery-ecommerce-basic-style',$grocery_ecommerce_custom_css );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grocery_ecommerce_scripts' );
/*** Enqueue block editor style */
function grocery_ecommerce_block_editor_styles() {
	wp_enqueue_style( 'grocery-ecommerce-font', grocery_ecommerce_font_url(), array() );
    wp_enqueue_style( 'grocery-ecommerce-block-patterns-style-editor', get_theme_file_uri( '/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'grocery_ecommerce_block_editor_styles' );

function grocery_ecommerce_mysetup() {
	/* Theme Credit link */
	define('GROCERY_ECOMMERCE_THEMESGLANCE_PRO_THEME_URL',__('https://www.themesglance.com/products/woocommerce-grocery-store-wordpress-theme','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_THEMESGLANCE_THEME_DOC',__('https://preview.themesglance.com/demo/docs/tg-grocery-ecommerce-pro/','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_THEMESGLANCE_LIVE_DEMO',__('https://preview.themesglance.com/grocery-ecommerce-pro/','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_THEMESGLANCE_FREE_THEME_DOC',__('https://preview.themesglance.com/demo/docs/free-grocery-ecommerce/','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_THEMESGLANCE_SUPPORT',__('https://wordpress.org/support/theme/grocery-ecommerce/','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_THEMESGLANCE_REVIEW',__('https://wordpress.org/support/theme/grocery-ecommerce/reviews/#new-post','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_SITE_URL',__('https://www.themesglance.com/products/free-grocery-ecommerce-wordpress-theme','grocery-ecommerce'));
	define('GROCERY_ECOMMERCE_BUNDLE_URL',__('https://www.themesglance.com/products/wp-theme-bundle','grocery-ecommerce'));
	/* Implement the Custom Header feature. */
	require get_template_directory() . '/block-patterns/block-patterns.php';
}
add_action( 'after_setup_theme', 'grocery_ecommerce_mysetup' );

function grocery_ecommerce_credit_link() {
    echo "<a href=".esc_url(GROCERY_ECOMMERCE_SITE_URL)." target='_blank'>".esc_html__('Grocery Ecommerce WordPress Theme ','grocery-ecommerce')."</a>";
}

/*----- Related Posts Function ------*/
if ( ! function_exists( 'grocery_ecommerce_related_posts_function' ) ) {
	function grocery_ecommerce_related_posts_function() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'grocery_ecommerce_related_post_count', '3' ) ),
		);
		// Related by categories
		if ( get_theme_mod( 'grocery_ecommerce_post_shown_by', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'grocery_ecommerce_post_shown_by', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();

		return $query;
	}
}

function grocery_ecommerce_blog_image_dimension(){
	if(get_theme_mod('grocery_ecommerce_blog_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

function grocery_ecommerce_pagination_callback() {
    return get_theme_mod( 'grocery_ecommerce_pagination_type', 'page-numbers' ) === 'next-prev';
}

function grocery_ecommerce_excerpt_enabled(){
	if(get_theme_mod('grocery_ecommerce_blog_post_content') == 'Excerpt Content' ) {
		return true;
	}
	return false;
}

function grocery_ecommerce_grid_excerpt_enabled(){
	if(get_theme_mod('grocery_ecommerce_grid_post_content') == 'Excerpt Content' ) {
		return true;
	}
	return false;
}

function grocery_ecommerce_single_post_image_dimension(){
	if(get_theme_mod('grocery_ecommerce_single_post_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}
function grocery_ecommerce_button_enabled(){
	if(get_theme_mod('grocery_ecommerce_blog_button_text') != '' ) {
		return true;
	}
	return false;
}

function grocery_ecommerce_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function grocery_ecommerce_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function grocery_ecommerce_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}
function grocery_ecommerce_slider_enabled(){
	if(get_theme_mod('grocery_ecommerce_show_slider') == false ) {
		return true;
	}
	return false;
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

// Reset demo import settings
function grocery_ecommerce_reset_demo_import_settings() {
    if (current_user_can('manage_options')) {
        // List only demo import-related settings to reset
    remove_theme_mod( 'grocery_ecommerce_order_text' );
    remove_theme_mod( 'grocery_ecommerce_cashback_text' );
    remove_theme_mod( 'grocery_ecommerce_call' );
    remove_theme_mod( 'grocery_ecommerce_topbar_button_text' );
    remove_theme_mod( 'grocery_ecommerce_topbar_button_link' );
    remove_theme_mod( 'grocery_ecommerce_top_header' );
    remove_theme_mod( 'grocery_ecommerce_show_slider' );
    remove_theme_mod( 'grocery_ecommerce_slider_button_label' );
    remove_theme_mod( 'grocery_ecommerce_slider_button_link' );
    remove_theme_mod( 'grocery_ecommerce_slidersettings_page1' );
    remove_theme_mod( 'grocery_ecommerce_slidersettings_page2' );
    remove_theme_mod( 'grocery_ecommerce_slidersettings_page3' );
    remove_theme_mod( 'grocery_ecommerce_slidersettings_page4' );
    remove_theme_mod( 'grocery_ecommerce_show_product_section' );
    remove_theme_mod( 'grocery_ecommerce_small_title' );
    remove_theme_mod( 'grocery_ecommerce_section_title' );
    remove_theme_mod( 'grocery_ecommerce_product_timer_text' );
    remove_theme_mod( 'grocery_ecommerce_product_clock_timer_end' );
    remove_theme_mod( 'grocery_ecommerce_sale_product_category' );
    remove_theme_mod( 'grocery_ecommerce_product_category' );
    remove_theme_mod( 'grocery_ecommerce_footer_text' );

        wp_send_json_success(array(
            'message' => __('Demo import settings have been reset.', 'grocery-ecommerce')
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('Permission denied.', 'grocery-ecommerce')
        ));
    }
}
add_action('wp_ajax_grocery_ecommerce_reset_demo_import_settings', 'grocery_ecommerce_reset_demo_import_settings'); 

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Implement the Get Started. */
require get_template_directory() . '/inc/getting-started/getting-started.php';

/* Implement the TGM. */
require get_template_directory() . '/inc/tgm.php';

/* webfont */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );