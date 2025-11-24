<?php
/**
 * @package Ecommerce Bazaar
 */

/**
 * Footer
 */
if (! function_exists( 'ecommerce_bazaar_footer_copyrights' ) ):
    function ecommerce_bazaar_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'ecommerce_bazaar_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'ecommerce_bazaar_footer_copyright_text'));
                                if(get_theme_mod('ecommerce_bazaar_en_footer_credits',true)) :
                                    ?>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(ECOMMERCE_BAZAAR_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Ecommerce WordPress Theme','ecommerce-bazaar') ?></a><?php esc_html_e(' by Legacy Themes','ecommerce-bazaar') ?></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'ecommerce-bazaar' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(ECOMMERCE_BAZAAR_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Ecommerce WordPress Theme','ecommerce-bazaar') ?></a><?php esc_html_e(' by Legacy Themes','ecommerce-bazaar') ?></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'ecommerce_bazaar_action_footer', 'ecommerce_bazaar_footer_copyrights' );


/**
 * Page Title Settings
 */
if (!function_exists('ecommerce_bazaar_show_page_title')) :
    function ecommerce_bazaar_show_page_title() {
        if (!is_front_page()) {
            ?>
            <div class="page-title"> 
                <div class="content-section img-overlay">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="section-title"> 
                                    <?php
                                    if (is_singular('post')) {
                                        // Single blog post
                                        echo '<h1 class="main-title">' . get_the_title() . '</h1>';
                                    } elseif (is_category()) {
                                        echo '<h1 class="main-title">' . single_cat_title('', false) . '</h1>';
                                    } elseif (is_tag()) {
                                        echo '<h1 class="main-title">' . single_tag_title('', false) . '</h1>';
                                    } elseif (is_author()) {
                                        echo '<h1 class="main-title">' . get_the_author() . '</h1>';
                                    } elseif (is_archive()) {
                                        echo '<h1 class="main-title">' . get_the_archive_title() . '</h1>';
                                    } elseif (is_search()) {
                                        echo '<h1 class="main-title">' . esc_html__('Search Results', 'ecommerce-bazaar') . '</h1>';
                                    } elseif (is_404()) {
                                        echo '<h1 class="main-title">' . esc_html__('Page Not Found', 'ecommerce-bazaar') . '</h1>';
                                    } else {
                                        echo '<h1 class="main-title">' . get_the_title() . '</h1>';
                                    }
                                    ?>
                                </div>                      
                            </div>
                        </div>
                    </div>  
                </div>
            </div>  <!-- End page-title --> 
            <?php
        }
    }
endif;


/**
 * Home Banner Section
 */
