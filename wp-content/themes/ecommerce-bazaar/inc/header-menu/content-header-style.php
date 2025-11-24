<?php
/**
 * Template part for displaying header menu
 *
 * @package Ecommerce Bazaar
 */

?>
<?php
    $ecommerce_bazaar_page_val= is_front_page() ? 'home':'page' ;

?>

<header id="<?php echo esc_attr($ecommerce_bazaar_page_val);?>-inner" class="elementer-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('ecommerce_bazaar_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('skip to content','ecommerce-bazaar'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('skip to content','ecommerce-bazaar');?></a> <?php
    }
    ?>
    <div id="custom-header">
        <?php if ( display_header_text() ) : ?>
            <div id="header-main" class="header-wrapper">
                <div class="container-fluid">
                    <div class="row px-lg-5 px-md-5">
                        <div class="col-lg-2 col-md-2 col-5 align-self-center">
                            <div class="logo <?php echo (has_custom_logo() ? 'has-logo' : 'no-logo'); ?>" itemscope itemtype="https://schema.org/Organization">
                                <?php 
                                    // Display custom logo if available
                                    if ( has_custom_logo() ) {
                                        ecommerce_bazaar_custom_logo();
                                    }

                                    // Display sticky header logo if enabled
                                    if ( get_theme_mod( 'ecommerce_bazaar_enable_logo_stickyheader', false ) ) {
                                        $ecommerce_bazaar_alt_logo = esc_url( get_theme_mod( 'ecommerce_bazaar_logo_stickyheader' ) );
                                        if ( ! empty( $ecommerce_bazaar_alt_logo ) ) {
                                            ?>
                                            <a id="logo-alt" class="logo-alt" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <img src="<?php echo esc_url( $ecommerce_bazaar_alt_logo ); ?>" alt="<?php esc_attr_e( 'logo', 'ecommerce-bazaar' ); ?>">
                                            </a>
                                            <?php
                                        }
                                    }

                                    // Site title and tagline settings
                                    $ecommerce_bazaar_show_title   = get_theme_mod( 'ecommerce_bazaar_display_site_title', true );
                                    $ecommerce_bazaar_show_tagline = get_theme_mod( 'ecommerce_bazaar_display_site_tagline', false );
                                    $ecommerce_bazaar_header_class = $ecommerce_bazaar_show_title ? 'site-title' : 'screen-reader-text';

                                    // Display site title
                                    if ( $ecommerce_bazaar_show_title && get_bloginfo( 'name' ) ) {
                                        if ( is_front_page() ) {
                                            ?>
                                            <h1 class="<?php echo esc_attr( $ecommerce_bazaar_header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                                            </h1>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="<?php echo esc_attr( $ecommerce_bazaar_header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                                            </p>
                                            <?php
                                        }
                                    }

                                    // Display tagline
                                    if ( $ecommerce_bazaar_show_tagline ) {
                                        $ecommerce_bazaar_description = get_bloginfo( 'description', 'display' );
                                        if ( $ecommerce_bazaar_description || is_customize_preview() ) {
                                            ?>
                                            <p class="site-description"><?php echo esc_html( $ecommerce_bazaar_description ); ?></p>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-5 align-self-center">
                            <?php
                                $ecommerce_bazaar_header_phone_number = get_theme_mod( 'ecommerce_bazaar_header_phone_number', '' );
                                if ( ! empty( $ecommerce_bazaar_header_phone_number ) ) { ?>
                                    <p class="hd-call mb-0"><i class="bi bi-telephone-fill me-2"></i>
                                    <?php echo esc_html( $ecommerce_bazaar_header_phone_number ); ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-lg-5 col-md-1 col-2 align-self-center">
                            <div class="top-menu-wrapper text-center">
                                <div class="navigation_header">
                                <div class="toggle-nav mobile-menu">
                                    <button onclick="ecommerce_bazaar_openNav()"><i class="bi bi-list"></i></button>
                                </div>
                                <div id="mySidenav" class="nav sidenav">
                                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'ecommerce-bazaar' ); ?>">
                                        <?php {
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary',
                                                    'container_class' => 'navi clearfix navbar-nav' ,
                                                    'menu_class'     => 'menu clearfix', 
                                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                    'fallback_cb' => 'wp_page_menu',
                                                )
                                            );
                                        } ?>
                                    </nav>
                                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="ecommerce_bazaar_closeNav()"><i class="bi bi-x"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2 col-4 align-self-center text-lg-end">
                            <div class="hdr-cart">
                                <?php
                                    // Check if the function exists to avoid errors
                                    if (function_exists('ecommerce_bazaar_custom_woocommerce_cart_with_total')) {
                                        ecommerce_bazaar_custom_woocommerce_cart_with_total();
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-8 align-self-center">
                            <div class="follow-us text-center text-md-end">
                                <?php
                                    $ecommerce_bazaar_social_media1_heading = get_theme_mod( 'ecommerce_bazaar_social_media1_heading', '' );
                                    if ( ! empty( $ecommerce_bazaar_social_media1_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $ecommerce_bazaar_social_media1_heading ); ?>"><i class="bi bi-facebook me-2"></i></a>
                                <?php } ?>
                                <?php
                                    $ecommerce_bazaar_social_media2_heading = get_theme_mod( 'ecommerce_bazaar_social_media2_heading', '' );
                                    if ( ! empty( $ecommerce_bazaar_social_media2_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $ecommerce_bazaar_social_media2_heading ); ?>"><i class="bi bi-instagram me-2"></i></a>
                                <?php } ?>
                                <?php
                                    $ecommerce_bazaar_social_media3_heading = get_theme_mod( 'ecommerce_bazaar_social_media3_heading', '' );
                                    if ( ! empty( $ecommerce_bazaar_social_media3_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $ecommerce_bazaar_social_media3_heading ); ?>"><i class="bi bi-twitter-x me-2"></i></a>
                                <?php } ?>
                                <?php
                                    $ecommerce_bazaar_social_media4_heading = get_theme_mod( 'ecommerce_bazaar_social_media4_heading', '' );
                                    if ( ! empty( $ecommerce_bazaar_social_media4_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $ecommerce_bazaar_social_media4_heading ); ?>"><i class="bi bi-youtube me-2"></i></a>
                                <?php } ?>
                                <?php
                                    $ecommerce_bazaar_social_media5_heading = get_theme_mod( 'ecommerce_bazaar_social_media5_heading', '' );
                                    if ( ! empty( $ecommerce_bazaar_social_media5_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $ecommerce_bazaar_social_media5_heading ); ?>"><i class="bi bi-pinterest me-2"></i></a>
                                <?php } ?>
                                <?php
                                    $ecommerce_bazaar_social_media6_heading = get_theme_mod( 'ecommerce_bazaar_social_media6_heading', '' );
                                    if ( ! empty( $ecommerce_bazaar_social_media6_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $ecommerce_bazaar_social_media6_heading ); ?>"><i class="bi bi-linkedin me-2"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>    
</header>

<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>

<div class="content-wrap">