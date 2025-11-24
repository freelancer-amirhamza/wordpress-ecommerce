<?php
/*
 * @package Ecommerce Bazaar
 */

function ecommerce_bazaar_admin_enqueue_scripts() {
    wp_enqueue_style( 'ecommerce-bazaar-admin-style', esc_url( get_template_directory_uri() ).'/inc/quick-start-page.css' );
}
add_action( 'admin_enqueue_scripts', 'ecommerce_bazaar_admin_enqueue_scripts' );

function ecommerce_bazaar_theme_info_menu_link() {
    add_theme_page(
        esc_html__( 'Theme Demo Import', 'ecommerce-bazaar' ),
        esc_html__( 'Theme Demo Import', 'ecommerce-bazaar' ),
        'edit_theme_options',
        'ecommerce-bazaar-demo',
        'ecommerce_bazaar_demo_content_page'
    );

}
add_action( 'admin_menu', 'ecommerce_bazaar_theme_info_menu_link' );


function ecommerce_bazaar_demo_content_page() {

    $ecommerce_bazaar_theme = wp_get_theme();
    ?>
    <div class="demo-box">
        <div class="wrapper-demo">
            <div class="importer-content">
                <h2><?php echo esc_html( 'Welcome to Ecommerce Bazaar', 'ecommerce-bazaar' ); ?> <span class="demo-versn"><?php echo $ecommerce_bazaar_theme->get( 'Version' ); ?></span></h2>
                <h6><?php echo esc_html('Importing Demo Content','ecommerce-bazaar');?> </h6>
                <p><?php echo esc_html('Click Run Importer to begin the process of configuring your website. This will enable you to easily duplicate the theme\'s sample layout by automatically importing all required demo content, such as pages, settings, and configurations. It is strongly advised that you create a complete backup of your website before launching the importer. This guarantees that your current data is secure and recoverable in the event of an emergency. For best speed and appearance, the suggested Customizer settings are automatically applied by the demo importer, which is designed to work perfectly with Ecommerce Bazaar. All of the settings and content will be applied after the import is finished. You can, however, freely alter things further to suit your tastes using the WordPress Customizer.','ecommerce-bazaar'); ?></p>
                <?php require get_parent_theme_file_path( '/inc/quick-start-content.php' ); ?>
            </div>
            <div class="thme-img-box">
                <img src="<?php echo esc_url( get_template_directory_uri().'/screenshot.png' ); ?>" />
            </div>
        </div>
    </div>

<?php
}

?>