if (! function_exists( 'ecommerce_bazaar_home_banner_section' ) ):
    function ecommerce_bazaar_home_banner_section() {
        ?>
        <section id="main-banner-wrap">
            <div class="banner-side-margin position-relative">
                <div class="main-banner-inner-box">
                    <?php
                    $ecommerce_bazaar_banner_image = get_theme_mod( 'ecommerce_bazaar_banner_image', '' );
                    if ( ! empty( $ecommerce_bazaar_banner_image ) ) { ?>
                        <img src="<?php echo esc_url( $ecommerce_bazaar_banner_image ); ?>">
                    <?php } ?>
                </div>
                <?php
                $ecommerce_bazaar_alignment_class = get_theme_mod( 'ecommerce_bazaar_slider_content_alignment', 'left' );
                ?>
                <div class="main-banner-content-box content-<?php echo esc_attr( $ecommerce_bazaar_alignment_class ); ?>">
                    <?php
                        $ecommerce_bazaar_banner_heading = get_theme_mod( 'ecommerce_bazaar_banner_heading', '' );
                        if ( ! empty( $ecommerce_bazaar_banner_heading ) ) { ?>
                        <h3><?php echo esc_html( $ecommerce_bazaar_banner_heading ); ?></h3>
                    <?php } ?>
                    <?php
                        $ecommerce_bazaar_banner_text = get_theme_mod( 'ecommerce_bazaar_banner_text', '' );
                        if ( ! empty( $ecommerce_bazaar_banner_text ) ) { ?>
                        <p><?php echo esc_html( $ecommerce_bazaar_banner_text ); ?></p>
                    <?php } ?>
                    <div class="banner-button">
                        <?php
                        $ecommerce_bazaar_banner_button_link = get_theme_mod( 'ecommerce_bazaar_banner_button_link', '' );
                        if ( ! empty( $ecommerce_bazaar_banner_button_link ) ) { ?>
                            <a href="<?php echo esc_url( $ecommerce_bazaar_banner_button_link ); ?>"><?php echo esc_html('Read More','ecommerce-bazaar'); ?></a>
                        <?php } ?>
                    </div>
                    <div class="prodt-gallry">
                        <?php
                            $ecommerce_bazaar_banner_product_head = get_theme_mod( 'ecommerce_bazaar_banner_product_head', '' );
                            if ( ! empty( $ecommerce_bazaar_banner_product_head ) ) { ?>
                            <h4 class="py-3 mt-lg-5 mt-3 mb-4 px-3"><?php echo esc_html( $ecommerce_bazaar_banner_product_head ); ?></h4>
                        <?php } ?>
                        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            <div class="category-section">
                                <div class="category-grid row">
                                    <?php                                    
                                    $ecommerce_bazaar_category_number = get_theme_mod('ecommerce_bazaar_category_number', 3);
                                    $ecommerce_bazaar_category_names = array();
                                    for ($i = 1; $i <= $ecommerce_bazaar_category_number; $i++) {
                                        $ecommerce_bazaar_category_name = get_theme_mod('ecommerce_bazaar_best_category_name' . $i);
                                        if ($ecommerce_bazaar_category_name) {
                                            $ecommerce_bazaar_category_names[] = sanitize_text_field($ecommerce_bazaar_category_name);
                                        }
                                    }
                                    $args = array(
                                        'taxonomy'   => 'product_cat',
                                        'orderby'    => 'name',
                                        'order'      => 'ASC',
                                        'hide_empty' => true,
                                        'number'     => $ecommerce_bazaar_category_number,
                                        'exclude'    => array(get_option('default_product_cat')),
                                        'slug'       => $ecommerce_bazaar_category_names,
                                    );

                                    $product_categories = get_terms($args);

                                    if (!empty($product_categories)) {
                                        foreach ($product_categories as $category) {                                          
                                            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                            $ecommerce_bazaar_category_img = wp_get_attachment_url($thumbnail_id);                                           
                                            if (!$ecommerce_bazaar_category_img) {
                                                $ecommerce_bazaar_category_img = wc_placeholder_img_src();
                                            }
                                            ?>
                                    <div class="category-box col-lg-4 col-md-4 col-6 px-2">
                                        <a href="<?php echo get_term_link($category); ?>">
                                            <div class="category-thumb">
                                                <img src="<?php echo esc_url($ecommerce_bazaar_category_img); ?>" alt="<?php echo esc_attr($category->name); ?>" />
                                            </div>
                                            <h6 class="category-name text-center"><?php echo esc_html($category->name); ?></h6>
                                        </a>
                                    </div>
                                    <?php
                                        }
                                    } else {
                                        echo esc_html('No categories found.','ecommerce-bazaar');
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>                             
                    </div>
                </div>    
            </div>
        </section>
        <?php
    }
endif;
add_action( 'ecommerce_bazaar_action_home_banner', 'ecommerce_bazaar_home_banner_section' );


/**
 * Home product Section
 */
if (! function_exists( 'ecommerce_bazaar_home_product_section' ) ):
    function ecommerce_bazaar_home_product_section() {
        ?>
        <section id="product-wrap" class="py-5">
            <div class="container-fluid">
                <div class="inner-wrap px-lg-5 px-md-5">
                    <div class="product-head">
                        <?php
                            $ecommerce_bazaar_product_main_heading = get_theme_mod( 'ecommerce_bazaar_product_main_heading', '' );
                            if ( ! empty( $ecommerce_bazaar_product_main_heading ) ) { ?>
                            <h3 class="py-2"><?php echo esc_html( $ecommerce_bazaar_product_main_heading ); ?></h3>
                        <?php } ?>
                    </div>
                    <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                        <div class="product-box">
                            <div class="owl-carousel">
                                <?php
                                $ecommerce_bazaar_selected_category = get_theme_mod('ecommerce_bazaar_product_category', '');

                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 100,
                                    'order' => 'ASC',
                                    'tax_query' => !empty($ecommerce_bazaar_selected_category) ? array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'slug',
                                            'terms'    => $ecommerce_bazaar_selected_category, 
                                        ),
                                    ) : '',
                                );
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                                <div class="product-inn inner-project">
                                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, ''); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                                    <div class="star-rating">
                                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                                    </div>
                                    <h3 class="product-text mb-0 pt-1"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                                    <span class="price-hd"><?php echo esc_html('Start From - ','ecommerce-bazaar'); ?></span>
                                    <span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> price"><?php echo $product->get_price_html(); ?></span>
                                </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>                
            </div>
        </section>
        <?php    
    }
endif;
add_action( 'ecommerce_bazaar_action_home_product', 'ecommerce_bazaar_home_product_section' );

/**
 * Home page another adding Section
 */
if (! function_exists( 'ecommerce_bazaar_home_extra_section' ) ):
    function ecommerce_bazaar_home_extra_section() {
        ?>
        <div id="custom-home-extra-content" class="py-3">
            <div class="container">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>
            </div>
        </div>
        <?php    
    }
endif;
add_action( 'ecommerce_bazaar_action_home_extra', 'ecommerce_bazaar_home_extra_section' );