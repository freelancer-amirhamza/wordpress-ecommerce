<?php
/**
 * Ecommerce Bazaar functions and definitions.
 *
 * @package Ecommerce Bazaar
 */

/**
 *  Defining Constants
 */

// Core Constants
define('ECOMMERCE_BAZAAR_REQUIRED_PHP_VERSION', '5.6' );
define('ECOMMERCE_BAZAAR_DIR_PATH', get_template_directory());
define('ECOMMERCE_BAZAAR_DIR_URI', get_template_directory_uri());
define('ECOMMERCE_BAZAAR_AUT','https://www.legacytheme.net/products/free-ecommerce-wordpress-theme/');


if ( ! function_exists( 'ecommerce_bazaar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ecommerce_bazaar_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // support alig-wide
    add_theme_support( 'align-wide' );

    add_theme_support( "wp-block-styles" );

    add_theme_support( "responsive-embeds" );

    load_theme_textdomain( 'ecommerce-bazaar', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'ecommerce-bazaar' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(      
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Gallery post format
    add_theme_support( 'post-formats', array( 'gallery' ));

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'ecommerce_bazaar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecommerce_bazaar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecommerce_bazaar_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecommerce_bazaar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecommerce_bazaar_widgets_init() {
	//Footer widget columns
    $widget_num = absint(get_theme_mod( 'ecommerce_bazaar_footer_widgets', '4' ));
    for ( $i=1; $i <= $widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'ecommerce-bazaar' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title" itemprop="name">',
            'after_title'   => '</h4>',
        ) );
    endfor;

    register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'ecommerce-bazaar' ),
		'id'            => 'primary-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'ecommerce-bazaar' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

     register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 2', 'ecommerce-bazaar' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets here.', 'ecommerce-bazaar' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 3', 'ecommerce-bazaar' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets here.', 'ecommerce-bazaar' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ecommerce_bazaar_widgets_init' );

/** 
* Excerpt More
*/
function ecommerce_bazaar_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
    return '&hellip;';
}
add_filter('excerpt_more', 'ecommerce_bazaar_excerpt_more');


/** 
* Custom excerpt length.
*/
function ecommerce_bazaar_excerpt_length() {
	$length= intval(get_theme_mod('ecommerce_bazaar_posts_excerpt_length',30));
    return $length;
}
add_filter('excerpt_length', 'ecommerce_bazaar_excerpt_length');

/*
script goes here
*/
function ecommerce_bazaar_scripts() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.3');
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/css/bootstrap-icons.css', array(), '5.3.3');
    wp_enqueue_style( 'ecommerce-bazaar-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
    wp_style_add_data('ecommerce-bazaar-style', 'rtl', 'replace');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '3.1.5');    
    
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel' . '.css', array(), '2.3.4' );

     // Block stylesheet.
    wp_enqueue_style( 'ecommerce-bazaar-block-style', get_theme_file_uri( '/css/blocks-styles.css' ), array( 'ecommerce-bazaar-style' ), '1.0' );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', true );
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js',array(),'3.1.5', true );	
    
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '5.3.3', true );

    wp_enqueue_script( 'ecommerce-bazaar-main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'customize-preview'), '1.0', true );
    // Owl Carousel.
    wp_enqueue_script( 'owl-carouselscript', get_template_directory_uri() . '/js/owl.carousel' . '.js', array( 'jquery' ), '2.3.4', true );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_bazaar_scripts' );


/**
* Custom search form
*/
function ecommerce_bazaar_search_form( $form ) {
    $form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','ecommerce-bazaar' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="bi bi-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','ecommerce-bazaar' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'ecommerce_bazaar_search_form', 100 );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ecommerce_bazaar_pingback_header() {
    if ( is_singular() && pings_open() ) {
       printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'ecommerce_bazaar_pingback_header' );


// Function to display WooCommerce cart icon with total price
function ecommerce_bazaar_custom_woocommerce_cart_with_total() {
    // Check if WooCommerce is active
    if (class_exists('WooCommerce')) {
        ?>
        <div class="custom-cart">
            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>">
                <span class="cart-icon">
                    <i class="bi bi-cart-dash"></i>
                </span>
                <span class="cart-total">
                    <!-- Display total price -->
                    <?php echo wp_kses_post(WC()->cart->get_cart_total()); ?>
                </span>
            </a>
        </div>
        <?php
    }
}

// Add WooCommerce support to the theme
function ecommerce_bazaar_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ecommerce_bazaar_add_woocommerce_support' );


// Change the number of product columns in WooCommerce shop page
function ecommerce_bazaar_change_woocommerce_shop_columns( $columns ) {
    $columns = 3; // Change this number to your desired column count (e.g., 2, 3, 4, etc.)
    return $columns;
}
add_filter( 'loop_shop_columns', 'ecommerce_bazaar_change_woocommerce_shop_columns', 999 );


/**
 * Customizer additions.
 */
require get_parent_theme_file_path() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_parent_theme_file_path() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-tags.php';

/**
 * Custom template hooks for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-hooks.php';

/**
 * Extra classes for this theme.
 */
require get_parent_theme_file_path() . '/inc/extras.php';

 /**getstart*/
require get_template_directory() . '/inc/ecommerce-bazaar-get-theme-info.php';

if ( ! function_exists( 'ecommerce_bazaar_admin_scripts' ) ) :
    function ecommerce_bazaar_admin_scripts($hook) {
        wp_enqueue_style( 'info-page', get_template_directory_uri() . '/css/ecommerce-bazaar-get-theme-info.css', false ); 
    }
endif;
add_action( 'admin_enqueue_scripts', 'ecommerce_bazaar_admin_scripts' );
/**
 * Upgrade to Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'ecommerce-bazaar-pro/class-customize.php' );

/**
 * Notices
 */
require_once get_parent_theme_file_path( '/inc/activation-notice/class-welcome-notice.php' );

/**
 * Theme DEMO IMPORT.
 */
require get_template_directory() . '/inc/quick-start-page.php';

/**
 * Theme TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

// extra customization
require_once get_template_directory() . '/inc/theme-customizations.php';

// Add this function to  theme for the deprecated error
function ecommerce_bazaar_get_page_id_by_title($title) {
    $query = new WP_Query(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        's'              => $title,
    ));

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            if (strcasecmp($post->post_title, $title) === 0) {
                return $post->ID;
            }
        }
    }

    return false; // Return false if not found
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );