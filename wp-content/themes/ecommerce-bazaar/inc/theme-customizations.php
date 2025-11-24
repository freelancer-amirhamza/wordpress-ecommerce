<?php
// Enqueue theme styles and custom inline CSS
function ecommerce_bazaar_enqueue_styles() {
    wp_enqueue_style('ecommerce-bazaar-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ecommerce_bazaar_enqueue_styles');

// custom header
    add_theme_support('custom-header', array(
            'width'                  => 1920, 
            'height'                 => 400,  
            'flex-height'            => true,
            'flex-width'             => true,
            'header-text'            => true, // Enable or disable header text
            'default-text-color'     => 'ffffff', // Default header text color
            'wp-head-callback'       => 'ecommerce_bazaar_header_style',
        ) );

// custom-background
    add_theme_support( 'custom-background', array(
          'default-color' => 'ffffff',
        ));

// Style the header
function ecommerce_bazaar_header_style() {
    $ecommerce_bazaar_header_image = get_header_image();    
    $ecommerce_bazaar_header_text_color = get_header_textcolor();
   
     if (get_theme_support('custom-header', 'default-text-color') !== $ecommerce_bazaar_header_text_color || !empty($ecommerce_bazaar_header_image)) {
            ?>
        <style type="text/css" id="entr-header-css">
            <?php
            // Has a Custom Header been added?
            if (!empty($ecommerce_bazaar_header_image)) :
                ?>
                 #header-main {
                    background-image: url(<?php header_image(); ?>);
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    -webkit-background-size: cover;
                    -moz-background-size:    cover;
                    -o-background-size:      cover;
                    background-size:         cover;
                }
            <?php endif; ?> 
            <?php
                if ('blank' === $ecommerce_bazaar_header_text_color) :
                ?>
                    header.style1 .logo h1.site-title a, header.style1 .logo p.site-description {
                        color: #<?php echo esc_attr( $ecommerce_bazaar_header_text_color ); ?>;
                    }
                <?php elseif ('' !== $ecommerce_bazaar_header_text_color) : ?>
                    header.style1 .logo h1.site-title a, header.style1 .logo p.site-description {
                        color: #<?php echo esc_attr($ecommerce_bazaar_header_text_color); ?>;
                    }            
                <?php endif; ?>
        </style>
    <?php
        }
    }
// site-title-checkbox
// Remove "Display Site Title and Tagline" checkbox from Customizer
function ecommerce_bazaar_remove_header_text_display_checkbox( $wp_customize ) {
    $wp_customize->remove_control( 'display_header_text' ); // Removes the checkbox
}
add_action( 'customize_register', 'ecommerce_bazaar_remove_header_text_display_checkbox', 11 );

/**
* Custom logo
*/
function ecommerce_bazaar_logo_setup(){
    add_theme_support('custom-logo', array(
        'height' => 65,
        'width' => 350,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'ecommerce_bazaar_logo_setup');

// logo-resizer
function ecommerce_bazaar_logo_dynamic_css() {
    $ecommerce_bazaar_logo_width = get_theme_mod( 'ecommerce_bazaar_logo_width', 150 );
    ?>
    <style type="text/css">
        .logo .custom-logo {
            max-width: <?php echo esc_attr( $ecommerce_bazaar_logo_width ); ?>px;
            height: auto;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ecommerce_bazaar_logo_dynamic_css' );

// buttons
function ecommerce_bazaar_custom_button_styles() {
    $ecommerce_bazaar_radius = get_theme_mod( 'ecommerce_bazaar_button_border_radius', '0px' );
    $ecommerce_bazaar_padding = get_theme_mod( 'ecommerce_bazaar_button_padding', '10px 40px' );
    ?>
    <style type="text/css">
        .btn,
        .button,
        button,
        input[type="submit"],
        .wp-block-button__link,#blog-section .read-more a,.read-more a,.banner-button a {
            border-radius: <?php echo esc_attr($ecommerce_bazaar_radius); ?>;
            padding: <?php echo esc_attr($ecommerce_bazaar_padding); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'ecommerce_bazaar_custom_button_styles' );

function ecommerce_bazaar_customize_fonts() {
    $ecommerce_bazaar_body_font = get_theme_mod('ecommerce_bazaar_body_font_family', 'Noto Sans, sans-serif');
    $ecommerce_bazaar_heading_font = get_theme_mod('ecommerce_bazaar_heading_font_family', 'Noto Sans, sans-serif');
    
    $ecommerce_bazaar_body_font_name = trim(explode(',', $ecommerce_bazaar_body_font)[0]);
    $ecommerce_bazaar_heading_font_name = trim(explode(',', $ecommerce_bazaar_heading_font)[0]);

    // Generate Google Fonts URL
    $ecommerce_bazaar_google_font_url = 'https://fonts.googleapis.com/css2?family=' . urlencode($ecommerce_bazaar_body_font_name) . '&family=' . urlencode($ecommerce_bazaar_heading_font_name) . '&display=swap';

    // Enqueue fonts
    wp_enqueue_style('ecommerce-bazaar-fonts', $ecommerce_bazaar_google_font_url, array(), null);

    // Custom inline style for font application
    $custom_css = "
        body, p, span, label, div {
            font-family: {$ecommerce_bazaar_body_font};
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: {$ecommerce_bazaar_heading_font};
        }
    ";
    wp_add_inline_style('ecommerce-bazaar-fonts', $custom_css);
}
add_action('wp_enqueue_scripts', 'ecommerce_bazaar_customize_fonts');


// page title box
function ecommerce_bazaar_page_title_dynamic_styles() {
    $bg_type = get_theme_mod('ecommerce_bazaar_page_bg_radio', '');
    $bg_color = get_theme_mod('ecommerce_bazaar_page_bg_color', '');
    $bg_image = get_theme_mod('ecommerce_bazaar_page_bg_image', '');
    $global_color = get_theme_mod('ecommerce_bazaar_global_color1', '#eb1749');

    $ecommerce_bazaar_dynamic_css = '';

    if ($bg_type === 'image' && !empty($bg_image)) {
        $ecommerce_bazaar_dynamic_css .= '.page-title {';
        $ecommerce_bazaar_dynamic_css .= 'background-image: url("' . esc_url($bg_image) . '");';
        $ecommerce_bazaar_dynamic_css .= 'background-size: cover;';
        $ecommerce_bazaar_dynamic_css .= 'background-position: center;';
        $ecommerce_bazaar_dynamic_css .= '}';
    } elseif ($bg_type === 'color' && !empty($bg_color)) {
        $ecommerce_bazaar_dynamic_css .= '.page-title {';
        $ecommerce_bazaar_dynamic_css .= 'background-color: ' . esc_attr($bg_color) . ';';
        $ecommerce_bazaar_dynamic_css .= '}';
    } else {
        // Fallback to global theme color
        $ecommerce_bazaar_dynamic_css .= '.page-title {';
        $ecommerce_bazaar_dynamic_css .= 'background-color: ' . esc_attr($global_color) . ';';
        $ecommerce_bazaar_dynamic_css .= '}';
    }

    if (!empty($ecommerce_bazaar_dynamic_css)) {
        echo '<style type="text/css">' . $ecommerce_bazaar_dynamic_css . '</style>';
    }
}
add_action('wp_head', 'ecommerce_bazaar_page_title_dynamic_styles', 20);

// Register page title action globally
add_action('ecommerce_bazaar_get_page_title', 'ecommerce_bazaar_show_page_title');

// global color
function ecommerce_bazaar_global_color_custom_css() {
    $ecommerce_bazaar_whole_color   = get_theme_mod('ecommerce_bazaar_global_color1', '#eb1749');
    
    $ecommerce_bazaar_bg_type       = get_theme_mod('ecommerce_bazaar_page_bg_radio', 'color');

    $ecommerce_bazaar_theme_css = '';

    if (!empty($ecommerce_bazaar_whole_color)) {
        // Apply global background only if no custom bg for page-title
        if ($ecommerce_bazaar_bg_type !== 'color' && $ecommerce_bazaar_bg_type !== 'image') {
            $ecommerce_bazaar_theme_css .= '.page-title .content-section{ background: ' . esc_attr($ecommerce_bazaar_whole_color) . '; }';
        }

        $ecommerce_bazaar_theme_css .= '#footer,#sidebar-wrapper h3, #sidebar-wrapper label.wp-block-search__label, #sidebar-wrapper .widget_block h3, #sidebar-wrapper h2, #sidebar-wrapper label.wp-block-search__label,.wp-block-file .wp-block-file__button,.wp-block-button .wp-block-button__link,#footer select,a.btntoTop:hover,a.wc-block-components-button.wp-element-button.wc-block-cart__submit-button.contained,#blog-section .read-more a,.post-tags a:hover,.blog .pagination .nav-links .current,.woocommerce .woocommerce-info .button,button.woocommerce-Button.button,.woocommerce span.onsale,.woocommerce div.product form.cart .button,.woocommerce ul.products li.product .button,.wc-block-grid__product-add-to-cart .wp-block-button__link,button,input[type="submit"],aside form #searchsubmit,#sidebar-wrapper ul li:not(.recentcomments) a:before,.follow-us i:hover,.banner-button a,section#product-wrap button.owl-prev i:hover, section#product-wrap button.owl-next i:hover,.inn-sidebar ul li:not(.recentcomments) a:before,.detail-sidebar ul li:not(.recentcomments) a:before,.inn-sidebar label.wp-block-search__label,.inn-sidebar h2,.inn-sidebar h3,.inn-sidebar .widget_bloc h3,.detail-sidebar h3,.detail-sidebar .widget_block h3,.detail-sidebar h2,.detail-sidebar label.wp-block-search__label{';
        $ecommerce_bazaar_theme_css .= 'background: ' . esc_attr($ecommerce_bazaar_whole_color) . ';';
        $ecommerce_bazaar_theme_css .= '}';

        $ecommerce_bazaar_theme_css .= 'textarea,#sidebar-wrapper .widget ul li a, #footer .footer-widgets .widget ul li a, #footer .footer-widgets .section ul li a,div#sidebar-wrapper .wp-block-latest-comments__comment-author, div#sidebar-wrapper .wp-block-latest-comments__comment-link,.loader-pulse,.main-navigation .menu > li > a:hover,.woocommerce.widget_shopping_cart .buttons a,#footer .wp-block-button__link,div.footer-widgets-wrapper p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tagcloud a,p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tag-cloud a,#blog-section .meta a,#blog-section .meta span,#blog-section .meta span,#blog-section .meta span a,.nav-previous a .post-title,.nav-next a .post-title,aside #searchform div,.woocommerce ul.products li.product .price,.detail-sidebar ul li a:hover,.inn-sidebar ul li a:hover,.woocommerce-My,#site-navigation .menu ul li a:hover,.page_item_has_children ul li a,.main-navigation .menu .menu-item-has-children ul li a,.main-navigation li.current_page_item > a, .main-navigation li.current-menu-item > a,.woocommerce-MyAccount-content a,.wp-block-file .wp-block-file__button,.wp-block-button.is-style-outline .wp-block-button__link,a.btntoTop,div#sidebar-wrapper .widget ul li a,div#sidebar-wrapper select,div#sidebar-wrapper p.wp-block-tag-cloud a:before,div#sidebar-wrapper .tagcloud a:before,div#sidebar-wrapper p.wp-block-tag-cloud a:before,div#sidebar-wrapper p.wp-block-tag-cloud a,div#sidebar-wrapper .tagcloud a,div#sidebar-wrapper p.wp-block-tag-cloud a,div#sidebar-wrapper .widget ul li,.blog-cat li a:hover,p.hd-call,.custom-cart a:hover,.category-box:hover h6.category-name,span.price,p.hd-call,.custom-cart a:hover,.product-inn.inner-project span.price,.inn-sidebar .wp-block-latest-comments__comment-author,.inn-sidebar .wp-block-latest-comments__comment-link,.detail-sidebar .wp-block-latest-comments__comment-author,.detail-sidebar .wp-block-latest-comments__comment-link,.inn-sidebar .widget ul li a,.detail-sidebar .widget ul li a,.inn-sidebar ul li:hover,.detail-sidebar ul li:hover,.inn-sidebar p.wp-block-tag-cloud a:before,.inn-sidebar .tagcloud a:before,.inn-sidebar p.wp-block-tag-cloud a:before,.detail-sidebar p.wp-block-tag-cloud a:before,.detail-sidebar .tagcloud a:before,.detail-sidebar p.wp-block-tag-cloud a:before,.inn-sidebar .tagcloud a,.detail-sidebar .tagcloud a{';
        $ecommerce_bazaar_theme_css .= 'color: ' . esc_attr($ecommerce_bazaar_whole_color) . ';';
        $ecommerce_bazaar_theme_css .= '}';

        $ecommerce_bazaar_theme_css .= 'a.btntoTop,nav.woocommerce-MyAccount-navigation ul li,.wp-block-file .wp-block-file__button,.wp-block-button.is-style-outline .wp-block-button__link,.wp-block-pullquote blockquote,.wp-block-quote:not(.is-large):not(.is-style-large),div.footer-widgets-wrapper p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tagcloud a,p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tag-cloud a,.top-menu .navigation>li.current-menu-item.current_page_item a,.main-navigation li.current_page_item > a, .main-navigation li.current-menu-item > a,.category-box:hover .category-thumb{';
        $ecommerce_bazaar_theme_css .= 'border-color: ' . esc_attr($ecommerce_bazaar_whole_color) . ';';
        $ecommerce_bazaar_theme_css .= '}';
    }

    if (!empty($ecommerce_bazaar_theme_css)) {
        echo '<style type="text/css">' . $ecommerce_bazaar_theme_css . '</style>';
    }
}
add_action('wp_head', 'ecommerce_bazaar_global_color_custom_css', 10);

